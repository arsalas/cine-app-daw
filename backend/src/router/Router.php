<?php

namespace Src\Router;

use Src\App\Movie\MovieRoutes;

class Router
{
    private $method;
    private $uri;


    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_GET['uri'];
    }

    private function parseRoute()
    {
        $endpoint = explode('/', $this->uri);
        $this->matchRoute($endpoint);
    }

    private function matchRoute($endpoint)
    {
        $route = array_shift($endpoint);
        // $endpoint = implode('/', $endpoint);
        switch ($route) {
            case 'movies':
                $moviesRouter = new MovieRoutes();
                return $moviesRouter->start($this->method, $endpoint);
            default:
                echo 'NOT FOUND';
                die();
        }
    }

    public function start()
    {
        $this->parseRoute();
    }

    public function get(...$arg)
    {
        $endpoint = $arg[0];
        for ($i = 1; $i < count($arg); $i++) {
            if ($i == count($arg)) {
                echo 'FIN';
            }
        }
    }
}
