<?php

use Illuminate\Support\Facades\Route;
use Modules\PurchaseAndSell\Http\Controllers\SellController;

Route::group([], function() {

    Route::resource('sell', SellController::class)->only(['index', 'create', 'store', 'destroy']);
});
