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

// use DB;


$router->get('/', function () use ($router) {

    return $router->app->version();
});

// generate random key
$router->get('/key', function(){ return str_random(32); });

// // test input to mongodb
// $router->get('/testdb/{title}', function ($title) {

//     dd('test', Course::create(['title'=>$title])); // dummy dump
// });

// try controller access
$router->get('course', 'CourseController@index');


$router->group(['prefix'=>'survey'], function() use ($router) {

        $router->get('/', ['uses'=>'SurveyController@showAll']);

        $router->get('/{id}', ['uses'=>'SurveyController@showOne']);

    }

);

$router->group(['prefix'=>'jawab'], function() use ($router) {

        $router->get('/', ['uses'=>'JawabController@index']);

        $router->get('/{id}', ['uses'=>'JawabController@showOne']);

        $router->post('/', ['uses' => 'JawabController@create']);

        $router->delete('{id}', ['uses' => 'JawabController@delete']);

        $router->put('{id}', ['uses' => 'JawabController@update']);        
    }
);

$router->group(['prefix'=>'biodata'], function() use ($router) {

    $router->get('/', ['uses'=>'JawabController@index']);

    $router->get('/{id}', ['uses'=>'JawabController@oneBiodata']);

    $router->post('/', ['uses' => 'JawabController@createBiodata']);

    $router->delete('{id}', ['uses' => 'JawabController@deleteBiodata']);

    $router->put('{id}', ['uses' => 'JawabController@updateBiodata']);        
}

);
