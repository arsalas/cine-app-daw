<?php

namespace Src\App\Favorite;

use stdClass;

class FavoritePDO
{
    static public function profile($data)
    {
        $profile = new stdClass;
        $profile->name = $data->name;
        $profile->avatar = $data->avatar;
        return $profile;
    }
}
