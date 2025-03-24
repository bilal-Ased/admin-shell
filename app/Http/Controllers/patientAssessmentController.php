<?php

namespace App\Http\Controllers;

use App\DataTables\PatientAssmentDataTable;
use Illuminate\Http\Request;

class patientAssessmentController extends Controller
{

    public function index(PatientAssmentDataTable $dataTable)
    {
        $response = $dataTable->render('patient-assessment.index');
        return $response;
    }
}
