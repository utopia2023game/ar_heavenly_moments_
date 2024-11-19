<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

abstract class Controller
{
    //
    public function migrate()
    { 
        
        $input = Request()->all();
        try {
            $id = $input['id'];
            if ($id == 0) {
                Artisan::call('migrate:install');
            } else if ($id == 1) {
                Artisan::call('migrate:refresh');
            }else{
                Artisan::call('migrate:status');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        dd(Artisan::output());
    }
    //
    public function migrateByDataBaseName(Request $request)
    {
        Artisan::call('migrate --database=' . $request->dbName);
    }
}
