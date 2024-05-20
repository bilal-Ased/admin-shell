<?php

namespace App\DataTables;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
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
            ->editColumn('created_at', function ($query) {
                return date('d/m/Y', strtotime($query->created_at));
            })

            ->addColumn('action', 'company.action')
            ->rawColumns(['action', 'status']);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Company $model): QueryBuilder
    {
        return $model->newQuery()
            ->leftJoin('users', 'companies.created_by', '=', 'users.id') // Join the users table
            ->select('companies.*', 'users.username as created_by'); // Select the username as creator_name;
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('company-table')
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
            ['data' => 'name', 'name' => 'name', 'title' => 'Name', 'orderable' => true],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'created_by', 'name' => 'created_by', 'title' => 'Created By'],

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
        return 'Company_'.date('YmdHis');
    }
}
