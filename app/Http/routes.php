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
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

// slack sign up
Route::get('sign-up', ['as' => 'slack.create', 'uses' => 'SlackController@create']);
Route::post('sign-up', ['as' => 'slack.store', 'uses' => 'SlackController@store']);

// search projects
Route::get('search', ['as' => 'project.search', 'uses' => 'ProjectController@index']);
// add projects
Route::get('project/add', ['as' => 'project.create', 'uses' => 'ProjectController@create']);
Route::post('project/add', ['as' => 'project.store', 'uses' => 'ProjectController@store']);
