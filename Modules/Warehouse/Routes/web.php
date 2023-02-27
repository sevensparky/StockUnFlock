<?php

use Illuminate\Support\Facades\Route;
use Modules\Warehouse\Http\Controllers\WarehouseController;

/*
|--------------------------------------------------------------------------
| Web Warehouse Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function() {

    Route::resource('warehouses', WarehouseController::class)->except('show');
    Route::put('warehouses/{id}/change-status', [WarehouseController::class, 'changeStatus'])
        ->name('warehouses.change.status');
    Route::get('warehouses/trash', [WarehouseController::class, 'trash'])->name('warehouses.trash');
    Route::delete('warehouses/trash/{id}/force-delete', [WarehouseController::class, 'forceDelete'])->name('warehouses.force.delete');
    Route::get('warehouses/trash/{id}/restore', [WarehouseController::class, 'restore'])->name('warehouses.restore');
    Route::get('warehouses/trash/restore-all', [WarehouseController::class, 'restoreAll'])->name('warehouses.restore.all');
});
