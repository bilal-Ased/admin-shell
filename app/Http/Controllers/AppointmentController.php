<?php

namespace App\Http\Controllers;

use App\DataTables\AppointmentsDataTable;
use App\DataTables\MyAppointmentsDataTable;
use App\Mail\AppointmentCreated;
use App\Models\Appointment;
use App\Models\AppointmentUpdate;
use App\Models\Customer;
use App\Services\WhatsAppService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

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


    public function store(Request $request, WhatsAppService $whatsappService)
    {

        // dd($request);
        $request->validate([
            'customer_id' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'user_id' => 'required',
        ]);

        $request['created_by'] = Auth::id();
        $request['status_id'] = Appointment::STATUS_Sheduled;
        $request['appointment_time'] = Carbon::createFromFormat('h:i A', $request['appointment_time'])->format('H:i:s');
        $appointment = Appointment::create($request->all());
        Mail::to($appointment->user->email)->send(new AppointmentCreated($appointment));
        if ($request->has('send_email')) {
            // Send email to the customer if the checkbox is checked
            Mail::to($appointment->customer->email)->send(new AppointmentCreated($appointment));
        }

        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        $formattedPhone = null;

        try {
            $numberProto = $phoneNumberUtil->parse($appointment->customer->phone_number, 'KE'); // Replace 'KE' with your default country code
            $formattedPhone = $phoneNumberUtil->format($numberProto, PhoneNumberFormat::E164);
        } catch (\Exception $e) {
            \Log::error('Phone number formatting failed: ' . $e->getMessage());
        }


        // Send WhatsApp notification
        if ($formattedPhone) {
            try {
                $whatsappService->sendAppointmentNotification(
                    $formattedPhone, // Formatted phone number
                    $appointment->customer->first_name,  // Customer's name
                    $appointment->appointment_date,  // Customer's name
                    $appointment->appointment_time   // Customer's name
                );
            } catch (\Exception $e) {
                \Log::error('WhatsApp Notification Failed: ' . $e->getMessage());
            }
        } else {
            \Log::error('Invalid phone number for WhatsApp notification.');
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
        $appointment = Appointment::with(['user', 'customer'])->findOrFail($appointmentId);
        return view('appointments.update-appointment', ['appointment' => $appointment]);
    }


    public function storeUpdate(Request $request, $appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);

        // Validate input
        $validated = $request->validate([
            'teeth' => 'nullable|array', // Expect an array of teeth IDs
            'teeth.*' => 'integer',      // Validate each teeth ID is an integer
            'comment' => 'nullable|string',
            'files.*' => 'file|mimes:jpg,png,jpeg,gif,svg,pdf|max:2048', // Restrict mime types and size
            'insurnace_status_id' => 'required|integer',
        ]);

        // Process file uploads
        $files = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $files[] = $file->store('appointment_updates', 'public');
            }
        }

        // Create a new appointment update
        AppointmentUpdate::create([
            'appointment_id' => $appointment->id,
            'user_id' => Auth::id(),
            'update_date' => now(),
            'worked_teeth' => implode(',', $validated['teeth'] ?? []), // Save teeth as CSV
            'comments' => $validated['comment'] ?? null,
            'files' => !empty($files) ? json_encode($files) : null,
            'status_id' => $validated['insurnace_status_id'],
        ]);

        // Return response
        return $request->wantsJson()
            ? response()->json(['success' => true], 201)
            : redirect()->route('appointments.list')->with('success', 'Update added successfully!');
    }


    public function showEditModal($appointmentId)
    {
        return view('appointments.edit-modal', ['appointmentId' => $appointmentId]);
    }


    public function editUpdate(Request $request, $appointmentId, $updateId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $update = AppointmentUpdate::where('appointment_id', $appointmentId)->findOrFail($updateId);

        return view('appointments.edit-update', [
            'appointment' => $appointment,
            'update' => $update,
        ]);
    }
}
