<?php

// CONFIG
require_once(dirname(__FILE__, 2) . '/src/config/index.php');


// ROUTER
require_once(dirname(__FILE__, 2) . '/src/router/Router.php');

// HELPERS
require_once(dirname(__FILE__, 2) . '/src/helpers/Headers.php');
require_once(dirname(__FILE__, 2) . '/src/helpers/Request.php');
require_once(dirname(__FILE__, 2) . '/src/helpers/Response.php');

// API
require_once(dirname(__FILE__, 2) . '/src/api/ApiController.php');

// AUTH
require_once(dirname(__FILE__, 2) . '/src/app/auth/AuthController.php');
require_once(dirname(__FILE__, 2) . '/src/app/auth/AuthModel.php');
require_once(dirname(__FILE__, 2) . '/src/app/auth/AuthService.php');
require_once(dirname(__FILE__, 2) . '/src/app/auth/AuthRoutes.php');

// MOVIES
require_once(dirname(__FILE__, 2) . '/src/app/movie/MovieController.php');
require_once(dirname(__FILE__, 2) . '/src/app/movie/MovieModel.php');
require_once(dirname(__FILE__, 2) . '/src/app/movie/MovieService.php');
require_once(dirname(__FILE__, 2) . '/src/app/movie/MovieRoutes.php');
require_once(dirname(__FILE__, 2) . '/src/app/movie/MoviePDO.php');
