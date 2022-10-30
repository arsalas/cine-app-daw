<?php

namespace Src\App\Auth;

use Exception;
use Src\Helpers\Helpers;
use Src\Helpers\JWT;

class AuthService
{
    private $model;

    public function __construct()
    {
        $this->model = new AuthModel();
    }

    public function signin($email, $password)
    {
        $res = $this->model->insert($email, Helpers::encryptPassword($password));
        if (!$res) throw new Exception("Something is wrong", 1);
        
    }

    public function login($email, $password)
    {
        $res = $this->model->selectOne($email, Helpers::encryptPassword($password));
        if (!$res)
            throw new Exception("Something is wrong", 1);
        $jwt = JWT::create(array('id' => $res->id, 'createdAt' => $res->createdAt));
        return $jwt;
    }
}
