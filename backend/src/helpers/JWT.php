<?php

namespace Src\Helpers;

use Src\Config\CONFIG;

class JWT
{
    public static function create($payload)
    {
        $header = array('alg' => "HS256", 'typ' => "JWT");
        $header = base64_encode(json_encode($header));
        $payload = base64_encode(json_encode($payload));
        $signature = $header . "." . $payload . "." . CONFIG::SECRET_KEY;
        $signature = hash('sha256', $signature);
        return $header . "." . $payload . "." . $signature;
    }

    public static function verify($jwt)
    {
        $tokens = explode('.', $jwt);
        $payload = json_decode(base64_decode($tokens[1]));
        if (JWT::create($payload) != $jwt) return false;
        return $payload;
    }
}
