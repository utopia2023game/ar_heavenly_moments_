<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreenShotController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('upload_screen_shot', [ScreenShotController::class, 'uploadScreenShot'])->name('uploadScreenShot');
Route::get('/migrate', [ScreenShotController::class, 'migrate'])->name('migrate');