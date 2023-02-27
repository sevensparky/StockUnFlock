<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;

Route::group(['prefix' => 'dashboard'], function () {

    Route::resource('products', ProductController::class)->except('show');
    Route::put('products/{product}/change-status', [ProductController::class, 'changeStatus'])
        ->name('products.change.status');
    Route::get('products/trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::delete('products/trash/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('products.force.delete');
    Route::get('products/trash/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::get('products/trash/restore-all', [ProductController::class, 'restoreAll'])->name('products.restore.all');
});
