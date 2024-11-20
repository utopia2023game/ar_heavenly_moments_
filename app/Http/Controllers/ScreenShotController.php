<?php

namespace App\Http\Controllers;

use App\Models\ScreenShot;
use Illuminate\Http\Request;

class ScreenShotController extends Controller
{
    
    public function uploadScreenShot()
    {

        $input = Request()->all();
        $data = array();
        $data['url_qr_code'] = '';
        $data['success'] = 0;

        return 'hello';
        return filetype($input['data']);

        $format = substr($input['data']->getClientOriginalName(),-4);
        $file_name = $this->generateUnique() . $format;
        $destinationPath = 'uploads/';
        $input['data']->move($destinationPath, $file_name);

        try {
            $ScreenShot = ScreenShot::create([
                'image_path' =>  $file_name,
            ]);
            
            $url_image = 'https://a.mersadstudio.ir/?iph='. $file_name;
            $data['url_qr_code'] = 'https://api.qrserver.com/v1/create-qr-code/?data=' . $url_image . '&size=200x200';
            $data['success'] = $ScreenShot->id;
        } catch (\Throwable $th) {
            return $data;
        }
        
        

        // return [$data ,$this->sizeFormat($this->folderSize($destinationPath))];

        return $data;
    }
    
    
    public static function generateUnique()
    {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $characters = '0123456789';
        $charactersNumber = strlen($characters);
        $codeLength = 32;

        $code = '';

        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code . $character;
        }

        return $code;

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
