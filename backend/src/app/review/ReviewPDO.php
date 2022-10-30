<?php

namespace Src\App\Review;

use Src\Config\CONFIG;
use stdClass;

class ReviewPDO
{
    static public function review($data)
    {
        $reviews =  array_map(function ($arr) {
            $review = new stdClass;
            $review->movieId = $arr->movieId;
            $review->userId = $arr->userId;
            $review->content = $arr->content;
            $review->score = $arr->score;
            $review->createdAt = $arr->createdAt;
            $review->name = $arr->name;
            $review->avatar = CONFIG::IMG_URL . 'thumb_' . $arr->avatar;
            return $review;
        }, $data);
        return $reviews;
    }
}
