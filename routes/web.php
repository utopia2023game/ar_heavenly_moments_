<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/token', function () {
//     return csrf_token(); 
// });

// Route::get('/migrate', [Controller::class, 'migrate'])->name('migrate');