<?php

use Illuminate\Support\Facades\Route;
use Modules\Customer\Http\Controllers\CustomerController;


Route::prefix('dashboard')->middleware(['auth'])->group(function() {

    Route::resource('customers', CustomerController::class);
    Route::put('customers/{id}/change-status', [CustomerController::class, 'changeStatus'])
        ->name('customers.change.status');
    Route::get('trash/customers', [CustomerController::class, 'trash'])->name('customers.trash');
    Route::delete('customers/trash/{id}/force-delete', [CustomerController::class, 'forceDelete'])->name('customers.force.delete');
    Route::get('customers/trash/{id}/restore', [CustomerController::class, 'restore'])->name('customers.restore');
    Route::get('customers/trash/restore-all', [CustomerController::class, 'restoreAll'])->name('customers.restore.all');
});
