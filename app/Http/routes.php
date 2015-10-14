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
Route::get('/','frontpageController@frontpage');
Route::get('registreren','registrerenController@registreren');
Route::get('reset_paswoord','resetPaswoordController@reset_paswoord');
Route::get('login','loginController@login');
Route::get('profiel','profielController@profiel');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
