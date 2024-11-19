<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    return view('welcome' , ['image_path' => $request->iph]);
});

// Route::get('/token', function () {
//     return csrf_token(); 
// });

// Route::get('/migrate', [Controller::class, 'migrate'])->name('migrate');