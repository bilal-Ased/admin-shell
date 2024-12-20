<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::middleware(['auth'])->group(function () {
    Route::get('/customers/index', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'editCustomer'])->name('customers.edit');
    Route::post('/customers/change-status/{id}', [CustomerController::class, 'changeStatus'])->name('customers.change-status');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    // Route::get('/customers/activity/{id}', [CustomerController::class, 'customerActivity'])->name('customers.activity');
    Route::get('/customers/activity/{encryptedId}', [CustomerController::class, 'customerActivity'])->name('customers.activity');
});
