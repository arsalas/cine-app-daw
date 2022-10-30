<?php

namespace Src\Helpers;

use Exception;
use Src\Config\CONFIG;

class Image
{
   
    public static function uploadImage($file)
    {
        //Filename and extension
        if (isset($file['name'])) {
            $originalname = $file['name'];
            $extension = substr(strrchr($originalname, '.'), 1);
            $time =  time();
            $image_name = $time . '_' . pathinfo($originalname, PATHINFO_FILENAME);
        } else {
            $originalname = $file['name'];
            $extension = pathinfo($originalname, PATHINFO_EXTENSION);
        }
        $type = $file['type'];
        $size = $file['size'];

        if ($file && move_uploaded_file($file['tmp_name'], CONFIG::IMAGES . $time . '_' . $originalname)) {
        } else throw new Exception("ex1");

        // Modifiacion imagen   
        $original_path = CONFIG::IMAGES .  $time . '_' . $originalname;

        // JPG 
        if (preg_match('/jpg|jpeg/', $type))  $original_image_data = imagecreatefromjpeg($original_path);
        // PNG
        if (preg_match('/png/', $type))  $original_image_data = imagecreatefrompng($original_path);


        $original_width = getimagesize($original_path)[0];
        $original_height = getimagesize($original_path)[1];

        // Tamaños

        $media = CONFIG::MEDIA_MAX_WIDTH;

        foreach ($media as $multi => $new_width) {

            $new_name = $multi . '_' . $image_name . '.' . $extension;

            $new_height = $original_height * $new_width / $original_width;

            $hdpi = ImageCreateTrueColor($new_width, $new_height);
            imagecolortransparent($hdpi, imagecolorallocate($hdpi, 0, 0, 0));
            imagecopyresampled($hdpi, $original_image_data, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

            if (preg_match('/jpg|jpeg/', $type)) {
                imagejpeg($hdpi, CONFIG::IMAGES . $new_name, 90);
            } else if (preg_match('/png/', $type)) {
                imagepng($hdpi, CONFIG::IMAGES . $new_name);
            }
        }
        $response = $image_name . '.' . $extension;


        return $response;
    }
}
