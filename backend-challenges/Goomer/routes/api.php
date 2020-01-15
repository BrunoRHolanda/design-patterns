<?php

use Laravel\Lumen\Routing\Router;

/**
 * @var  Router $router
 */

$router->get('/', function(Router $router) {
    return $router->app->version();
});

$router->get('/products', 'ProductController@index');
$router->get('/product/{id}', 'ProductController@show');
$router->post('/product', 'ProductController@store');
$router->put('/product/{id}', 'ProductController@update');
$router->delete('/product/{id}', 'ProductController@destroy');

$router->get('/categories', 'CategoryController@index');
$router->get('/category/{id}', 'CategoryController@show');
$router->post('/category', 'CategoryController@store');
$router->put('/category/{id}', 'CategoryController@update');
$router->delete('/category/{id}', 'CategoryController@destroy');
