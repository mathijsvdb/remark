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
Route::post('/projects/{id}/delete', 'ProjectController@deleteProject');
Route::get('/projects/{id}/edit', 'ProjectController@getEditProject');
Route::post('/projects/{id}/edit', 'ProjectController@postEditProject');
Route::get('profile/{id}/rewards','RewardsController@ShowUserRewards');

// Likes and favorites routes
Route::post('projects/{id}/like', 'ProjectController@likeProject');
Route::post('projects/{id}/unlike', 'ProjectController@unlikeProject');
Route::post('projects/{id}/favorite', 'ProjectController@favoriteProject');
Route::post('projects/{id}/unfavorite', 'ProjectController@unfavoriteProject');

// Ajax like and favorite routes
Route::group(['prefix' => 'ajax'], function () {
    Route::post('projects/{id}/like', 'AjaxController@likeProject');
    Route::post('projects/{id}/unlike', 'AjaxController@unlikeProject');
    Route::post('projects/{id}/favorite', 'AjaxController@favoriteProject');
    Route::post('projects/{id}/unfavorite', 'AjaxController@unfavoriteProject');
});

Route::post('/projects/{id}', 'ProjectController@addComment');


/*
 * Profile Routes
 */
Route::get('profile/{id}', [
    'middleware' => 'auth',
    'uses' =>'ProfileController@profile'
]);
Route::get('update', [
    'middleware' => 'auth',
    'uses' => 'ProfileController@updateProfile']
);
Route::post('update', 'ProfileController@postProfile');
Route::get('/profile/{id}/activity', [
    'middleware' => 'auth',
    'uses' => 'UserActivityController@showAllActivity'
]);
Route::post('/profile/{id}/activityFilter',function(){
    if(Request::ajax()){
        return 'iets';
    }
});

Route::get('profile/{id}/favorites', [
    'middleware' => 'auth',
    'uses' => 'ProfileController@showFavorites'
]);

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
// Route::get('test', function(){ dd(Config::get('mail'));});

//battles routes
Route::get('/battles','BattlesController@getBattles');

//frontpage routes
Route::get('/','frontpageController@frontpage');

//search
Route::get('/search','SearchController@search');
Route::post('/search', 'SearchController@searchFrontpage');

Route::post('/', function(){
    if(Request::ajax()){
        return Response::json(Request::all());
    }
});

//search by color
Route::get('/projects/search/{id}','ProjectController@SearchByColor');

//ads
Route::get('/advertising','AdsController@ads');
Route::get('/advertising/add','AdsController@addAds');
Route::post('/advertising/add', 'AdsController@postAddAdvertisement');

//developer routes
Route::get('/developer','ApiController@developer');

