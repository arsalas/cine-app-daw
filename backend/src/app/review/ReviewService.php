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

    public function update($userId, $name, $avatar)
    {
        // $res = $this->model->insertOrUpdate($userId, $name, $avatar);
        // if (!$res)
        //     throw new Exception("Something is wrong", 1);
    }

    public function get($userId)
    {
        $res = $this->model->selectOne($userId);
        if (!$res)
            throw new Exception("Something is wrong", 1);
        return ReviewPDO::profile($res);
    }
}
