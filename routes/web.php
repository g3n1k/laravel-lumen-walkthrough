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

use DB;
use App\Course;


$router->get('/', function () use ($router) {

    return $router->app->version();
});

// generate random key
$router->get('/key', function(){ return str_random(32); });

// test input to mongodb
$router->get('/testdb/{title}', function ($title) {

    dd('test', Course::create(['title'=>$title])); // dummy dump
});