<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    public function generatePdf(Request $request)
    {
        $content = $request->input('content');
        $user = Auth::user();




        // Load the Blade view and pass the user content

        $pdf = Pdf::loadView('prescription.pdf_template', [
            'content' => $content,
            'userName' => $user->username ?? 'Unknown',
        ]);



        // Return the PDF in the browser for download or print
        return $pdf->stream('document.pdf'); // Opens in a new tab
    }
}
