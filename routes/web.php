<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Morilog\Jalali\Jalalian;

Route::get('/', function () {
    if (auth()->check()) {
        return to_route('dashboard');
    }
    return to_route('login');
});


Route::get('/test', function () {


    // to database convert timestamp
$user = auth()->user()->created_at;
// $jDate = Jalalian::fromDateTime($user)->getTimestamp();

// get timestamp to jalali
$jDate = Jalalian::fromDateTime($user);

    dd($jDate);

});
