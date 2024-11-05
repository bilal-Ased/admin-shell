<?php

namespace App\DataTables;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('full_name', function ($query) {
                $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($query->first_name . ' ' . $query->last_name) . '&background=D1E3F7&color=1A4D85';
                $fullName = htmlspecialchars($query->first_name . ' ' . $query->last_name);
                $customerId = $query->id; // Assuming the customer ID is available in the query

                // Create the link to the customer activity page
                $link = route('customers.activity', ['id' => $customerId]);

                return '<div data-fullname="' . $fullName . '">' .
                    '<a href="' . $link . '">' .  // Link only around the avatar
                    '<img src="' . $avatarUrl . '" alt="User-Profile" width="30" height="30" class="rounded-circle me-2">' .
                    '</a>' .
                    '<span>' . $fullName . '</span>' .  // Full name outside of the link
                    '</div>';
            })



            ->editColumn('status', function ($query) {
                $status = 'warning';

                switch ($query->status) {
                    case 1:
                        $status = 'info'; // Active
                        $displayText = 'Active';
                        break;
                    case 0:
                        $status = 'danger'; // Inactive
                        $displayText = 'Inactive';
                        break;
                    default:
                        $displayText = 'Unknown';
                }

                return '<span class="text-capitalize badge bg-' . $status . '">' . $displayText . '</span>';
            })
            ->editColumn('created_at', function ($query) {
                return date('Y/m/d', strtotime($query->created_at));
            })
            ->filterColumn('full_name', function ($query, $keyword) {
                $sql = "CONCAT(customers.first_name,' ',customers.last_name) like ?";

                return $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('action', 'customers.action')
            ->rawColumns(['action', 'status', 'full_name']);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Customer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->parameters([
                'dom'          => 'Bfrtip',
                'buttons'      => ['export'],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            ['data' => 'full_name', 'name' => 'full_name', 'title' => 'FULL NAME', 'orderable' => true],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'phone_number', 'name' => 'phone_number', 'title' => 'Phone Number'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            Column::computed('action')->exportable(false)->printable(false)->searchable(false)->addClass('text-center'),

        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename(): string
    {
        return 'Customer_' . date('YmdHis');
    }
}
