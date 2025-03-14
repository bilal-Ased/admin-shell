<?php

use App\Http\Controllers\AppointmentStatusController;
use App\Http\Controllers\IsuranceController;
use App\Http\Controllers\ticketsConfigsController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'role:admin'], function () {

    Route::get('/settings/tickets/configs', [ticketsConfigsController::class, 'index']);
    Route::get('/settings/tickets/statuses', [ticketsConfigsController::class, 'getTicketStatus']);
    Route::get('/settings/tickets/categories', [ticketsConfigsController::class, 'getTicketCategories']);
    Route::get('/settings/tickets/sources', [ticketsConfigsController::class, 'getTicketSources']);
    Route::get('/settings/tickets/disposition', [ticketsConfigsController::class, 'getTicketDispositions']);
    Route::get('/settings/tickets/department', [ticketsConfigsController::class, 'getDepartments']);
    Route::get('/settings/all-users', [ticketsConfigsController::class, 'getAllUsers']);

    Route::post('/appointment/status/store', [AppointmentStatusController::class, 'store'])->name('appointment-status.store');
    Route::get('/appointment/status/update/{id}', [AppointmentStatusController::class, 'update'])->name('appointment-status.update');
    Route::get('/settings/insurance/list', [IsuranceController::class, 'index'])->name('isurance.index');
    Route::post('settings/insurance/store', [IsuranceController::class, 'store'])->name('insurance.store');
});

Route::get('/settings/all-doctors', [ticketsConfigsController::class, 'getDoctors']);
Route::get('/settings/insurance/list/search', [IsuranceController::class, 'getInsurnace']);
Route::get('/settings/appointment/status', [AppointmentStatusController::class, 'index'])->name('appointment-status.list');
