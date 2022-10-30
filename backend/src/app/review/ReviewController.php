<?php

namespace Src\App\Review;

use Src\Helpers\Request;
use Src\Helpers\Response;

class ReviewController
{
    private $service;

    public function __construct()
    {
        $this->service = new ReviewService();
    }

    public function getByMovie($movieId)
    {
        try {
            $params = Request::getBody();
            $movies = $this->service->getByMovie($movieId);
            Response::json(200, $movies);
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }

    public function getByUser()
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

    public function create()
    {
        try {
            $params = Request::getBody();
            $userId = $params->auth->id;
            if (!isset($params->movieId) || !isset($params->content) || !isset($params->score)) {
                $response = array();
                if (!isset($params->movieId)) $response['movieId'] = 'movieId is required';
                if (!isset($params->content)) $response['content'] = 'content is required';
                if (!isset($params->score)) $response['score'] = 'score is required';
                Response::json(400, $response);
            }
            $this->service->create($userId, $params->movieId, $params->content, $params->score);
            Response::json(201, array('msg' => 'Success review add'));
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }
    public function update($movieId)
    {
        try {
            $params = Request::getBody();
            $userId = $params->auth->id;
            if (!isset($params->content) || !isset($params->score)) {
                $response = array();
                if (!isset($params->content)) $response['content'] = 'content is required';
                if (!isset($params->score)) $response['score'] = 'score is required';
                Response::json(400, $response);
            }
            $this->service->update($userId, $movieId, $params->content, $params->score);
            Response::json(201, array('msg' => 'Edit review'));
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
            Response::json(201, array('msg' => 'Delete review'));

        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }
}
