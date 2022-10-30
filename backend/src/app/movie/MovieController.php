<?php

namespace Src\App\Movie;

use Src\Helpers\Response;

class MovieController
{

    private $service;



    public function __construct()
    {
        $this->service = new MovieService();
    }

    public function getAllMovies()
    {
    }

    public function getMovie($id)
    {
        Response::json(200, $this->service->getMovie($id));
    }

    public function getNowPlaying($request)
    {
        $query = array(
            'page' => isset($query['page']) ? $request->page : 1
        );
        Response::json(200, $this->service->getNowPlaying($query));
    }

    public function getPopulars($request)
    {
        $query = array(
            'page' => isset($query['page']) ? $request->page : 1
        );
        Response::json(200, $this->service->getPopulars($query));
    }

    public function searchMovie($request)
    {
        // TODO -> mover a un helper el replace
        // TODO -> validar params
        if (!isset($request->query)) return false;
        $query = array(
            'query' => str_replace(' ', '%20', $request->query),
            'page' => isset($request->page) ? $request->page : 1
        );
        $response = $this->service->searchMovie($query);
        Response::json(200, $response);
    }
}
