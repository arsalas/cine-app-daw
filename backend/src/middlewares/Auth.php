<?php

namespace Src\Middlewares;

use Src\Helpers\Headers;
use Src\Helpers\JWT;
use Src\Helpers\Response;

class Middlewares
{
    static public function auth()
    {
        $token = Headers::token();
        $auth = JWT::verify($token);
        if (!$auth)  Response::json(401, 'Invalid credentials');
        $_POST['auth'] = $auth;
    }
}
