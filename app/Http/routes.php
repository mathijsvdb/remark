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

Route::get('/','frontpageController@frontpage');
Route::get('registreren','registrerenController@registreren');
Route::get('reset_paswoord','resetPaswoordController@reset_paswoord');
Route::get('login','loginController@login');
Route::get('gallery','galleryController@gallery');
Route::get('gallery/upload','workuploadController@workupload');