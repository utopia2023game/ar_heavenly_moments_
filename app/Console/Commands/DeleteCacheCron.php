<?php

namespace App\Console\Commands;

use App\Models\ScreenShot;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class DeleteCahcheCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deletecache:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command cache description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        Artisan::call('optimize:clear');

        info("Cron Job cache running at ". now());
    }
}
