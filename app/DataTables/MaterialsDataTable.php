<?php

namespace App\DataTables;

use App\Models\Material;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MaterialsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'materials.action')
            ->setRowId('id')
            ->editColumn('created_at', function ($query) {
                return date('Y/m/d', strtotime($query->created_at));
            })
            ->editColumn('unit_price', function ($material) {
                return number_format($material->unit_price, 2).' Ksh';
            });
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Material $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('materials-table')
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
            ['data' => 'name', 'name' => 'name', 'title' => 'Name', 'orderable' => true],
            ['data' => 'unit_price', 'name' => 'unit_price', 'title' => 'Price per Unit'],
            ['data' => 'quantity_on_hand', 'name' => 'quantity_on_hand', 'title' => 'Quantity In hand'],
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
        return 'Materials_'.date('YmdHis');
    }
}
