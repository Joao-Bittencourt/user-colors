<?php

include __DIR__ . '/vendor/autoload.php';

use UserColors\database\migrator;
use UserColors\Router;

session_start();

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router = new Router();

$router->addRoute('GET', '/', 'UsersController@index');
$router->addRoute('GET', '/users', 'UsersController@index');
$router->addRoute('GET', '/users/create', 'UsersController@create');
$router->addRoute('POST', '/users/store', 'UsersController@store');
$router->addRoute('GET', '/users/edit/{id}', 'UsersController@edit');
$router->addRoute('POST', '/users/update/{id}', 'UsersController@update');
$router->addRoute('POST', '/users/delete/{id}', 'UsersController@delete');

$router->addRoute('GET', '/colors', 'ColorsController@index');
$router->addRoute('GET', '/colors/create', 'ColorsController@create');
$router->addRoute('POST', '/colors/store', 'ColorsController@store');
$router->addRoute('POST', '/colors/delete/{id}', 'ColorsController@delete');

$router->addRoute('GET', '/migrate', function () {
    migrator::migrate();
});
$router->addRoute('GET', '/seed', function () {
    migrator::seed();
});



$router->handleRequest($requestMethod, $requestPath);
