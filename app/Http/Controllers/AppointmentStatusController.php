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


        return redirect()->route('customers.index')->with('success', 'Status added successfully!');
    }
}
