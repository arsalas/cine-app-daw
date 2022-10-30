<?php

namespace Src\Config;

class CONFIG
{
    const SECRET_KEY = '$CINEAPP2022$';
    const API_URL = 'https://api.themoviedb.org';
    const API_IMG_URL = 'https://image.tmdb.org/t/p/w220_and_h330_face';
    const API_IMG_URL_BACKDROP = 'https://image.tmdb.org/t/p/w500';

    const IMG_URL = 'http://localhost/cine-app/backend/images/';

    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_DATABASE = 'cine_app';

    const IMAGES = "./images/";
    const MEDIA_MAX_WIDTH = array('thumb' => 150);
}
