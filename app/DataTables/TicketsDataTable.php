<?php

namespace App\DataTables;

use App\Models\Ticket;
use App\Models\Tickets;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TicketsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        // dd((new EloquentDataTable($query)));

        return (new EloquentDataTable(
            $query->select('tickets.*')->orderBy('created_at', 'desc')
        ))

            ->addColumn('action', 'tickets.action')
            ->setRowId('tickets.id')
            ->editColumn('ID', function ($ticket) {
                // dd($ticket);
                $str = '<div class="d-flex shadow rounded ticket-style">#TN' . $ticket->id . '</div>';

                return $str;
            })
            ->editColumn('created_at', function ($query) {
                return date('d-m-Y', strtotime($query->created_at));
            })

            ->editColumn('ticket_sources.name', function ($ticket) {
                // dd($ticket);

                $source = $ticket->ticketSources->name;
                [$icon, $style] = $this->getSourceIcon($source);

                $str = '<div class="ticket-style-source"><i class="' . $icon . '" style="' . $style . '"></i><span>' . $ticket->ticketSources->name . '</span></div>';

                return $str;
            })
            ->rawColumns(['ID', 'ticket_sources.name']);
    }

    function getSourceIcon($source)
    {

        $icon = '';
        $style = '';
        if ($source == 'Whats App') {
            $icon = 'fa-brands fa-whatsapp';
            $style = 'color: #63E6BE;font-size: 19px;';
        } else if ($source == 'Email') {
            $icon =  'fa-regular fa-envelope';
        }

        return [$icon, $style];
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ticket $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tickets $model): QueryBuilder
    {
        // dd($model->newQuery()->toSql());
        return $model->newQuery()->with(['customer', 'ticketStatuses', 'ticketSources', 'ticketCategories', 'user']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('tickets-table-v1')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
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
            ['data' => 'ID', 'name' => 'ID', 'title' => 'ID', 'orderable' => true],
            ['data' => 'customer.first_name', 'name' => 'customer.first_name', 'title' => 'Customer', 'orderable' => true],
            ['data' => 'ticket_sources.name', 'name' => 'ticketSources.name', 'title' => 'Source'],  // Updated
            ['data' => 'ticket_categories.name', 'name' => 'ticketCategories.name', 'title' => 'Issue Category'],
            ['data' => 'ticket_statuses.name', 'name' => 'ticketStatuses.name', 'title' => 'Status'],
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
