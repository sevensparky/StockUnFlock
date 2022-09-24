<?php

use Illuminate\Support\Facades\Route;
use Modules\Unit\Http\Controllers\UnitController;

Route::group(['prefix' => 'dashboard'], function () {

    Route::resource('units', UnitController::class)->except('show');
    Route::put('units/{id}/change-status', [UnitController::class, 'changeStatus'])
        ->name('units.change.status');
    Route::get('units/trash', [UnitController::class, 'trash'])->name('units.trash');
    Route::delete('units/trash/{id}/force-delete', [UnitController::class, 'forceDelete'])->name('units.force.delete');
    Route::get('units/trash/{id}/restore', [UnitController::class, 'restore'])->name('units.restore');
    Route::get('units/trash/restore-all', [UnitController::class, 'restoreAll'])->name('units.restore.all');
});
