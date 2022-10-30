<?php

namespace Src\Controllers;

use Src\Helpers\Response;

class ImageController
{
    public function start($method, $endpoint)
    {
        if ($method == 'GET') {
            Response::getImage($endpoint[0]);
        }
    }
}
