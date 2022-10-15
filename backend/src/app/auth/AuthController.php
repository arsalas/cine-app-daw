<?php

namespace Src\App\Auth;

use Src\Helpers\Helpers;
use Src\Helpers\Request;
use Src\Helpers\Response;

class AuthController
{
    private $service;

    public function __construct()
    {
        $this->service = new AuthService();
    }

    public function signin()
    {
        try {
            $params = Request::getBody();
            if (!isset($params->email) || !isset($params->password)) {
                $response = array();
                if (!isset($params->email)) $response['email'] = 'email is required';
                if (!isset($params->password)) $response['password'] = 'password is required';
                Response::json(400, $response);
            }
            $email = $params->email;
            $password = $params->password;
            if (!Helpers::validateEmail($email))
                Response::json(401, array('eamil' => 'Incorrect format'));
            $this->service->signin($email, $password);
            Response::json(201, 'Success register');
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }

    public function login()
    {
        try {
            $params = Request::getBody();
            if (!isset($params->email) || !isset($params->password)) {
                $response = array();
                if (!isset($params->email)) $response['email'] = 'email is required';
                if (!isset($params->password)) $response['password'] = 'password is required';
                Response::json(400, $response);
            }
            $email = $params->email;
            $password = $params->password;
            $jwt = $this->service->login($email, $password);
         
            Response::json(200, array('token' => $jwt));
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }
}
