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

    // Register auth-router
    Route::auth();

    /*
     * Non-trust User Action
     * */
    Route::get('signin', function() { return view('auth.login'); });

    Route::get('signup', function() { return view('auth.register'); });

    /*
     * Account System
     * */
    Route::group(['namespace' => 'Account'], function() {
        // need auth middleware
        Route::group(['prefix' => 'accounts'], function() {
            Route::post('login/attempt', ['as' => 'login', 'uses' => 'UserController@attempt']);
            Route::post('register/attempt', ['as' => 'register', 'uses' => 'GuestController@attempt']);

            Route::group(['middleware' => 'auth'], function() {
                Route::get('logout', ['uses' => 'UserController@logout']);
            });
        });
    });

});
