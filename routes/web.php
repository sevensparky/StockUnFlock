<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
//    return view('welcome');
    return redirect(route('dashboard'));
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
