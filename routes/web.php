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

        Route::get('detailRole/{id}',
            ['as'=>'detailRole', 'uses'=>'User\RoleController@show']);

        // Route::delete('logout', 
        //     ['as'=>'logout', 'uses'=>'User\LoginController@logout']);

    Route::group(['middleware'=>'auth'], function () {
        /* Dashboard */
        Route::get('/', 
            ['as'=>'dashboard', 'uses'=>'Home\HomeController@index']);

        /* Customers */
        // Route::get('/nasabah', function () {
        //     $users = session()->get('user');
        //     foreach ($users as $user) {
        //         $data = $user;
        //     }
        //     return view('internals.customers.index', compact('data'));
        // });
        
        Route::resource('customers', 'Customer\CustomerController');

        /* Roles */
        Route::get('role/datatables', ['as'=>'role.datatables', 'uses'=>'User\RoleController@datatables']);

        Route::delete('roles/{id}/delete', ['as'=>'role.delete', 'uses'=>'User\RoleController@destroy']);

        Route::resource('roles', 'User\RoleController');

        /* Users */
        Route::resource('users', 'User\UserController');

        /* E-Form */
        Route::resource('eform', 'EForm\EFormController');

    });


