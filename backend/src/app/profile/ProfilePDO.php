<?php

namespace Src\App\Profile;

use stdClass;

class ProfilePDO
{
    static public function profile($data)
    {
        $profile = new stdClass;
        $profile->name = $data->name;
        $profile->avatar = $data->avatar;
        return $profile;
    }
}
