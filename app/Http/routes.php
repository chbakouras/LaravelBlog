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
        Route::get('/{postSlug}/', 'BlogController@showSlug')
            ->where('postSlug', '^(?!.*admin).*$');
    });

    // Backend
    Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {
        Route::group(['middleware' => 'auth'], function () {
            // Dashboard
            $this->get('/', ['as' => 'admin.dashboard.index', 'uses' => 'DashboardController@index']);
            // Posts
            $this->resource('/posts', 'PostController', ['except' => ['update']]);
            $this->put('/posts/{id}', ['as' => 'admin.posts.update', 'uses' => 'PostController@update']);
            $this->patch('/posts/{id}', ['as' => 'admin.posts.patch', 'uses' => 'PostController@softDelete']);
            // Categories
            $this->resource('/categories', 'CategoryController');
            // Users
            $this->resource('/users', 'UserController');
        });

        // Authentication
        Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
            // Authentication Routes
            $this->get('login', ['as' => 'admin.auth.login', 'middleware' => 'guest', 'uses' => 'AuthController@getLogin']);
            $this->post('login', ['as' => 'admin.auth.login', 'middleware' => 'guest', 'uses' => 'AuthController@postLogin']);
            $this->get('logout', ['as' => 'admin.auth.logout', 'middleware' => 'auth', 'uses' => 'AuthController@getLogout']);

            // Registration Routes
            $this->get('register', ['as' => 'admin.auth.register', 'middleware' => 'guest', 'uses' => 'AuthController@showRegistrationForm']);
            $this->post('register', ['as' => 'admin.auth.register', 'middleware' => 'guest', 'uses' => 'AuthController@register']);
        });
    });
});
