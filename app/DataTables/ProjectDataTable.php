<?php

namespace App\DataTables;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProjectDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'projects.action')
            ->setRowId('id')
            ->editColumn('budget', function ($project) {
                return number_format($project->budget, 2).' Ksh';
            });
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Project $model): QueryBuilder
    {
        return $model->newQuery()
            ->leftJoin('customers', 'projects.customer_id', '=', 'customers.id')
            ->select('projects.*', 'customers.first_name as customer_name');
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('project-table')
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
            ['data' => 'id', 'name' => 'id', 'title' => 'id'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Project Name'],
            ['data' => 'customer_name', 'name' => 'customer_name', 'title' => 'Customer'],
            ['data' => 'start_date', 'name' => 'start_date', 'title' => 'Start Date'],
            ['data' => 'end_date', 'end_date' => 'end_date', 'title' => 'End Date'],

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
        return 'Project_'.date('YmdHis');
    }
}
