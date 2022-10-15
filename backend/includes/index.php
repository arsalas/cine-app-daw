<?php

// CONFIG
require_once(dirname(__FILE__, 2) . '/src/config/index.php');

// DATABASE
require_once(dirname(__FILE__, 2) . '/src/database/DbConnector.php');

// ROUTER
require_once(dirname(__FILE__, 2) . '/src/router/Router.php');

// MIDDLEWARES
require_once(dirname(__FILE__, 2) . '/src/middlewares/Auth.php');

// HELPERS
require_once(dirname(__FILE__, 2) . '/src/helpers/Headers.php');
require_once(dirname(__FILE__, 2) . '/src/helpers/Request.php');
require_once(dirname(__FILE__, 2) . '/src/helpers/Response.php');
require_once(dirname(__FILE__, 2) . '/src/helpers/Helpers.php');
require_once(dirname(__FILE__, 2) . '/src/helpers/JWT.php');

// API
require_once(dirname(__FILE__, 2) . '/src/api/ApiController.php');

// AUTH
require_once(dirname(__FILE__, 2) . '/src/app/auth/AuthController.php');
require_once(dirname(__FILE__, 2) . '/src/app/auth/AuthModel.php');
require_once(dirname(__FILE__, 2) . '/src/app/auth/AuthService.php');
require_once(dirname(__FILE__, 2) . '/src/app/auth/AuthRoutes.php');

// PROFILE
require_once(dirname(__FILE__, 2) . '/src/app/profile/ProfileController.php');
require_once(dirname(__FILE__, 2) . '/src/app/profile/ProfileModel.php');
require_once(dirname(__FILE__, 2) . '/src/app/profile/ProfileService.php');
require_once(dirname(__FILE__, 2) . '/src/app/profile/ProfileRoutes.php');
require_once(dirname(__FILE__, 2) . '/src/app/profile/ProfilePDO.php');

// REVIEW
require_once(dirname(__FILE__, 2) . '/src/app/review/ReviewController.php');
require_once(dirname(__FILE__, 2) . '/src/app/review/ReviewModel.php');
require_once(dirname(__FILE__, 2) . '/src/app/review/ReviewService.php');
require_once(dirname(__FILE__, 2) . '/src/app/review/ReviewRoutes.php');
require_once(dirname(__FILE__, 2) . '/src/app/review/ReviewPDO.php');

// MOVIES
require_once(dirname(__FILE__, 2) . '/src/app/movie/MovieController.php');
require_once(dirname(__FILE__, 2) . '/src/app/movie/MovieModel.php');
require_once(dirname(__FILE__, 2) . '/src/app/movie/MovieService.php');
require_once(dirname(__FILE__, 2) . '/src/app/movie/MovieRoutes.php');
require_once(dirname(__FILE__, 2) . '/src/app/movie/MoviePDO.php');
