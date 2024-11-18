<?php

namespace App\DataTables;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AppointmentsDataTable extends DataTable
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
            $query->select('appointments.*')->orderBy('appointment_date', 'desc')
        ))

            ->addColumn('action', 'appointments.action')
            ->addColumn('full_name', function ($appointment) {
                $customer = $appointment->customer;

                return $customer->full_name;
            })
            ->setRowId('appointments.id')
            ->editColumn('ID', function ($appointment) {
                $str = '<div class="d-flex"><a class="shadow rounded appointments-style" href="' . route('update.appointment', $appointment->id) . '">#AP' . $appointment->id . '</a></div>';

                return $str;
            })
            ->editColumn('appointment_date', function ($appointment) {
                // Concatenate appointment_date and appointment_time
                return Carbon::parse($appointment->appointment_date)->format('M j, Y') . ', ' . Carbon::parse($appointment->appointment_time)->format('g:i A');
            })
            ->editColumn('status_id', function ($appointment) {
                // Initialize variables
                $statusClass = '';
                $displayText = '';

                // Check the status using the 'status_id' field
                switch ($appointment->status_id) {
                    case 1:
                        $statusClass = 'info'; // Scheduled
                        $displayText = 'Scheduled';
                        break;
                    case 2:
                        $statusClass = 'success'; // Rescheduled
                        $displayText = 'Rescheduled';
                        break;
                    case 3:
                        $statusClass = 'danger'; // Cancelled
                        $displayText = 'Cancelled';
                        break;
                    default:
                        $statusClass = 'success'; // Default class for unknown status
                        $displayText = 'Unknown';
                        break;
                }

                // Return the badge HTML if displayText is set
                return $displayText ? '<span class="text-capitalize badge bg-' . $statusClass . '">' . $displayText . '</span>' : '';
            })
            ->rawColumns(['ID', 'appointment_date', 'status_id', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Appointment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Appointment $model): QueryBuilder
    {
        $query = $model->newQuery()->with('customer', 'user');

    // Check for date range inputs
    $startDate = request()->get('start_date');
    $endDate = request()->get('end_date');

    if ($startDate && $endDate) {
        $query->whereBetween('appointment_date', [
            Carbon::parse($startDate)->startOfDay(),
            Carbon::parse($endDate)->endOfDay()
        ]);
    }

    return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('appointments-table')
            ->columns($this->getColumns())
            ->minifiedAjax(route('appointments.list')) // Ensure you replace this with your actual route name
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
            ['data' => 'full_name', 'name' => 'full_name', 'title' => 'Customer', 'orderable' => true],
            ['data' => 'appointment_date', 'name' => 'appointment_date', 'title' => 'Appointment Date'],
            ['data' => 'status_id', 'name' => 'status_id', 'title' => 'Status '],
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
        return 'appointment_datetime' . date('YmdHis');
    }
}
