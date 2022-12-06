<?php

namespace Src\App\Movie;

use MoviePDO;
use Src\Api\ApiController;
use Src\Helpers\Request;
use stdClass;

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
        $responseVideos = $this->api->request('movie/' . $id . '/videos');
        if (isset($responseVideos->results[0])) $response->video = $responseVideos->results[0];
        return MoviePDO::movieDetails($response);
    }

    public function getBasicMovie($id)
    {
        $response = $this->api->request('movie/' . $id);
        if (!isset($response) || isset($response->success)) return false;
        return MoviePDO::movie($response);
    }

    public function getNowPlaying($params)
    {
        $query = Request::createQueryString($params);
        $response = $this->api->request('movie/now_playing', $query);
        if (!isset($response) || isset($response->success)) return false;
        return MoviePDO::nowPlaying($response);
    }

    public function getPopulars($params)
    {
        $query = Request::createQueryString($params);
        $response = $this->api->request('movie/popular', $query);
        if (!isset($response) || isset($response->success)) return false;
        return MoviePDO::populars($response);
    }
}
