<?php

use Illuminate\Support\Facades\Route;

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
    // Frontend
    Route::group(['namespace' => 'Frontend'], function () {
        // Post - Page with slug
        Route::get('/{postSlug}/', 'Backend\PostController@showPostWithSlugs');
    });

    // Backend
    Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
        Route::group(['middleware' => 'auth'], function () {
            // Dashboard
            Route::get('/', 'AdminController@dashboard');
            // Posts
            Route::resource('/posts', 'PostController');
            // Categories
            Route::resource('/categories', 'CategoryController');
        });

        // Authentication
        Route::group(['namespace' => 'Auth'], function () {
            Route::get('/auth/login', ['as' => 'admin.auth.login', 'middleware' => 'guest', 'uses' => 'AuthController@getLogin']);
            Route::post('/auth/login', ['as' => 'admin.auth.login', 'middleware' => 'guest', 'uses' => 'AuthController@postLogin']);
            Route::get('/auth/logout', ['as' => 'admin.auth.logout', 'middleware' => 'auth', 'uses' => 'AuthController@getLogout']);
        });
    });
});