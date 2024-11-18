<?php

namespace App\Http\Controllers;

use App\Models\ScreenShot;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

class ScreenShotController extends Controller
{
    //

    public function uploadScreenShot()
    {

        $input = Request()->all();
        // dd($input);
        $data = array();
        $data['url_image'] = '';
        $data['url_qr_code'] = '';
        $data['success'] = true;

        $file_name = rand(1000, 9999) . '_' . $input['data']->getClientOriginalName();
        // $destinationPath = 'uploads/' . $type . '/' . $file_name;
        $destinationPath = 'uploads/';
        $input['data']->move($destinationPath, $file_name);

        try {
            $ScreenShot = ScreenShot::create([
                'image_path' => $destinationPath . $file_name,
            ]);
            $data['url_image'] = 'dkndcdakc.ir/' . $destinationPath . $file_name;
            $data['url_qr_code'] = 'dkndcdakc.ir/' . $destinationPath . $file_name;
        } catch (Exception $e) {
            $data['success'] = false;
            return $data;
        }

        return $data;
    }
}
