<?php

namespace Src\Helpers;

class Helpers
{
    public static function encryptPassword($password)
    {
        return hash('sha256', $password);
    }

    public static function validateEmail($email)
    {
        $matches = null;
        return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $email, $matches));
    }
}
