<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScreenShot extends Model
{
    /** @use HasFactory<\Database\Factories\ScreenShotFactory> */
    use HasFactory , SoftDeletes;

    var $guarded = ['id'];
}
