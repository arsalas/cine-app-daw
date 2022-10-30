<?php

namespace Src\App\Favorite;

use Src\Helpers\Request;
use Src\Helpers\Response;

class FavoriteController
{
    private $service;

    public function __construct()
    {
        $this->service = new FavoriteService();
    }

    public function get()
    {
        try {
            $params = Request::getBody();
            $userId = $params->auth->id;
            $movies = $this->service->getByUser($userId);
            Response::json(201, $movies);
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }

    public function getDetails()
    {
        try {
            $params = Request::getBody();
            $userId = $params->auth->id;
            $movies = $this->service->getDetailsByUser($userId);
            Response::json(201, $movies);
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }

    public function create($movieId)
    {
        try {
            $params = Request::getBody();
            $userId = $params->auth->id;
            $this->service->create($userId, $movieId);
            Response::json(201, array('msg' => 'Success favorite add'));
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }
  
    public function delete($movieId)
    {
        try {
            $params = Request::getBody();
            $userId = $params->auth->id;
            $this->service->delete($userId, $movieId);
            Response::json(201, array('msg' => 'Delete favorite'));

        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }
}
