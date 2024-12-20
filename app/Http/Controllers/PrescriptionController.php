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

        $pdf = Pdf::loadView('prescription.pdf_template', [
            'content' => $content,
            'userName' => $user->username ?? 'Not A Doctor',
        ]);
        return $pdf->stream('document.pdf');
    }
}
