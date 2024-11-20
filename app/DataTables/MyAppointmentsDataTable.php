<?php

namespace App\DataTables;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MyAppointmentsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable(
            $query->select('appointments.*')->orderBy('created_at', 'desc')
        ))->addColumn('action', 'appointments.action')
            ->setRowId('appointments.id')
            ->editColumn('ID', function ($appointment) {
                $str = '<div class="d-flex"><a class="shadow rounded appointments-style" href="' . route('update.ticket', $appointment->id) . '">#AP' . $appointment->id . '</a></div>';

                return $str;
            })
            ->rawColumns(['ID', 'appointment_details', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MyAppointment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Appointment $model): QueryBuilder
    {
        $authUserId = Auth::id();

        return $model->newQuery()->with('customer', 'user')->where('user_id', $authUserId);
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
            ->setTableId('myappointments-table')
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
            ['data' => 'ID', 'name' => 'id', 'title' => 'ID'],
            ['data' => 'customer.first_name', 'name' => 'customer.first_name', 'title' => 'Customer', 'orderable' => true],
            ['data' => 'appointment_date', 'name' => 'appointment_date', 'title' => 'appointment Date'],
            ['data' => 'user.username', 'name' => 'user.username', 'title' => 'Doctor'],



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
        return 'MyAppointments_' . date('YmdHis');
    }
}
