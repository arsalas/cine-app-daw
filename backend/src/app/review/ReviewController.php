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

    public function get($id)
    {
        try {
            echo 'get ' . $id;
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }

    public function getAll()
    {
        try {
            echo 'getAll';
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }

    public function create()
    {
        try {
            echo 'create';
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }
    public function update($id)
    {
        try {
            echo 'update ' . $id;
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }

    public function delete($id)
    {
        try {
            echo 'delete ' . $id;
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }
}
