<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::middleware(['auth'])->group(function () {
    Route::get('/customers/index', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'editCustomer'])->name('customers.edit');
    Route::post('/customers/change-status/{id}', [CustomerController::class, 'changeStatus'])->name('customers.change-status');
    Route::post('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::get('/customers/activity/{id}', [CustomerController::class, 'customerActivity'])->name('customers.activity');
});
