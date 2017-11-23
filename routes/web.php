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

        Route::get('developers/{id}/properties', ['as'=>'properties', 'uses'=>'Developer\DeveloperController@properties']);

        Route::resource('developers', 'Developer\DeveloperController');

        /* E-Form */

        Route::post('eform/prescreening', ['as'=>'getPrescreening', 'uses'=>'EForm\EFormController@getPrescreening']);

        Route::get('eform/dispotition/{id}/{ref}', ['as'=>'getDispotition', 'uses'=>'EForm\EFormController@getDispotition']);

        Route::post('/eform/dispotition/{id}',
            ['as'=>'postDispotition', 'uses'=>'EForm\EFormController@postDispotition']);

        Route::post('/eform/postLKN/{id}',
            ['as'=>'postLKN', 'uses'=>'EForm\AOController@postLKN']);

        Route::get('eform/lkn/{id}', ['as'=>'getLKN', 'uses'=>'EForm\AOController@getLKN']);

        Route::get('/eform/verification/{id}', ['as'=>'getVerification', 'uses'=>'EForm\AOController@getVerification']);

        Route::post('/eform/search-nik', ['as'=>'eform-search-nik', 'uses'=>'EForm\AOController@searchNik']);

        Route::get('/eform/verification/{eform_id}/completeData/{customer_id}', ['as'=>'completeData', 'uses'=>'EForm\AOController@completeData']);

        Route::put('/eform/verification/{eform_id}/completeData/{customer_id}',
            ['as'=>'postVerification', 'uses'=>'Customer\CustomerController@verifyCustomer']);

        Route::put('/eform/verifyData/{id}',
            ['as'=>'verifyData', 'uses'=>'EForm\AOController@verifyData']);

        Route::get('/eform/approval/{id}', ['as'=>'getApproval', 'uses'=>'EForm\ApprovalController@getApproval']);

        Route::post('/eform/approve/{id}',
            ['as'=>'postApproval', 'uses'=>'EForm\ApprovalController@postApproval']);

        Route::get('/eform-ao', ['as'=>'indexAO', 'uses'=>'EForm\AOController@index']);

        Route::get('test', ['as'=>'indexAO', 'uses'=>'EForm\AOController@index']);

        Route::get('downloadTracking', ['as'=>'downloadTracking', 'uses'=>'Tracking\TrackingController@downloadTracking']);

        Route::group(['prefix'=>'collateral'], function () {

            Route::get('detail/{dev_id}/{prop_id}', ['as'=>'collateralDetail', 'uses'=>'Collateral\CollateralController@detail']);

            Route::get('assignment/{dev_id}/{prop_id}', ['as'=>'getAssignment', 'uses'=>'Collateral\CollateralController@assignment']);

            Route::post('postAssignment/{id}', ['as'=>'postAssignment', 'uses'=>'Collateral\CollateralController@postAssignment']);

            Route::get('approval-collateral/{dev_id}/{prop_id}', ['as'=>'getApprovalCollateral', 'uses'=>'Collateral\CollateralController@approval']);
        });

        Route::group(['prefix'=>'staff-collateral'], function () {

            Route::get('get-detail/{dev_id}/{prop_id}', ['as'=>'collateralStaffDetail', 'uses'=>'Collateral\CollateralController@getDetail']);

            Route::get('scoring-form/{dev_id}/{prop_id}', ['as'=>'getLKNAgunan', 'uses'=>'Collateral\CollateralStaffController@getLKNAgunan']);

            Route::post('post-scoring-form/{id}', ['as'=>'postLKNAgunan', 'uses'=>'Collateral\CollateralStaffController@postLKNAgunan']);

            Route::get('get-assignment/{dev_id}/{prop_id}', ['as'=>'getAssignmentAgunan', 'uses'=>'Collateral\CollateralStaffController@getAssignmentAgunan']);
        });

        Route::group(['prefix'=>'approval-data'], function () {

            Route::get('developer', ['as'=>'approveDeveloper', 'uses'=>'ApprovalData\ApprovalDataController@indexApprovalDeveloper']);

            Route::get('developer/approve/{id}', ['as'=>'getApproveDeveloper', 'uses'=>'ApprovalData\ApprovalDataController@getViewApprovalDeveloper']);

            Route::get('third-party', ['as'=>'approveThirdParty', 'uses'=>'ApprovalData\ApprovalDataController@indexApprovalThirdParty']);

            Route::get('third-party/approve/{id}', ['as'=>'getApproveThirdParty', 'uses'=>'ApprovalData\ApprovalDataController@getViewApprovalThirdParty']);
        });

        Route::resource('eform', 'EForm\EFormController');

        /* Pihak Ke -3 (Third Party) */
        Route::resource('third-party', 'ThirdParty\ThirdPartyController');

        /* Schedule */
        Route::resource('schedule', 'Schedule\ScheduleController', [
            'only' => ['index']
        ]);

        Route::group(['prefix' => 'schedule', 'namespace' => 'Schedule'], function($router) {
            $router->get('/ao', 'ScheduleController@schedule');
            $router->post('/ao', 'ScheduleController@postSchedule');
            $router->get('/e-form', 'ScheduleController@eFormList');
        });

        /* Tracking */
        Route::resource('tracking', 'Tracking\TrackingController');

        /* Calculator */
        Route::resource('calculator', 'Calculator\CalculatorController');

        /* Calculator */
        Route::resource('debitur', 'Debitur\DebiturController');

        /* Collateral */
        Route::resource('collateral', 'Collateral\CollateralController');

        /* Collateral Staff*/
        Route::resource('staff-collateral', 'Collateral\CollateralStaffController');

        /* Scoring*/
        Route::resource('scoring', 'Screening\ScoringController');

        /* Screening*/
        Route::resource('screening', 'Screening\ScreeningController');
        Route::get('/screening/getscrore/{id}', ['as'=>'getscore', 'uses'=>'Screening\AOController@getScore']);
    });

    Route::put('users/{users}/actived', 'User\UserController@actived');

    Route::put('thirdparty/{id}/actived', 'ThirdParty\ThirdPartyController@actived');

    Route::put('developers/{developers}/actived', 'Developer\DeveloperController@actived');

    Route::get('cities', 'CityController');

    Route::get('offices', 'OfficeController');

    Route::get('dropdown/properties', 'DropdownController@properties');

    Route::get('dropdown/types', 'DropdownController@types');

    Route::get('dropdown/units', 'DropdownController@units');

    Route::get('dropdown/birth_place', 'DropdownController@birth_place');

    Route::get('dropdown/job_types', 'DropdownController@job_types');

    Route::get('dropdown/jobs', 'DropdownController@jobs');

    Route::get('dropdown/job_fields', 'DropdownController@job_fields');

    Route::get('dropdown/positions', 'DropdownController@positions');

    Route::get('dropdown/citizenship', 'DropdownController@citizenship');

    Route::get('dropdown/kpptypelist', 'DropdownController@kppTypeList');

    Route::get('dropdown/typefinanced', 'DropdownController@typeFinanced');

    Route::get('dropdown/economysectors', 'DropdownController@economySectors');

    Route::get('dropdown/projectlist', 'DropdownController@projectList');

    Route::get('dropdown/programlist', 'DropdownController@programList');

    Route::get('dropdown/usereason', 'DropdownController@useReason');

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

        /* Third Party (Pihak ke-3) */
        Route::get('third-party', 'ThirdParty\ThirdPartyController@datatables');

        /* Tracking */
        Route::get('tracking', 'Tracking\TrackingController@datatables');

        /* EForms */
        Route::get('eform', 'EForm\EFormController@datatables');

        Route::get('eform-ao', ['as'=>'eform-ao', 'uses'=>'EForm\AOController@datatables']);

        /* Collateral */
        Route::get('collateral', 'Collateral\CollateralController@datatables');

        /* Staff Collateral */
        Route::get('staff-collateral', 'Collateral\CollateralStaffController@datatables');

        /* Screening*/
        Route::get('screening', 'Screening\ScreeningController@datatables');
        Route::get('screening-ao', ['as'=>'screening-ao', 'uses'=>'Screening\AOController@datatables']);
    });
