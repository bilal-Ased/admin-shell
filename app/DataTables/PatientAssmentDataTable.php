<?php

namespace App\DataTables;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PatientAssmentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('full_name', function ($query) {
                $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($query->first_name . ' ' . $query->last_name) . '&background=3A6073&color=FFF8E1';
                $fullName = htmlspecialchars($query->first_name . ' ' . $query->last_name);
                $customerId = $query->id; // Assuming the customer ID is available in the query

                // Create the link to the customer activity page

                $link = route('customers.activity', ['encryptedId' => Crypt::encrypt($customerId)]);

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
            ->addColumn('action', 'patient-assessment.action')

            ->rawColumns(['action', 'status', 'full_name', 'allergies']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PatientAssment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customer $model): QueryBuilder
    {
        return $model->newQuery()->with('customerProfile')->orderBy('created_at', 'desc');;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('patientassment-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            ['data' => 'full_name', 'name' => 'full_name', 'title' => 'FULL NAME', 'orderable' => true],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'phone_number', 'name' => 'phone_number', 'title' => 'Phone Number'],
            Column::computed('action')->exportable(false)->printable(false)->searchable(false)->addClass('text-center'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'PatientAssment_' . date('YmdHis');
    }
}
