<?php
namespace App\Http\Helper;

use Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;
class Upload {
    /**
     * 
     * @return string
     */

        public static function create_dir($directory, $name = "") {
            $path = $directory. "/";
            // dd($path);
            $data = Storage::makeDirectory($path, 0777);

            if($data)
                return $data;
            return array('error'=> 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
            }
        


        // 1. melakukan decode pada base64
        // 2. menggunkaan fungsi dari intervention image untuk mengubah menjadi image
        // 3. save file sesuai path file sementara yang sudah ditentukan
        // 4. memasukan file kedalam storage asli yang berada di storage bawaan laravel
        // 5. unlink file 
        public static function changeBase64($base, $dir, $name){
            $convert = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base));
            $img = Image::make($convert);
            $size = strlen((string) $img->encode($img->mime));
            if($size <= 20000000) {
                       // $path = $img->StoreAs($dir, $name);
                // dd(public_path());
                $path_tmb = public_path().'/img/thumbnails/'.Upload::generateRandomString(10).".png";
                
                $img->save($path_tmb);
                $path = Storage::putFileAs($dir, new File($path_tmb), $name);
                unlink($path_tmb);
                return $path;
            }else {
                redirect()
                ->back()
                ->withErrors(sprintf('Gagal Upload , file terlalu besar : %s.', "errors"));
            }
        }

        // public static function upload 

        public function removeDirectory($dir){
            foreach (scandir($dir) as $item){
                if ($item == "." || $item == "..")
                    continue;
    
                if (is_dir($item)){
                    $this->removeDir($item);
                } else {
                    unlink(join(DIRECTORY_SEPARATOR, array($dir, $item)));
                }
    
            }
            if(rmdir($dir)){
                return true;
            }
            else {
                return false;
            }
    
        }
        public static function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        public static function changeDate($hari){
        $hari_tmp= "";
        switch ($hari) {
            case 'Sunday':
                $hari_tmp = "Minggu";
                break;
            case 'Monday':
                $hari_tmp = "Senin";
                break;
            case 'Tuesday':
                $hari_tmp = "Selasa";
                break;
            case 'Wednesday':
                $hari_tmp = "Rabu";
                break;
            case 'Thursday':
                $hari_tmp = "Kamis";
                break;
            case 'Friday':
                $hari_tmp = "Jumat";
                break;
            case 'Saturday':
                $hari_tmp = "Sabtu";
                break;
            default:
                 $hari_tmp = "Minggu";
                break;
        }
        return $hari_tmp;
    }
}