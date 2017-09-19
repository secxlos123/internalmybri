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

        Route::get('detailRole/{id}',
            ['as'=>'detailRole', 'uses'=>'User\RoleController@show']);

        Route::delete('logout', 'User\LoginController@logout');

    Route::group(['middleware'=> [ 'auth', 'check-token']], function () {

        /* Dashboard */
        Route::get('/', 
            ['as'=>'dashboard', 'uses'=>'Home\HomeController@index']);

        /* Customers */        
        Route::resource('customers', 'Customer\CustomerController');

        /* Roles */
        Route::resource('roles', 'User\RoleController');

        Route::delete('roles/{id}/delete', ['as'=>'role.delete', 'uses'=>'User\RoleController@destroy']);

        /* Users */
        Route::resource('users', 'User\UserController');

        /* Developers */

        Route::get('developers/{id}/property_detail', ['as'=>'property_detail', 'uses'=>'Developer\DeveloperController@property_detail']);

        Route::resource('developers', 'Developer\DeveloperController');

        /* E-Form */

        Route::get('eform/dispotition/{id}', ['as'=>'getDispotition', 'uses'=>'EForm\EFormController@getDispotition']);

        Route::post('/eform/dispotition/{id}', 
            ['as'=>'postDispotition', 'uses'=>'EForm\EFormController@postDispotition']);

        Route::post('/eform/postLKN/{id}', 
            ['as'=>'postLKN', 'uses'=>'EForm\AOController@postLKN']);

        Route::get('eform/lkn/{id}', ['as'=>'getLKN', 'uses'=>'EForm\AOController@getLKN']);

        Route::get('/eform/verification/{id}', ['as'=>'getVerification', 'uses'=>'EForm\AOController@getVerification']);

        Route::get('/eform/completeData/{id}', ['as'=>'completeData', 'uses'=>'EForm\AOController@completeData']);

        Route::put('/eform/verification/{id}', 
            ['as'=>'postVerification', 'uses'=>'Customer\CustomerController@verifyCustomer']);

        Route::get('/eform/approval/{id}', ['as'=>'getApproval', 'uses'=>'EForm\ApprovalController@getApproval']);

        Route::post('/eform/approve/{id}', 
            ['as'=>'postApproval', 'uses'=>'EForm\ApprovalController@postApproval']);

        Route::get('/eform-ao', ['as'=>'indexAO', 'uses'=>'EForm\AOController@index']);

        Route::get('test', ['as'=>'indexAO', 'uses'=>'EForm\AOController@index']);

        Route::resource('eform', 'EForm\EFormController');

    });

    Route::put('users/{users}/actived', 'User\UserController@actived');

    Route::put('developers/{developers}/actived', 'Developer\DeveloperController@actived');

    Route::get('cities', 'CityController');

    Route::get('offices', 'OfficeController');

    Route::get('dropdown/properties', 'DropdownController@properties');

    Route::get('dropdown/types', 'DropdownController@types');

    Route::get('dropdown/units', 'DropdownController@units');

    Route::get('getDeveloper', ['as'=>'getDeveloper', 'uses'=>'Developer\DeveloperController@getDeveloper']);

    Route::get('getCustomer', ['as'=>'getCustomer', 'uses'=>'EForm\EFormController@getCustomer']);

    Route::get('getAO', ['as'=>'getAO', 'uses'=>'EForm\EFormController@getAO']);

    Route::get('renderMutation', ['as'=>'renderMutation', 'uses'=>'EForm\AOController@renderMutation']);

    Route::get('detailCustomer', ['as'=>'detailCustomer', 'uses'=>'EForm\EFormController@detailCustomer']);

    Route::get('getData', ['as'=>'getData', 'uses'=>'EForm\EFormController@getData']);

    /* Datatables */

    Route::group(['prefix'=>'datatables'], function () {

        /* Roles */
        Route::get('roles', 'User\RoleController@datatables');

        /* Users */
        Route::get('users', 'User\UserController@datatables');

        /* Customers */
        Route::get('customers', 'Customer\CustomerController@datatables');

        /* Developers */
        Route::get('developers', 'Developer\DeveloperController@datatables');

        /* EForms */
        Route::get('eform', 'EForm\EFormController@datatables');

        Route::get('eform-ao', ['as'=>'eform-ao', 'uses'=>'EForm\AOController@datatables']);
    });


