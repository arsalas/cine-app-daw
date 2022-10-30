<?php

namespace Src\App\Profile;

use Src\Config\CONFIG;
use Src\Helpers\Image;
use Src\Helpers\Request;
use Src\Helpers\Response;

class ProfileController
{
    private $service;

    public function __construct()
    {
        $this->service = new ProfileService();
    }

    public function get()
    {
        try {
            $params = Request::getBody();
            $userId = $params->auth->id;
            $profile = $this->service->get($userId);
            Response::json(200, $profile);
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }

    public function update()
    {
        try {
            $params = Request::getBody();
            $userId = $params->auth->id;
            if (!isset($params->name) || !isset($params->avatar)) {
                $response = array();
                if (!isset($params->name)) $response['name'] = 'name is required';
                if (!isset($params->avatar)) $response['avatar'] = 'avatar is required';
                Response::json(400, $response);
            }
            $image = new Image();
            if (isset($_FILES['file'])) $params->avatar = $image->uploadImage($_FILES['file']);
            $imagePath = explode(CONFIG::IMG_URL . 'thumb_', $params->avatar);
            $params->avatar = $imagePath[count($imagePath) - 1];
            $this->service->update($userId, $params->name,  $params->avatar);
            Response::json(200, array('msg' => 'success'));
        } catch (\Exception $ex) {
            Response::json(500, 'Something is wrong');
        }
    }
}
