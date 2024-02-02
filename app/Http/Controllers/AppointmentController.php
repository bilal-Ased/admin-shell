<?php

namespace App\Http\Controllers;

use App\DataTables\AppointmentsDataTable;
use App\Mail\AppointmentCreated;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('appointments.index');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'appointment_datetime' => 'required|date',
            'reason' => 'nullable|string',
            'user_id' => 'required',
        ]);

        $validatedData['created_by'] = Auth::id();

        // Create appointment in the database
        $appointment = Appointment::create($validatedData);

        // Send email to the assigned user
        $user = User::find($validatedData['user_id']);

        if ($user) {
            Mail::to($user->email)->send(new AppointmentCreated($appointment));
        }


        // Redirect to appointment listing or show a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully');
    }



    public function searchCustomers(Request $request)
    {

        $query = $request->get('q');
        $customers = Customer::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('first_name', 'like', "%$query%")
                         ->orWhere('last_name', 'like', "%$query%");
        })
        ->limit(10)
        ->get(['id', DB::raw("CONCAT(first_name, ' ', last_name) as text")]);

        return response()->json($customers);

    }


    public function searchDoctors(Request $request)
    {
        $query = $request->get('q');
        $doctors = User::where('username', 'like', "%$query%")->limit(10)->get(['id', 'username as text']);

        return response()->json($doctors);
    }


    public function list(AppointmentsDataTable $dataTable)
    {
        return $dataTable->render('appointments.appointments-list');
    }


    public function getAppointments(Request $request)
    {
        $appointments = Appointment::with(['customer', 'user'])->get();

        $formattedAppointments = $appointments->map(function ($appointment) {
            return [
                'title'   => $appointment->customer->first_name . ' - ' . $appointment->reason,
                'start'   => $appointment->appointment_datetime,
                'end'     => $appointment->appointment_datetime, // Optional: If appointments have an end time
                'doctor'  => $appointment->user->name,
                'tooltip' => 'Doctor: ' . $appointment->user->name, // Optional: Additional information in a tooltip
            ];
        });

        return response()->json($formattedAppointments);
    }



}
