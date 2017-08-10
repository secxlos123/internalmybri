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
            $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
            return view('internals.customers.index', compact('data'));
        });
        Route::get('/nasabah/detail', function () {
            $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
            return view('internals.customers.detail', compact('data'));
        });

        /* Roles */
        Route::get('/roles', function () {
            $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
            return view('internals.roles.index', compact('data'));
        });
        Route::get('/roles/create', function () {
            $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
            return view('internals.roles.create', compact('data'));
        });

        /* Users */
        Route::get('/users', function () {
            $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
            return view('internals.users.index', compact('data'));
        });
        Route::get('/users/create', function () {
            $users = session()->get('user');
            foreach ($users as $user) {
                $data = $user;
            }
            return view('internals.users.create', compact('data'));
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

        // Route::delete('logout', 
        //     ['as'=>'logout', 'uses'=>'User\LoginController@logout']);

