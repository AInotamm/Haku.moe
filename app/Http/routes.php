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

Route::get('/', function () {
    return view('welcome');
});

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

    /* Account System {{ */

        /**
         *  Register Login/Register Router
         *  Example: Route::auth();
         */

        Route::get('login', 'Auth\AuthController@showLoginForm');
        Route::get('register', 'Auth\AuthController@showRegistrationForm');

        Route::group(['prefix' => 'account'], function () {

            Route::post('in', 'Account\UserController@login');
            Route::post('up', 'Account\UserController@register');

            Route::get('out', 'Account\UserController@getLogout');

        });

    /* }} */

    /* Blog System {{ */
        Route::get('blog', 'Home\BlogController@test');
    /* }} */

});
