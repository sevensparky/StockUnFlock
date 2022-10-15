<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function() {

    Route::get('panel', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile.index');
    Route::get('profile/user/info/{user}', [DashboardController::class, 'edit'])->name('profile.edit');
    Route::put('profile/user/info/{user}', [DashboardController::class, 'update'])->name('profile.update');
    Route::get('profile/password/change', [DashboardController::class, 'view'])->name('password.view');
    Route::post('profile/password/change', [DashboardController::class, 'changePassword'])->name('password.change');
    Route::get('calendar/year', [DashboardController::class, 'calendar'])->name('calendar.index');
});
