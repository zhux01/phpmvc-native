<?php
if( !session_id() ) session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use Zhux\Core\Router;
use Zhux\Controllers\HomeController;
use Zhux\Middleware\AuthMiddleware;
//use Zhux\Controller\ProductController;

//Router::add('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', ProductController::class, 'categories');

Router::add('GET', '/',HomeController::class, 'index');
Router::add('GET', '/user',HomeController::class, 'user',[AuthMiddleware::class]);
Router::add('POST', '/uploader', HomeController::class, 'uploader');

Router::run();