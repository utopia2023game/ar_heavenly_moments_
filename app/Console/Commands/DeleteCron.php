<?php

namespace App\Console\Commands;

use App\Models\ScreenShot;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DeleteCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        info("Cron Job running at ". now());

        DB::table('screen_shots')->delete(); 
 
        File::deleteDirectory(public_path('uploads/'));
    }
}
