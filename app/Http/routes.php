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
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('password/email', 'Auth\PasswordController@getEmail');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
$router->group(
    [
        'middleware' => 'auth',
        'prefix'     => 'Manage'
    ],
    function () use ($router) {
        //Route::resource('manageCollege', 'Manage/CollegeController');
    }
);
Route::get('/', 'WelcomeController@index');
Route::get('college/{param}', 'CollegeController@show');
Route::get('place/{param}', 'PlaceController@show');
Route::post('place/showPlace', 'PlaceController@showPlace');
Route::post('place/showPlaceList', 'PlaceController@showPlaceList');
Route::get('tourism/{param}', 'CollegeController@show');
Route::post('college', 'CollegeController@index');
//service controller index method
Route::get('service', 'ServiceController@index');

//About controller index method
Route::get('about', 'AboutController@index');

//Contact controller index method
Route::get('contact', 'ContactController@index');

//if you have about us create route like that
Route::post('college/edit', 'CollegeController@showModal');

Route::post('favourite/store', 'FavouriteController@store');
Route::get('favourite', 'FavouriteController@index');
