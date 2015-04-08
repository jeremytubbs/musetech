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

// homepage
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

// contact
// Route::get('contact', ['as' => 'pages.contact', 'uses' => 'ContactController@getContact']);
// Route::post('contact', ['as' => 'pages.contact', 'uses' => 'ContactController@postContact']);

// slack sign up
Route::get('sign-up', ['as' => 'slack.create', 'uses' => 'SlackController@create']);
Route::post('sign-up', ['as' => 'slack.store', 'uses' => 'SlackController@store']);

// search
Route::get('search', ['as' => 'search', 'uses' => 'SearchController@index']);
Route::post('search', ['as' => 'search', 'uses' => 'SearchController@results']);

// project recommend
Route::get('project/add', ['as' => 'project.create', 'uses' => 'ProjectController@create']);
Route::post('project/add', ['as' => 'project.store', 'uses' => 'ProjectController@store']);

// routes for auth
// Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
// Route::post('register', 'Auth\AuthController@postRegister');
// Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
// Route::post('login', 'Auth\AuthController@postLogin');
// Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);
// Route::get('password/forgot', 'Auth\PasswordController@getEmail');
// Route::post('password/forgot', 'Auth\PasswordController@postEmail');
// Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
// Route::post('password/reset/{token}', 'Auth\PasswordController@postReset');