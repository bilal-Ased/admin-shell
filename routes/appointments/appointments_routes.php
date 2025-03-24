<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentStatusController;

Route::middleware(['auth'])->group(function () {

    Route::get('/calendar', [CalendarController::class, 'showCalendar'])->name('appointments.calendar');
    Route::get('/create-appointment', [AppointmentController::class, 'index'])->name('appointment.create');
    Route::post('/store-appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/appointments/list', [AppointmentController::class, 'list'])->name('appointments.list');
    Route::get('/my/appointments', [AppointmentController::class, 'getAuthUsersAppointments'])->name('my.appointments');
    Route::get('/my/appointments', [AppointmentController::class, 'getAuthUsersAppointments'])->name('my.appointments');
    Route::get('/update/appointment/{id}', [AppointmentController::class, 'update'])->name('update.appointment');
    Route::post('appointments/{appointmentId}/updates', [AppointmentController::class, 'storeUpdate'])->name('appointments.updates.store'); // Add a new update

});


Route::get('/settings/appointment-status/list', [AppointmentStatusController::class, 'getAppointmentStatus'])->name('appointment.statuses');
