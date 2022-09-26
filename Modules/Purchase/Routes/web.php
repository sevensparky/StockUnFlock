<?php

use Illuminate\Support\Facades\Route;
use Modules\Purchase\Http\Controllers\PurchaseController;

Route::group(['prefix' => 'dashboard'], function () {

    Route::resource('purchases', PurchaseController::class)->except('show');

    Route::put('purchases/{id}/change-status', [PurchaseController::class, 'changeStatus'])
        ->name('purchases.change.status');
    Route::get('purchases/trash', [PurchaseController::class, 'trash'])->name('purchases.trash');
    Route::delete('purchases/trash/{id}/force-delete', [PurchaseController::class, 'forceDelete'])->name('purchases.force.delete');
    Route::get('purchases/trash/{id}/restore', [PurchaseController::class, 'restore'])->name('purchases.restore');
    Route::get('purchases/trash/restore-all', [PurchaseController::class, 'restoreAll'])->name('purchases.restore.all');

    Route::get('purchases/get/specific-category', [PurchaseController::class, 'getSpecificCategory'])->name('get.category');
    Route::get('purchases/get/specific-product', [PurchaseController::class, 'getSpecificProduct'])->name('get.product');
});
