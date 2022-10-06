<?php

use Illuminate\Support\Facades\Route;
use Modules\Invoice\Http\Controllers\InvoiceController;

Route::group(['prefix' => 'dashboard'], function () {

    Route::resource('invoices', InvoiceController::class)->except('show');
    Route::put('invoices/{id}/change-status', [InvoiceController::class, 'changeStatus'])
        ->name('invoices.change.status');
    Route::get('invoices/trash', [InvoiceController::class, 'trash'])->name('invoices.trash');
    Route::delete('invoices/trash/{id}/force-delete', [InvoiceController::class, 'forceDelete'])->name('invoices.force.delete');
    Route::get('invoices/trash/{id}/restore', [InvoiceController::class, 'restore'])->name('invoices.restore');
    Route::get('invoices/trash/restore-all', [InvoiceController::class, 'restoreAll'])->name('invoices.restore.all');

    Route::get('invoices/get/product-quantity', [InvoiceController::class, 'getSpecificCategory'])->name('get.product.quantity');
    Route::get('invoices/get/stock', [InvoiceController::class, 'getProductStock'])->name('get.product.stock');
});
