<?php

namespace App\Http\Controllers;

use App\Models\ScreenShot;
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

        // $file_name = rand(1000, 9999) . '_' . $input['data']->getClientOriginalName();
        // // $destinationPath = 'uploads/' . $type . '/' . $file_name;
        $destinationPath = 'uploads/';
        // $input['data']->move($destinationPath, $file_name);

        // try {
        //     $ScreenShot = ScreenShot::create([
        //         'image_path' => $destinationPath . $file_name,
        //     ]);
        //     $data['url_image'] = 'dkndcdakc.ir/' . $destinationPath . $file_name;
        //     $data['url_qr_code'] = 'dkndcdakc.ir/' . $destinationPath . $file_name;
        // } catch (\Throwable $th) {
        //     $data['success'] = false;
        //     return $data;
        // }

        return $this->sizeFormat($this->folderSize($destinationPath));

        // return $data;
    }

    public function sizeFormat($bytes)
    {
        $kb = 1024;
        $mb = $kb * 1024;
        $gb = $mb * 1024;
        $tb = $gb * 1024;

        if (($bytes >= 0) && ($bytes < $kb)) {
            return $bytes . ' B';

        } elseif (($bytes >= $kb) && ($bytes < $mb)) {
            return ceil($bytes / $kb) . ' KB';

        } elseif (($bytes >= $mb) && ($bytes < $gb)) {
            return ceil($bytes / $mb) . ' MB';

        } elseif (($bytes >= $gb) && ($bytes < $tb)) {
            return ceil($bytes / $gb) . ' GB';

        } elseif ($bytes >= $tb) {
            return ceil($bytes / $tb) . ' TB';
        } else {
            return $bytes . ' B';
        }
    }
    public function folderSize($dir)
    {
        $count_size = 0;
        $count = 0;
        $dir_array = scandir($dir);
        foreach ($dir_array as $key => $filename) {
            if ($filename != ".." && $filename != ".") {
                if (is_dir($dir . "/" . $filename)) {
                    $new_foldersize = $this->foldersize($dir . "/" . $filename);
                    $count_size = $count_size + $new_foldersize;
                } else if (is_file($dir . "/" . $filename)) {
                    $count_size = $count_size + filesize($dir . "/" . $filename);
                    $count++;
                }
            }
        }
        return $count_size;
    }

    //   $folder_name = "uploads";
    //   echo sizeFormat(folderSize($folder_name));
}
