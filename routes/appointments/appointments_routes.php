<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AppointmentController;

Route::middleware(['auth'])->group(function () {

    Route::get('/calendar', [CalendarController::class, 'showCalendar'])->name('appointments.calendar');
    Route::get('/create-appointment', [AppointmentController::class, 'index'])->name('appointment.create');
    Route::post('/store-appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/appointments/list', [AppointmentController::class, 'list'])->name('appointments.list');
    Route::get('/my/appointments', [AppointmentController::class, 'getAuthUsersAppointments'])->name('my.appointments');
    Route::get('/my/appointments', [AppointmentController::class, 'getAuthUsersAppointments'])->name('my.appointments');
    Route::get('/update/appointment/{id}', [AppointmentController::class, 'update'])->name('update.appointment');
});
