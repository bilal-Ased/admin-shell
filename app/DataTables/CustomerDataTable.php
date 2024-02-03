<?php

namespace App\DataTables;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
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

        ->editColumn('status', function($query) {
            $status = 'warning';

            switch ($query->status) {
                case 1:
                    $status = 'primary'; // Active
                    $displayText = 'Active';
                    break;
                case 0:
                    $status = 'danger'; // Inactive
                    $displayText = 'Inactive';
                    break;
                // Add more cases if needed
                default:
                    $displayText = 'Unknown';
            }

            return '<span class="text-capitalize badge bg-'.$status.'">'.$displayText.'</span>';
        })
        ->editColumn('created_at', function($query) {
            return date('Y/m/d',strtotime($query->created_at));
        })
        ->filterColumn('full_name', function($query, $keyword) {
            $sql = "CONCAT(customers.first_name,' ',customers.last_name)  like ?";
            return $query->whereRaw($sql, ["%{$keyword}%"]);
        })

        ->addColumn('action', 'customers.action')
        ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Customer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customer $model): QueryBuilder
    {
        return $model->newQuery();

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('customer-table')
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
            ['data' => 'first_name', 'name' => 'first_name', 'title' => 'FULL NAME', 'orderable' => true],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'phone_number', 'name' => 'phone_number', 'title' => 'Phone Number'],
            ['data' => 'created_at','name'=> 'created_at', 'title' => 'Created At'],


            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->searchable(false)
            ->width(60)
            ->addClass('text-center hide-search'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Customer_' . date('YmdHis');
    }



}
