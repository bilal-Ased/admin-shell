<?php

namespace App\DataTables;

use App\Models\Location;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class LocationsDataTable extends DataTable
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
            ->addColumn('action', 'locations.action')
            ->rawColumns(['action', 'status'])
            ->editColumn('created_at', function ($query) {
                return date('Y/m/d', strtotime($query->created_at));
            });

    }

    /**
     * Get query source of dataTable.
     */
    public function query(Location $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'asc');
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('locations-table')
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
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
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
     */
    protected function filename(): string
    {
        return 'Locations_'.date('YmdHis');
    }
}
