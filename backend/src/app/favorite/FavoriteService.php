<?php

namespace Src\App\Favorite;

use Exception;
use MoviePDO;
use Src\App\Movie\MovieService;

class FavoriteService
{
    private $model;

    public function __construct()
    {
        $this->model = new FavoriteModel();
    }

    public function getByUser($userId)
    {
        $res = $this->model->selectAllByUser($userId);
        if (!isset($res))
            throw new Exception("Something is wrong", 1);
        return $res;
    }

    public function getDetailsByUser($userId)
    {
        $res = $this->model->selectAllByUser($userId);
        if (!isset($res))
            throw new Exception("Something is wrong", 1);
        $result = array_map(function ($movie) {
            $movieService = new MovieService();
            $movieDetails = $movieService->getBasicMovie($movie->movieId);
            if ($movieDetails) return $movieDetails;
        }, $res);
        return $result;
    }

    public function create($userId, $movieId)
    {
        $res = $this->model->insert($userId, $movieId);
        if (!isset($res))
            throw new Exception("Something is wrong", 1);
    }


    public function delete($userId, $movieId)
    {
        $res = $this->model->delete($userId, $movieId);
        if (!isset($res))
            throw new Exception("Something is wrong", 1);
    }
}
