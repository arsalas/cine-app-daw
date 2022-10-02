<?php

namespace Src\App\Movie;

use Src\Helpers\Request;

class MovieRoutes
{
    private $ctrl;

    public function __construct()
    {
        $this->ctrl = new MovieController();
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
        // SEARCH
        if ($endpoint[0] == 'search')
            return $this->ctrl->searchMovie(Request::getQueryStrings());
        // POPULARES
        if ($endpoint[0] == 'populars');
        return $this->ctrl->getPopulars(Request::getQueryStrings());
        // RECIENTES
        if ($endpoint[0] == 'now_playing')
            return $this->ctrl->getNowPlaying(Request::getQueryStrings());
        // BYID
        return $this->ctrl->getMovie($endpoint[0]);
    }

    private function post($endpoint)
    {
    }
    private function put($endpoint)
    {
    }
    private function delete($endpoint)
    {
    }
}
