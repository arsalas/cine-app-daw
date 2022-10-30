<?php

namespace Src\App\Favorite;

use Src\Middlewares\Middlewares;

class FavoriteRoutes
{
    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new FavoriteController();
    }

    public function start($method, $endpoint)
    {
        if ($method == 'GET') $this->get($endpoint);
        if ($method == 'POST') $this->post($endpoint);
        if ($method == 'PUT') $this->put($endpoint);
        if ($method == 'DELETE') $this->delete($endpoint);
    }

    private function get($endpoint)
    {
        // LISTA
        if (!isset($endpoint[0]) || isset($endpoint[0]) && empty($endpoint[0])) {
            Middlewares::auth();
            return $this->ctrl->getDetails();
        }
        //DETALLES
        if ($endpoint[0] == 'list') {
            Middlewares::auth();
            return $this->ctrl->get();
        }
    }

    private function post($endpoint)
    {
        if (isset($endpoint[0]) && !empty($endpoint[0])) {
            Middlewares::auth();
            return $this->ctrl->create($endpoint[0]);
        }
    }

    private function put($endpoint)
    {
    }

    private function delete($endpoint)
    {
        if (isset($endpoint[0]) && !empty($endpoint[0])) {
            Middlewares::auth();
            return $this->ctrl->delete($endpoint[0]);
        }
    }
}
