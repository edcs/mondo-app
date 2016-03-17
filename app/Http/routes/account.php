<?php

/** @var $router Router */

use Illuminate\Routing\Router;

$router->group(['prefix' => 'account', 'middleware' => ['web', 'auth']], function (Router $router) {

    $router->get('/', 'AccountController@show')->name('account.show');

});
