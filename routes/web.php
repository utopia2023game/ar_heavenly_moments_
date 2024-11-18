<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreenShotController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/token', function () {
    return csrf_token(); 
});

Route::post('upload_screen_shot', [ScreenShotController::class, 'uploadScreenShot'])->name('uploadScreenShot');

// Route::get('/upload_screen_shot', [ScreenShotController::class, 'uploadScreenShot'])->name('uploadScreenShot');