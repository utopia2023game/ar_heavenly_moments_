<?php

// use Illuminate\Support\Facades\Schedule;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

// Schedule::command('delete:cron');

DB::table('screen_shots')->where('id', '<>', '1')->delete();

File::deleteDirectory(public_path('uploads/'));
