<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* Backend */
    // Route::group(function () {
    Route::group(['middleware'=>'auth'], function () {
        /* Dashboard */
        Route::get('/', 
            ['as'=>'dashboard', 'uses'=>'Home\HomeController@index']);

        /* Customers */
        Route::get('/nasabah', function () {
            return view('internals.customers.index');
        });
        Route::get('/nasabah/detail', function () {
            return view('internals.customers.detail');
        });

        /* Roles */
        Route::get('/roles', function () {
            return view('internals.roles.index');
        });
        Route::get('/roles/create', function () {
            return view('internals.roles.create');
        });

        /* Users */
        Route::get('/users', function () {
            return view('internals.users.index');
        });
        Route::get('/users/create', function () {
            return view('internals.users.create');
        });


        // });
    });

        /* Auth */
        Route::post('/login', 
            ['as'=>'postLogin', 'uses'=>'User\LoginController@postLogin']);

        Route::get('/login', 
            ['as'=>'login', 'uses'=>'User\LoginController@getLogin']);

        Route::get('/forgot-password', 
            ['as'=>'forgot-password', 'uses'=>'User\LoginController@getForgotPassword']);

        Route::post('/post-email', 
            ['as'=>'postForgotPassword', 'uses'=>'User\LoginController@postForgotPassword']);

        Route::get('/email-sent', function () {
            return view('internals.auth.email-sent');
        });

        Route::get('/logout', 
            ['as'=>'logout', 'uses'=>'User\LoginController@logout']);

