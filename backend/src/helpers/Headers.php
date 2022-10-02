<?php

namespace Src\Helpers;

class Headers
{

    static public function get()
    {
        return apache_request_headers();
    }

    public static function token()
    {

        $headers = apache_request_headers();
        if (isset($headers['Authorization'])) {
            // $sanitizer  = new Sanitizer(array('Authorization' => $headers['Authorization']), array('Authorization' => 'trim|escape'));
            // $response = $sanitizer->sanitize();
            // $response = $response['Authorization'];
            $response = $headers['Authorization'];
        } else {
            $response = null;
        }
        return  $response;
    }
}
