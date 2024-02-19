<?php

use Admin\Asm\Controllers\Admin\CategoryController;
use Admin\Asm\Controllers\Admin\DashboardController;
use Admin\Asm\Controllers\Admin\PostController;
use Admin\Asm\Controllers\Admin\UserController;
use Admin\Asm\Controllers\Client\AuthenticateController;
use Admin\Asm\Controllers\Client\ClientCategoryController;
use Admin\Asm\Controllers\Client\HomeController;
use Admin\Asm\Controllers\Client\PostController  as ClientPostController;
use Bramus\Router\Router;

// Create Router instance
$router = new Router();
// Define routes
$router->get('/', HomeController::class . '@index');

$router->match('GET|POST', '/auth/login', AuthenticateController::class . '@login');
$router->get('/post/{id}', ClientPostController::class . '@show');

$router->get('/category/{id}', ClientCategoryController::class . '@show');


$router->mount('/admin', function () use ($router) {
    $router->get('/', DashboardController::class . '@index');
    $router->get('/logout' , AuthenticateController::class . '@logout');


    $router->mount('/users', function () use ($router) {
        $router->get('/',  UserController::class . '@index');
        $router->get('/{id}/show',  UserController::class . '@show');
        $router->get('/{id}/delete',  UserController::class . '@delete');
        $router->match('GET|POST', '/{id}/update', UserController::class . '@update');
        $router->match('GET|POST', '/create',  UserController::class . '@create');
    });

    $router->mount('/categories', function () use ($router) {
        $router->get('/',  CategoryController::class . '@index');
        $router->get('/{id}/show',  CategoryController::class . '@show');
        $router->get('/{id}/delete',  CategoryController::class . '@delete');
        $router->match('GET|POST', '/{id}/update', CategoryController::class . '@update');
        $router->match('GET|POST', '/create',  CategoryController::class . '@create');
    });
    $router->mount('/posts', function () use ($router) {
        $router->get('/',  PostController::class . '@index');
        $router->get('/{id}/show',  PostController::class . '@show');
        $router->get('/{id}/delete',  PostController::class . '@delete');
        $router->match('GET|POST', '/{id}/update', PostController::class . '@update');
        $router->match('GET|POST', '/create',  PostController::class . '@create');
    });
});

$router->before('GET|POST', '/admin/*', function() {
    if(!isset($_SESSION['user'])){
        header("Location: /auth/login ");
        exit() ;
    }
});

$router->before('GET|POST', '/admin/.*', function() {

    if(!isset($_SESSION['user'])){
        header('Location: /auth/login');
        exit() ;
    }
});
// Run it!
$router->run();
