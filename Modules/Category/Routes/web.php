<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;
use Modules\Category\Http\Controllers\SubcategoryController;

Route::group(['prefix' => 'dashboard'], function () {

    Route::resource('categories', CategoryController::class)->except('show');
    Route::put('categories/{id}/change-status', [CategoryController::class, 'changeStatus'])
        ->name('categories.change.status');
    Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::delete('categories/trash/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.force.delete');
    Route::get('categories/trash/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::get('categories/trash/restore-all', [CategoryController::class, 'restoreAll'])->name('categories.restore.all');

    Route::resource('subcategories', SubcategoryController::class)->except('show');
    Route::put('subcategories/{id}/change-status', [SubcategoryController::class, 'changeStatus'])
        ->name('subcategories.change.status');
    Route::get('subcategories/trash', [SubcategoryController::class, 'trash'])->name('subcategories.trash');
    Route::delete('subcategories/trash/{id}/force-delete', [SubcategoryController::class, 'forceDelete'])->name('subcategories.force.delete');
    Route::get('subcategories/trash/{id}/restore', [SubcategoryController::class, 'restore'])->name('subcategories.restore');
    Route::get('subcategories/trash/restore-all', [SubcategoryController::class, 'restoreAll'])->name('subcategories.restore.all');
});
