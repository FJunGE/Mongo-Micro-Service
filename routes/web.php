<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(
    ['prefix' => 'v0'],
    function() use ($router) {
        $router->get('/version', 'ExampleController@version');
        $router->get('/users', 'UserController@all');
        $router->get('/productlog/all', 'ProductlogController@all');
        $router->get('/productlog/{productID:[0-9]+}', 'ProductlogController@findByProductID');
        $router->post('/productlog/create', ['uses'=>'ProductlogController@create']);
    }
);