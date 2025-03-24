<?php

use App\Http\Controllers\NurseAssessmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/create-assessment', [NurseAssessmentController::class, 'index'])->name('assessment.create');
});
