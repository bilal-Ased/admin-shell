<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketsController;

Route::middleware(['auth'])->group(function () {

    Route::get('/tickets/create', [TicketsController::class, 'index'])->name('tickets.index');
    Route::post('/tickets/store', [TicketsController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/list', [TicketsController::class, 'list'])->name('tickets.list');
    Route::get('my/tickets/list', [TicketsController::class, 'getAuthUsersTickets'])->name('my.tickets');
    Route::get('update/ticket/{id}', [TicketsController::class, 'update'])->name('update.ticket');
});
