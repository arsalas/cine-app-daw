<?php

namespace Src\App\Review;

use Exception;

class ReviewService
{
    private $model;

    public function __construct()
    {
        $this->model = new ReviewModel();
    }

    public function getByUser($userId)
    {
        $res = $this->model->selectAllByUser($userId);
        if (!isset($res))
            throw new Exception("Something is wrong", 1);
        return $res;
    }

    public function getByMovie($movieId)
    {
        $res = $this->model->selectAllByMovie($movieId);
        if (!isset($res))
            throw new Exception("Something is wrong", 1);
        return ReviewPDO::review($res);
    }

    public function create($userId, $movieId, $content, $score)
    {
        $params = array(
            'userId' => $userId,
            'movieId' => $movieId,
            'content' => $content,
            'score' => $score
        );
        $res = $this->model->insert($params);
        if (!isset($res))
            throw new Exception("Something is wrong", 1);
    }

    public function update($userId, $movieId, $content, $score)
    {
        $params = array(
            'userId' => $userId,
            'movieId' => $movieId,
            'content' => $content,
            'score' => $score
        );
        $res = $this->model->update($params);
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
