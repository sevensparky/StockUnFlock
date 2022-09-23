<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;

Route::group(['prefix' => 'dashboard'], function () {

    Route::resource('categories', CategoryController::class)->except('show');
    Route::put('categories/{id}/change-status', [CategoryController::class, 'changeStatus'])
        ->name('categories.change.status');
    Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::delete('categories/trash/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.force.delete');
    Route::get('categories/trash/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::get('categories/trash/restore-all', [CategoryController::class, 'restoreAll'])->name('categories.restore.all');
});
