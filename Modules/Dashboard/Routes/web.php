<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::prefix('dashboard')->group(function() {
    Route::get('panel', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
});
