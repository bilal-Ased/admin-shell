<?php

use App\Http\Controllers\patientAssessmentController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/patient-assessment', [patientAssessmentController::class, 'index'])->name('patient-assment.list');
});
