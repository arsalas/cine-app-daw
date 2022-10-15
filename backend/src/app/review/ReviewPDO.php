<?php

namespace Src\App\Review;

use stdClass;

class ReviewPDO
{
    static public function profile($data)
    {
        $profile = new stdClass;
        $profile->name = $data->name;
        $profile->avatar = $data->avatar;
        return $profile;
    }
}
