<?php

namespace App\DataTables;

use App\Models\Tickets;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Services\DataTable;


class MyTicketsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'mytickets.action')
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tickets $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tickets $model): QueryBuilder
    {
        $authUserId = Auth::id();
        return $model->newQuery()->with('customer', 'status', 'ticketSources', 'ticketCategories', 'user')->where('assigned_to', $authUserId);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('mytickets-table')
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
            ['data' => 'id', 'name' => 'id', 'title' => 'ID', 'orderable' => true],
            ['data' => 'customer.first_name', 'name' => 'customer.first_name', 'title' => 'Customer', 'orderable' => true],
            ['data' => 'ticket_sources.name', 'name' => 'ticketSources.name', 'title' => 'Source'],  // Updated
            ['data' => 'ticket_categories.name', 'name' => 'ticketCategories.name', 'title' => 'Issue Category'],
            ['data' => 'status.name', 'name' => 'status.name', 'title' => 'Status'],
            ['data' => 'user.username', 'name' => 'user.username', 'title' => 'Assigned To'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],

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
        return 'Tickets_' . date('YmdHis');
    }
}
