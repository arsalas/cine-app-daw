<?php

namespace Src\App\Profile;

use Src\Config\CONFIG;
use stdClass;

class ProfilePDO
{
    static public function profile($data)
    {
        $profile = new stdClass;
        $profile->id = $data->userId;
        $profile->name = $data->name;
        $profile->avatar = CONFIG::IMG_URL . 'thumb_' . $data->avatar;
        return $profile;
    }
}
