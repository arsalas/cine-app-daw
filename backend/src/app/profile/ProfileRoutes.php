<?php

namespace Src\App\Profile;

use Src\Middlewares\Middlewares;

class ProfileRoutes
{
    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new ProfileController();
    }

    public function start($method, $endpoint)
    {
        // call_user_func_array();
        if ($method == 'GET') $this->get($endpoint);
        if ($method == 'POST') $this->post($endpoint);
        if ($method == 'PUT') $this->put($endpoint);
        if ($method == 'DELETE') $this->delete($endpoint);
    }

    private function get($endpoint)
    {
        if (!isset($endpoint[0])) {
            Middlewares::auth();
            return $this->ctrl->get();
        }
    }

    private function post($endpoint)
    {
        if (!isset($endpoint[0])) {
            Middlewares::auth();
            return $this->ctrl->update();
        }
    }
    private function put($endpoint)
    {
    }
    private function delete($endpoint)
    {
    }
}
