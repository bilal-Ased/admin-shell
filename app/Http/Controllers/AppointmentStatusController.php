<?php

namespace App\Http\Controllers;

use App\DataTables\AppointmentStatusDataTable;
use App\Models\AppointmentStatus;
use Illuminate\Http\Request;

class AppointmentStatusController extends Controller
{
    public function index(AppointmentStatusDataTable $dataTable)
    {
        $response = $dataTable->render('settings.appointment-status');
        return $response;
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        AppointmentStatus::create($request->all());

        return redirect()->route('appointment-status.index')->with('success', 'Status added successfully!');
    }



    public function update($appointmentStatusId)
    {
        $appointmentStatus = AppointmentStatus::findOrFail($appointmentStatusId);

        return view('appointments.appointment-status.edit-modal', ['appointmentStatus' => $appointmentStatus]);
    }


    public function getAppointmentStatus(Request $request)
    {
        $data = AppointmentStatus::where('id', 1)->where('name', 'like', '%' . $request->searchItem . '%');

        return $data->paginate(10, ['*'], 'page', $request->page);
    }
}
