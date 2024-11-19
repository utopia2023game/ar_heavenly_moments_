<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

abstract class Controller
{
    //
    public function migrate()
    {
        $value = 'status';
        dd();
        $input = Request()->all();
        try {
            $id = $request->id;
            if ($id == 0) {
                $value = 'install';
            } else if ($id == 1) {
                $value = 'refresh';
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        Artisan::call('migrate:' . $value);
    }
    //
    public function migrateByDataBaseName(Request $request)
    {
        Artisan::call('migrate --database=' . $request->dbName);
    }
}
