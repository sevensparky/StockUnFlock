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
// $user = auth()->user()->created_at;
// $jDate = Jalalian::fromDateTime($user)->getTimestamp();

// get timestamp to jalali
// $jDate = Jalalian::fromDateTime($user);

    // dd($jDate);


    // date_default_timezone_set('Asia/Tehran');
    // $date = date('m/d/Y h:i:s a', time());
// echo "The current server timezone is: " . $timezone;

// echo(date("d"));


$current_date = date('d');
$date = Carbon::now()->format('d');


$data = [];

$data['item'][] = 'kali';
$data['local'][] = 'sparky';

dd($data['local']);

});
