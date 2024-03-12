<?php

include __DIR__ . '/vendor/autoload.php';

use UserColors\Router;

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);



$router = new Router();

$router->addRoute('GET', '/users', 'UsersController@index');
// $router->addRoute('GET', '/user/{id}', 'UserController@show');

$router->handleRequest($requestMethod, $requestPath);