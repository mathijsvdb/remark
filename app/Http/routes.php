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

Route::get('/projects','ProjectController@showAllProjects');
Route::get('/projects/add', 'ProjectController@getAddProject');
Route::post('/projects/add', 'ProjectController@postAddProject');
Route::get('/projects/{id}', 'ProjectController@showProjectById');

