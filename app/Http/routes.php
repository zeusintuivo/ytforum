<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('logger', "LoggerController@index");
Route::get('logger/{id}', "LoggerController@show");
Route::post('logger', 'LoggerController@store');
Route::put("logger/{id}", "LoggerController@update");
Route::delete("logger/{id}", "LoggerController@destroy");


Route::get('videos', "VideoController@index");
Route::get('videos/{id}', "VideoController@show");
Route::post('videos', 'VideoController@store');
Route::put("videos/{id}", "VideoController@update");
Route::delete("videos/{id}", "VideoController@destroy");

Route::resource('api/todos','TodosController');


//route to add
Route::get('todoapp','TodoAppController@index');

Route::resource('api/pool','PoolsController');
Route::resource('api/pooloption','PoolOptionsController');
Route::get('api/pooloption/addvote/{id}','PoolOptionsController@addVote');
