<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resources([
        'products' => 'ProductsController',
        'cart' => 'CartController',
        'categories' => 'CategoriesController',
        'news' => 'NewsController',
        'order' => 'OrderController',
        'user' => 'UserController',
    ]);
});
