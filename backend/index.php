<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Content-Type: text/html; charset=utf-8');

$method = $_SERVER['REQUEST_METHOD'];
var_dump($method);
echo '<br>';
var_dump($_GET['uri']);
echo '<br>';
include_once('./src/api/ApiController.php');

$api = new ApiController();
$data = $api->request('movie/58');
// var_dump($data);
$img = json_decode($data)->poster_path;

echo "<img src='https://image.tmdb.org/t/p/w220_and_h330_face{$img}'>";

if ($method == "OPTIONS") {
    die();
}