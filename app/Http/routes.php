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
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Home\DisplayController@welcome');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    /**
     *  Register Login/Register Router
     *  Example: Route::auth();
     */

    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::get('register', 'Auth\AuthController@showRegistrationForm');

    Route::group(['prefix' => 'account'], function () {

        Route::post('in', 'Auth\AuthController@login');
        Route::post('up', 'Auth\AuthController@register');

        Route::get('out', 'Auth\AuthController@getLogout');

    });

});
