<?php

use Src\Api\ApiController;
use Src\App\Movie\MovieController;
use Src\Helpers\Headers;
use Src\Helpers\Request;
use Src\Helpers\Response;
use Src\Router\Router;

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Content-Type: text/json; charset=utf-8');

$method = $_SERVER['REQUEST_METHOD'];
include_once('./includes/index.php');

if ($method == "OPTIONS") {
    die();
}
$router = new Router();
$router->start();

// Response::json(200, $data);
