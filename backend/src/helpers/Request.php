<?php

namespace Src\Helpers;

use stdClass;

class Request
{

    static public function getBody()
    {
        $body = $_POST;
        $payload = file_get_contents('php://input');
        $body = array_merge($body, json_decode($payload, true));
        $request = new stdClass;
        if (isset($body) && !empty($body)) {
            foreach ($body as $key => $post) {
                $request->$key = $post;
            }
        }
        return $request;
    }

    static public function getQueryStrings()
    {
        return json_decode(json_encode($_GET));
    }

    static public function createQueryString($params)
    {
        $query = '';
        foreach ($params as $key => $value) {
            $query .= '&' . $key . '=' . $value;
        }
        return $query;
    }
}
