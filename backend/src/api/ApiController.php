<?php

namespace Src\Api;

use Src\Config\CONFIG;

class ApiController
{

    private $url;
    private $version;
    private $apiKey;
    private $language;

    public function __construct()
    {
        $this->url = CONFIG::$API_URL;
        $this->version = '3';
        $this->apiKey = '02f8759072418de3732f85461524e6e9';
        $this->language = 'es';
    }

    public function request($endpoint, $query = '')
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->url . '/' . $this->version . '/' . $endpoint . '?api_key=' . $this->apiKey . $query . '&language=' . $this->language);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            if ($data) return json_decode($data);
            return false;
        } catch (\Exception $ex) {
            return false;
        }
    }
}
