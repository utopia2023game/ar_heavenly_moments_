<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreenShotController;


Route::post('upload_screen_shot', [ScreenShotController::class, 'uploadScreenShot'])->name('uploadScreenShot');