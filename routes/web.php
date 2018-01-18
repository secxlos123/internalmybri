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
			Route::get('/GimmickStore', ['as'=>'GimmickStore', 'uses'=>'Mitra\GimmickController@store']);
			Route::get('/ScoringMitraStore', ['as'=>'ScoringMitraStore', 'uses'=>'Mitra\mitra\ScoringProsesController@store']);
			Route::get('/DirRpcStore', ['as'=>'DirRpcStore', 'uses'=>'Mitra\dirrpc\AddDirRpcontroller@store']);
			Route::get('/MitraStore', ['as'=>'MitraStore', 'uses'=>'Mitra\mitra\RegistrasiController@store']);
			Route::get('/DirRpcStoreEdit', ['as'=>'DirRpcStoreEdit', 'uses'=>'Mitra\dirrpc\EditDircontroller@store']);
			Route::get('/KelayakanStore', ['as'=>'KelayakanStore', 'uses'=>'Mitra\mitra\PenilaianKelayakanController@store']);
			Route::get('/InputKolektifStore', ['as'=>'InputKolektifStore', 'uses'=>'Mitra\mitra\eksternal\InputKolektifController@store']);
			Route::get('/HasilScoringStore', ['as'=>'HasilScoringStore', 'uses'=>'Mitra\mitra\HasilScoringController@store']);
			Route::get('/DirRpcHapus', ['as'=>'DirRpcStore', 'uses'=>'Mitra\dirrpc\DirRpcController@hapus']);
			Route::get('/DirRpcHapusDetail', ['as'=>'DirRpcStore', 'uses'=>'Mitra\dirrpc\DirRpcController@hapus_detail']);

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

        Route::post('eform/submit-prescreening', ['as'=>'postPrescreening', 'uses'=>'EForm\EFormController@postPrescreening']);

        Route::get('eform/dispotition/{id}/{ref}', ['as'=>'getDispotition', 'uses'=>'EForm\EFormController@getDispotition']);

        Route::post('/eform/dispotition/{id}',
            ['as'=>'postDispotition', 'uses'=>'EForm\EFormController@postDispotition']);

        Route::post('/eform/postLKN/{id}',
            ['as'=>'postLKN', 'uses'=>'EForm\AOController@postLKN']);

        Route::get('eform/lkn/{id}', ['as'=>'getLKN', 'uses'=>'EForm\AOController@getLKN']);

        // Rekontes LKN
        Route::get('eform/recontest/{id}', ['as'=>'getRecontest', 'uses'=>'EForm\RecontestController@getRecontest']);

        Route::post('/eform/post-lkn-recontest/{id}',
            ['as'=>'postLKNRecontest', 'uses'=>'EForm\RecontestController@postLKNRecontest']);

        Route::get('eform/approval-recontest/{id}', ['as'=>'getApprovalRecontest', 'uses'=>'EForm\RecontestController@getApprovalRecontest']);

        Route::post('/eform/post-approval-recontest/{id}',
            ['as'=>'postApprovalRecontest', 'uses'=>'EForm\RecontestController@postApprovalRecontest']);

        Route::get('/eform/verification/{id}', ['as'=>'getVerification', 'uses'=>'EForm\AOController@getVerification']);

        Route::get('/eform/verification/preview/{id}', ['as'=>'getDetail', 'uses'=>'EForm\AOController@getPreview']);

        Route::get('/eform/verification/print/{id}', ['as'=>'getPrint', 'uses'=>'EForm\AOController@getPrint']);

        Route::post('/eform/search-nik', ['as'=>'eform-search-nik', 'uses'=>'EForm\AOController@searchNik']);

        Route::get('/eform/verification/{eform_id}/completeData/{customer_id}', ['as'=>'completeData', 'uses'=>'EForm\AOController@completeData']);

        Route::put('/eform/verification/{eform_id}/completeData/{customer_id}',
            ['as'=>'postVerification', 'uses'=>'Customer\CustomerController@verifyCustomer']);

        Route::put('/eform/verifyData/{id}',
            ['as'=>'verifyData', 'uses'=>'EForm\AOController@verifyData']);

        //this route for resend verification to nasabah
        Route::get('/eform/resendVerification/{eform_id}', 
            ['as' => 'resend_verifyData', 'uses' => 'EForm\AOController@resendVerification']);

        Route::get('/eform/approval/{id}', ['as'=>'getApproval', 'uses'=>'EForm\ApprovalController@getApproval']);

        Route::get('/eform/approval/preview/{id}', ['as'=>'getDetailApproval', 'uses'=>'EForm\ApprovalController@getPreview']);

        Route::post('/eform/approve/{id}',
            ['as'=>'postApproval', 'uses'=>'EForm\ApprovalController@postApproval']);

        Route::post('/eform/delete',
            ['as'=>'delete-eform', 'uses'=>'EForm\EFormController@delete']);

        Route::get('/eform-ao', ['as'=>'indexAO', 'uses'=>'EForm\AOController@index']);

        Route::get('test', ['as'=>'indexAO', 'uses'=>'EForm\AOController@index']);

        Route::get('downloadTracking', ['as'=>'downloadTracking', 'uses'=>'Tracking\TrackingController@downloadTracking']);

        // Calculator

        Route::post('/calculator/calculate/',
            ['as'=>'postCalculate', 'uses'=>'Calculator\CalculatorController@postCalculate']);

        Route::group(['prefix'=>'collateral','middleware'=>'checkrole:collateral'], function () {

            Route::get('detail/{dev_id}/{prop_id}', ['as'=>'collateralDetail', 'uses'=>'Collateral\CollateralController@detail']);

            Route::get('assignment/{dev_id}/{prop_id}', ['as'=>'getAssignment', 'uses'=>'Collateral\CollateralController@assignment']);

            Route::post('postAssignment/{id}', ['as'=>'postAssignment', 'uses'=>'Collateral\CollateralController@postAssignment']);

            Route::get('approval-collateral/{dev_id}/{prop_id}', ['as'=>'getApprovalCollateral', 'uses'=>'Collateral\CollateralController@approval']);

            Route::post('postApprovalCollateral/{id}', ['as'=>'postApprovalCollateral', 'uses'=>'Collateral\CollateralController@postApprovalCollateral']);

            Route::post('reject-approval/{id}', ['as'=>'rejectApprovalCollateral', 'uses'=>'Collateral\CollateralController@rejectApprovalCollateral']);

            Route::get('monitoring/{dev_id}/{prop_id}', ['as'=>'getMonitoring', 'uses'=>'Collateral\CollateralController@getMonitoring']);
        });

        Route::group(['prefix'=>'staff-collateral' , 'middleware'=>'checkrole:ao,collateral-appraisal'], function () {

            Route::get('get-detail/{dev_id}/{prop_id}', ['as'=>'collateralStaffDetail', 'uses'=>'Collateral\CollateralStaffController@show']);

            Route::get('scoring-form/{dev_id}/{prop_id}', ['as'=>'getLKNAgunan', 'uses'=>'Collateral\CollateralStaffController@getLKNAgunan']);

            Route::post('post-scoring-form/{id}', ['as'=>'postLKNAgunan', 'uses'=>'Collateral\CollateralStaffController@postLKNAgunan']);

            Route::get('get-assignment/{dev_id}/{prop_id}', ['as'=>'getAssignmentAgunan', 'uses'=>'Collateral\CollateralStaffController@getAssignmentAgunan']);

            Route::post('reject-form/{id}', ['as'=>'rejectAssignment', 'uses'=>'Collateral\CollateralStaffController@rejectAssignment']);

            Route::get('upload-doc/{dev_id}/{prop_id}', ['as'=>'getUploadDoc', 'uses'=>'Collateral\CollateralStaffController@getUploadDoc']);

            Route::post('post-upload-doc/{id}', ['as'=>'postUploadDoc', 'uses'=>'Collateral\CollateralStaffController@postUploadDoc']);
        });

        Route::group(['prefix'=>'approval-data'], function () {

            Route::get('developer', ['as'=>'approveDeveloper', 'uses'=>'ApprovalData\ApprovalDataController@indexApprovalDeveloper']);

            Route::get('developer/approve/{id}', ['as'=>'getApproveDeveloper', 'uses'=>'ApprovalData\ApprovalDataController@getViewApprovalDeveloper']);

            Route::get('third-party', ['as'=>'approveThirdParty', 'uses'=>'ApprovalData\ApprovalDataController@indexApprovalThirdParty']);

            Route::get('third-party/approve/{id}', ['as'=>'getApproveThirdParty', 'uses'=>'ApprovalData\ApprovalDataController@getViewApprovalThirdParty']);

            Route::post('approve-data-developer', ['as'=>'postApprovalDataDeveloper', 'uses'=>'ApprovalData\ApprovalDataController@postApprovalDataDeveloper']);

            Route::post('approve-data-thirdparty', ['as'=>'postApprovalDataThirdParty', 'uses'=>'ApprovalData\ApprovalDataController@postApprovalDataThirdParty']);
        });

        Route::resource('eform', 'EForm\EFormController');
        // Route::get('eform/{ref}', ['as'=>'eform.index', 'uses'=>'EForm\EFormController@index']);

        /*ADK*/
        Route::resource('adk', 'EForm\ADKController');
        Route::resource('adk-histori', 'EForm\ADKHistoriController');
        Route::get('/adk/view/{id}', ['as'=>'getApprove', 'uses'=>'EForm\ADKController@getApprove']);
        Route::post('post_adk', ['as'=>'post_adk', 'uses'=>'EForm\ADKController@postApprove']);
        Route::post('verifikasi', ['as'=>'verifikasi', 'uses'=>'EForm\ADKController@postVerifikasi']);
        Route::post('keterangan', ['as'=>'keterangan', 'uses'=>'EForm\ADKController@postKeterangan']);
        Route::get('post_pdf/{id}', ['as'=>'post_pdf', 'uses'=>'EForm\ADKController@exportPTK']);
        Route::get('post_sph/{id}', ['as'=>'post_sph', 'uses'=>'EForm\ADKController@exportSPH']);
        Route::get('post_debitur/{id}', ['as'=>'post_debitur', 'uses'=>'EForm\ADKController@exportDebitur']);

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

		Route::resource('mitra', 'Mitra\MitraController');
		Route::resource('gimmick', 'Mitra\GimmickController');
		Route::get('gimmick_list', 'Mitra\GimmickController@gimmick_list');
		Route::resource('dir_rpc', 'Mitra\dirrpc\DirRpcController');
		Route::resource('registrasi_mitra', 'Mitra\mitra\RegistrasiController');
		Route::resource('mitra_list', 'Mitra\mitra\MitraController');
		Route::resource('mitra_eksternal', 'Mitra\mitra\eksternal\MitraController');
		Route::resource('input_data_kolektif', 'Mitra\mitra\eksternal\InputKolektifController');
		Route::resource('calon_mitra', 'Mitra\mitra\CalonMitraController');
		Route::resource('penilaian_kelayakan', 'Mitra\mitra\PenilaianKelayakanController');
		Route::resource('hasil_scoring', 'Mitra\mitra\HasilScoringController');
		Route::resource('scoringproses', 'Mitra\mitra\ScoringProsesController');
		Route::resource('registrasi_perjanjian', 'Mitra\mitra\Registrasi_PerjanjianController');
		Route::resource('dir_rpc_add', 'Mitra\dirrpc\AddDirRpcontroller');
		Route::resource('dir_rpc_edit', 'Mitra\dirrpc\EditDircontroller');
		Route::resource('dir_rpc_maintance', 'Mitra\dirrpc\MaintanceRpcController');
		Route::resource('dir_rpc_add_umum', 'Mitra\dirrpc\AddDirUmumRpcontroller');
		Route::resource('dir_rpc_add_profesi', 'Mitra\dirrpc\AddDirProfesiRpcontroller');

		Route::resource('scoring_mitra', 'Mitra\scoring\ScoringMitraController');
		Route::resource('scoring_proses', 'Mitra\scoring\ScoringProsescontroller');

        Route::resource('mitrakerjasama', 'Mitra\MitraController@mitrakerjasama');
        Route::get('/screening/getscrore/{id}', ['as'=>'getscore', 'uses'=>'Screening\AOController@getScore']);

        /* Auditrail */
        Route::resource('auditrail', 'AuditRail\AuditRailController', [ 'only' => ['index'] ]);
    });
    
    Route::get('detailCollateral', ['as'=>'detailCollateral', 'uses'=>'Collateral\CollateralController@detailCollateral']);

    /* Chart */
    Route::get('chartEform', 'Home\HomeController@chartEform');

    Route::get('chartCustomer', 'Home\HomeController@chartCustomer');

    Route::get('chartProperty', 'Home\HomeController@chartProperty');

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

    Route::get('getStaff', ['as'=>'getStaff', 'uses'=>'DropdownController@getStaff']);

    Route::get('getKanwil', ['as'=>'getKanwil', 'uses'=>'OfficeController@getKanwil']);

    Route::get('getDeveloper', ['as'=>'getDeveloper', 'uses'=>'Developer\DeveloperController@getDeveloper']);

    Route::get('getCustomer', ['as'=>'getCustomer', 'uses'=>'EForm\EFormController@getCustomer']);

    Route::get('getAO', ['as'=>'getAO', 'uses'=>'EForm\EFormController@getAO']);

    Route::get('renderMutation', ['as'=>'renderMutation', 'uses'=>'EForm\AOController@renderMutation']);

    Route::get('detailCustomer', ['as'=>'detailCustomer', 'uses'=>'EForm\EFormController@detailCustomer']);

    Route::get('getData', ['as'=>'getData', 'uses'=>'EForm\EFormController@getData']);

    /* Datatables */
    Route::group(['prefix'=>'datatables'], function () {
        /*ADK*/
        Route::get('adk-list', 'EForm\ADKController@datatables');
        Route::get('adk-his-list', 'EForm\ADKHistoriController@datatables');

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

        /* Debitur */
        Route::get('debiturs', 'Debitur\DebiturController@datatables');

        /* EForms */
        Route::get('eform', 'EForm\EFormController@datatables');

        Route::get('eform-ao', ['as'=>'eform-ao', 'uses'=>'EForm\AOController@datatables']);

        /* Detail Tipe Properti Collateral */
        Route::get('collateral-type-property', 'Collateral\CollateralController@datatableType');

        /* Collateral */
        Route::get('collateral', 'Collateral\CollateralController@datatables');

        Route::get('collateral/nonindex', 'Collateral\CollateralController@datatableNonIndex');

        /* Staff Collateral */
        Route::get('staff-collateral', 'Collateral\CollateralStaffController@datatables');

        Route::get('staff-collateral/nonindex', 'Collateral\CollateralStaffController@datatableNonIndex');

        // ApprovalData
        Route::get('approval-developer', 'ApprovalData\ApprovalDataController@datatableDeveloper');

        Route::get('approval-third-party', 'ApprovalData\ApprovalDataController@datatableThirdParty');

        /* Screening*/
        Route::get('screening', 'Screening\ScreeningController@datatables');

        Route::get('screening-ao', ['as'=>'screening-ao', 'uses'=>'Screening\AOController@datatables']);

		/* DirRpc */

        Route::get('dirrpc', 'Mitra\dirrpc\DirRpcController@datatables');
        Route::get('mitra_list', 'Mitra\mitra\MitraController@datatables');


        Route::get('gimmick_list', 'Mitra\GimmickController@datatables');

        /*Auditrail*/
        // Route::get('auditrail-list', 'AuditRail\AuditRailController@datatables');
    });
