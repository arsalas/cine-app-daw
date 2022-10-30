<?php

namespace Src\Helpers;

class Response
{

    public static function json($code, $response)
    {
        header("HTTP/1.1 {$code}");
        echo json_encode($response);
        exit();
    }

    public static function getImage($filename)
    {
        $img = file_get_contents((dirname(__FILE__, 3) . "/images/{$filename}"));
        header('Content-Type: image/jpeg');
        echo $img;
        die();
    }
}
