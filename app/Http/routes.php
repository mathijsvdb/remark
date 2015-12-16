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

/*
 * Project Routes
 */
// Ajax like and favorite routes
Route::group(['prefix' => 'ajax'], function () {
    Route::post('projects/{id}/like', 'AjaxController@likeProject');
    Route::post('projects/{id}/unlike', 'AjaxController@unlikeProject');
    Route::post('projects/{id}/favorite', 'AjaxController@favoriteProject');
    Route::post('projects/{id}/unfavorite', 'AjaxController@unfavoriteProject');
    Route::post('projects/{id}/comment', 'AjaxController@commentProject');
    Route::post('projects/popular','AjaxController@filterPopular');
    Route::post('projects/recent','AjaxController@filterRecent');
});

Route::get('/projects','ProjectController@showAllProjects');
Route::get('/projects/add', [
    'middleware' => 'auth',
    'uses' => 'ProjectController@getAddProject'
]);
Route::post('/projects/add', 'ProjectController@postAddProject');
Route::get('/projects/{id}', 'ProjectController@showProjectById');
Route::post('/projects/{id}', 'ProjectController@addComment');
Route::post('/projects/{id}/delete', 'ProjectController@deleteProject');
Route::get('/projects/{id}/edit', [
    'middleware' => 'auth',
    'uses' => 'ProjectController@getEditProject'
]);
Route::post('/projects/{id}/edit', 'ProjectController@postEditProject');

// Likes and favorites routes
Route::post('projects/{id}/like', 'ProjectController@likeProject');
Route::post('projects/{id}/unlike', 'ProjectController@unlikeProject');
Route::post('projects/{id}/favorite', 'ProjectController@favoriteProject');
Route::post('projects/{id}/unfavorite', 'ProjectController@unfavoriteProject');




Route::post('/projects/{id}', 'ProjectController@addComment');

Route::get('update','ProfileController@updateProfile');

/*
 * Profile Routes
 */
Route::get('profile/{username}', [
    'uses' =>'ProfileController@profile'
]);
Route::get('update', [
    'middleware' => 'auth',
    'uses' => 'ProfileController@updateProfile']
);

Route::post('update', 'ProfileController@postProfile');
Route::get('/activity', [
    'middleware' => 'auth',
    'uses' => 'UserActivityController@showAllActivity'
]);

Route::get("/popular", 'SearchController@filterRecent');

/*
 * Authentication Routes
 */
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
// Route::get('test', function(){ dd(Config::get('mail'));});

Route::get('/referral', function(){ return view('referral'); });
Route::post('/referral','ProfileController@referralMail');

/*
 * Battle Routes
 */
Route::get('/battles','BattlesController@getBattles');

/*
 * Frontpage Routes
 */
Route::get('/','frontpageController@frontpage');

/*
 * Searh Routes
 */
Route::get('/search','SearchController@search');
Route::post('/search', 'SearchController@searchFrontpage');

Route::post('/', function(){
    if(Request::ajax()){
        return Response::json(Request::all());
    }
});

//search by color
Route::get('/projects/search/{id}','ProjectController@SearchByColor');

/*
 * Advertising Routes
 */
Route::get('/advertising', [
    'middleware' => 'auth',
    'uses' => 'AdsController@ads'
]);
Route::post('/advertising', 'AdsController@postClickCounter');

Route::post('', function(){
    if(Request::ajax()){
        return Response::json(Request::all());
    }
});

Route::get('/advertising/add','AdsController@addAds');
Route::post('/advertising/add', 'AdsController@postAddAdvertisement');


/*
 * spamroute
 */

Route::post('/spam/{id}', 'ProjectController@spam');


/*
 * API Routes
 */


Route::group(['namespace' => 'API'], function() {
    // Developers
    Route::get('/developers', [
        'middleware' => 'auth',
        'uses' => 'ApiController@index'
    ]);

    Route::post('developers', 'ApiController@generateAPIkey');

    Route::group(['prefix' => 'api/v1'], function() {
        // Items endpoint
        Route::get('items/popular', 'ItemsController@getPopularProjects');
        Route::get('items/{id}', 'ItemsController@getProjectById');
        Route::get('items', 'ItemsController@index');
    });
});




