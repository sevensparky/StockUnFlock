<?php

// use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Morilog\Jalali\Jalalian;
// use Vatttan\Apdf\Apdf;

Route::get('/', function () {
    if (auth()->check()) {
        return to_route('dashboard');
    }
    return to_route('login');
});


Route::get('/test', function () {

    // $pdf = Pdf::loadView('test', ['order' => $this]);
    // return $pdf->download('podcast.pdf');

    // $apdf = new Apdf();
    // $apdf->print(resource_path('views/test'));

    // $pdf = app('dompdf.wrapper');
    // $pdf->loadView('test', ['order' => $this]);
    // return $pdf->download('invoice.pdf');

    $pdf = \PDF::loadView('test', ['order' => $this]);
	return $pdf->download('document.pdf');

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


// $current_date = date('d');
// $date = Carbon::now()->format('d');


// $data = [];

// $data['item'][] = 'kali';
// $data['local'][] = 'sparky';

// dd($data['local']);

});
