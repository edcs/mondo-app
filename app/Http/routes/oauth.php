<?php

/** @var $router Router */

use Illuminate\Routing\Router;

$router->group(['prefix' => 'oauth', 'middleware' => 'web'], function (Router $router) {

    $router->get('authorize', 'OauthController@authorize')->name('oauth.authorize');

    $router->get('callback', 'OauthController@callback')->name('oauth.callback');

    $router->get('destroy', 'OauthController@destroy')->name('oauth.destroy');

});
