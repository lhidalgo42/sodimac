<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('locations',LocationController::class);
    $router->resource('users',UserController::class);
    $router->resource('taxis',TaxiController::class);
    $router->resource('tickets',TicketController::class);



});
