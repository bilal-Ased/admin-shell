<?php

namespace App\Http\Controllers;

use App\DataTables\AppointmentsDataTable;
use App\DataTables\MyAppointmentsDataTable;
use App\Mail\AppointmentCreated;
use App\Models\Appointment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();
        $callId = $request->query('call_id'); // Extract call_id if needed

        $customer = null;
        // Optionally filter by call_id if provided
        if ($callId) {
            $query->where('phone_number', 'like', '%' . $callId . '%');
            $customer = $query->first();
        }
        return view('appointments.index', compact('customer'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'user_id' => 'required',
        ]);

        $request['created_by'] = Auth::id();
        $request['status_id'] = Appointment::STATUS_Sheduled;
        $appointment = Appointment::create($request->all());



        Mail::to($appointment->user->email)->send(new AppointmentCreated($appointment));


        if ($request->has('send_email')) {
            // Send email to the customer if the checkbox is checked
            Mail::to($appointment->customer->email)->send(new AppointmentCreated($appointment));
        }


        return redirect()->route('appointments.list')->with('success', 'Appointment Created successfully!');
    }



    public function list(AppointmentsDataTable $dataTable)
    {
        return $dataTable->render('appointments.appointments-list');
    }

    public function getAuthUsersAppointments(MyAppointmentsDataTable $dataTable)
    {
        return $dataTable->render('appointments.my-appointments');
    }

    public function getAppointments()
    {
        $appointments = Appointment::all()->map(function ($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->customer->first_name, // Customize as needed
                'start' => $appointment->appointment_date . ' ' . $appointment->appointment_time,
                'end' => $appointment->appointment_date . ' ' . $appointment->appointment_time, // Adjust if the appointment has a duration
                'extendedProps' => [
                    'customer' => $appointment->customer->name, // Assuming a relationship with Customer
                    'reason' => $appointment->reason,
                    'doctor' => $appointment->user->username,
                ],
            ];
        });

        return response()->json($appointments);
    }


    public function update(Request $request, $appointmentId)
    {
        $appointment = Appointment::with(['user'])->findOrFail($appointmentId);
        // $ticket->assigned_to = 3;
        // $ticket->save();

        return view('appointments.update-appointment', ['appointment' => $appointment]);
    }
}
