<?php

/** @var $router Router */

use Illuminate\Routing\Router;

$router->get('/', function () {
    return;
})->middleware('auth');
