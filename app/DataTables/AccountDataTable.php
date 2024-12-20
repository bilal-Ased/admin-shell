<?php

namespace App\DataTables;

use App\Models\Accounts;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AccountDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'account.action')
            ->setRowId('id')
            ->editColumn('status', function ($query) {
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

            ->editColumn('start_date', function ($query) {
                return date('Y/m/d', strtotime($query->start_date));
            })
            ->editColumn('end_date', function ($query) {
                return date('Y/m/d', strtotime($query->end_date));
            })

            ->rawColumns(['action', 'status']);

    }

    /**
     * Get query source of dataTable.
     */
    public function query(Accounts $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('account-table')
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
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => 'ID', 'orderable' => true],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'number_of_agents', 'number_of_agents' => 'name', 'title' => 'No Agents'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'start_date', 'name' => 'start_date', 'title' => 'Start Date'],
            ['data' => 'end_date', 'name' => 'end_date', 'title' => 'End Date'],

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
     */
    protected function filename(): string
    {
        return 'Account_'.date('YmdHis');
    }
}
