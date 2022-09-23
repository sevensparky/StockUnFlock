<?php

use Illuminate\Support\Facades\Route;
use Modules\Supplier\Http\Controllers\SupplierController;


Route::prefix('dashboard')->middleware(['auth'])->group(function() {

    Route::resource('suppliers', SupplierController::class);
    Route::put('suppliers/{id}/change-status', [SupplierController::class, 'changeStatus'])
        ->name('suppliers.change.status');
    Route::get('trash/suppliers', [SupplierController::class, 'trash'])->name('suppliers.trash');
    Route::delete('suppliers/trash/{id}/force-delete', [SupplierController::class, 'forceDelete'])->name('suppliers.force.delete');
    Route::get('suppliers/trash/{id}/restore', [SupplierController::class, 'restore'])->name('suppliers.restore');
    Route::get('suppliers/trash/restore-all', [SupplierController::class, 'restoreAll'])->name('suppliers.restore.all');
});
