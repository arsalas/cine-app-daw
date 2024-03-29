<?php

namespace Src\App\Auth;

class AuthRoutes
{
    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new AuthController();
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
    }

    private function post($endpoint)
    {
        //REGISTER
        if ($endpoint[0] == 'signin')
            return $this->ctrl->signin();
        // LOGIN
        if ($endpoint[0] == 'login')
            return $this->ctrl->login();
    }
    private function put($endpoint)
    {
    }
    private function delete($endpoint)
    {
    }
}
