<?php

namespace Src\Config;

class CONFIG
{
    static public $SECRET_KEY = '$CINEAPP2022$';
    static public $API_URL = 'https://api.themoviedb.org';
    static public $API_IMG_URL = 'https://image.tmdb.org/t/p/w220_and_h330_face';

    static public $DB_DRIVER = 'mysql';
    static public $DB_HOST = 'localhost';
    static public $DB_USERNAME = 'root';
    static public $DB_PASSWORD = '';
    static public $DB_DATABASE = 'cine_app';
}
