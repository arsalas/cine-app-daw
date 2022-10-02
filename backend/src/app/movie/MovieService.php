<?php

namespace Src\App\Movie;

use MoviePDO;
use Src\Api\ApiController;
use Src\Helpers\Request;
use stdClass;

// TODO: comprobar errores

class MovieService
{
    private $api;

    public function __construct()
    {
        $this->api = new ApiController();
    }

    public function searchMovie($params)
    {
        $query = Request::createQueryString($params);
        $response = $this->api->request('search/movie', $query);
        if (!isset($response) || isset($response->success)) return false;
        return MoviePDO::search($response);
    }

    public function getMovie($id)
    {
        $response = $this->api->request('movie/' . $id);
        if (!isset($response) || isset($response->success)) return false;
        return MoviePDO::movieDetails($response);
    }

    public function getNowPlaying($params)
    {
        $query = Request::createQueryString($params);
        $response = $this->api->request('movie/now_playing', $query);
        if (!isset($response) || isset($response->success)) return false;
        // TODO validar si quiero paginar esto y agregar query string
        return MoviePDO::nowPlaying($response);
    }

    public function getPopulars($params)
    {
        $query = Request::createQueryString($params);
        $response = $this->api->request('movie/popular', $query);
        if (!isset($response) || isset($response->success)) return false;
        // TODO validar si quiero paginar esto y agregar query string
        return MoviePDO::populars($response);
    }
}
