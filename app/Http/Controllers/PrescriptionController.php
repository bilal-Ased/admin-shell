<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Prescription;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    public function generatePdf(Request $request, $appointment_id)
    {
        dd($request->all()); // Check the request data

        $appointment = Appointment::find($request->appointment_id);
        dd($appointment);
        // Validate the incoming request data
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'content' => 'required|string|min:10',
        ]);

        // Find the appointment


        if (!$appointment) {
            // Return a 404 if appointment not found
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        // Extract customer_id from the appointment
        $customerId = $appointment->customer_id;
        $content = $request->input('content');
        $user = Auth::user();

        // Generate the PDF using the content, user, and customer information
        $pdf = Pdf::loadView('prescription.pdf_template', [
            'content' => $content,
            'userName' => $user->username ?? 'Unknown',
            'customerId' => $customerId, // Pass customer_id to the PDF template
        ]);

        // Generate a unique file name based on the current timestamp
        $fileName = 'prescription_' . time() . '.pdf';
        $filePath = storage_path('app/public/prescriptions/' . $fileName);

        // Save the generated PDF to the storage folder
        $pdf->save($filePath);

        // Save the prescription details in the database
        Prescription::create([
            'user_id' => $user->id,
            'customer_id' => $customerId, // Save customer_id with the prescription
            'content' => $content,
            'file_name' => $fileName,
        ]);

        // Return the generated PDF to the user in the browser
        return $pdf->stream('prescription.pdf');
    }
}
