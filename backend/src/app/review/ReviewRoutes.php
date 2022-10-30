<?php

namespace Src\App\Review;

use Src\Middlewares\Middlewares;

class ReviewRoutes
{
    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new ReviewController();
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
        if (!isset($endpoint[0]) || isset($endpoint[0]) && empty($endpoint[0])) {
            Middlewares::auth();
            return $this->ctrl->getByUser();
        }
        if (isset($endpoint[0]) && !empty($endpoint[0])) {
            return $this->ctrl->getByMovie($endpoint[0]);
        }
    }

    private function post($endpoint)
    {
        if (!isset($endpoint[0])) {
            Middlewares::auth();
            return $this->ctrl->create();
        }
    }
    private function put($endpoint)
    {
        if (isset($endpoint[0]) && !empty($endpoint[0])) {
            Middlewares::auth();
            return $this->ctrl->update($endpoint[0]);
        }
    }
    private function delete($endpoint)
    {
        if (isset($endpoint[0]) && !empty($endpoint[0])) {
            Middlewares::auth();
            return $this->ctrl->delete($endpoint[0]);
        }
    }
}
