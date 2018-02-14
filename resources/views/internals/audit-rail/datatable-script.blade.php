<script type="text/javascript">
// trigger pengajuan kredit
    var table_pengajuan_kredit = $('#datatable-pengajuan_kredit').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#filter-eform", function(){
        table_pengajuan_kredit.destroy();
        var type = 'pengajuan_kredit';
        reloadDataPengajuan($('#action_date_eform').val(), type);
    })

    function reloadDataPengajuan(from, type){
        table_pengajuan_kredit = $('#datatable-'+type).DataTable({
            searching : false,
            processing : true,
            serverSide : true,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/auditrail/'+type,
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.action_date = from;
                    d.ref_number = $('#ref_number').val();
                    d.username = $('#username').val();
                    d.modul_name = $('#modul_name').val();
                }
            },
            aoColumns : [
                {   data: 'created_at', name: 'created_at',  bSortable: false },
                {   data: 'modul_name', name: 'modul_name',  bSortable: false  },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'ref_number', name: 'ref_number' },
                {   data: 'old_values', name: 'old_values', bSortable: false },
                {   data: 'new_values', name: 'new_values', bSortable: false },
                {   data: 'ip_address', name: 'ip_address', bSortable: false },
                {   data: 'action_location', name: 'action_location', bSortable: false }
            ],
        });
    }
    
// trigger admin dev
    var table_admin_dev = $('#datatable-admindev').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#filter-dev-admin", function(){
        table_admin_dev.destroy();
        var type = 'admindev';
        reloadDataAdmin($('#action_date_admin').val(), type);
    })

    function reloadDataAdmin(from, type ){
        table_admin_dev =  $('#datatable-'+type).DataTable({
            searching : false,
            processing : true,
            serverSide : true,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/auditrail/'+type,
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.action_date = from;
                    d.username = $('#admindev_name').val();
                    d.modul_name = $('#modul_name_admindev').val();
                    d.company_name = $('#company_name').val();
                }
            },
            aoColumns : [
                {   data: 'created_at', name: 'created_at',  bSortable: false },
                {   data: 'modul_name', name: 'modul_name',  bSortable: false  },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'company_name', name: 'company_name', bSortable: false },
                {   data: 'old_values', name: 'old_values', bSortable: false },
                {   data: 'new_values', name: 'new_values', bSortable: false },
                {   data: 'ip_address', name: 'ip_address', bSortable: false },
                {   data: 'action_location', name: 'action_location', bSortable: false }
            ],
        });
    }
    
// trigger appointment
    var table_appointment = $('#datatable-appointment').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#filter-appointment", function(){
        table_appointment.destroy();
        var type = 'appointment';
        reloadDataAppointment($('#action_date_appointment').val(), type);
    })

    function reloadDataAppointment(from, type ){
        table_appointment =  $('#datatable-'+type).DataTable({
            searching : false,
            processing : true,
            serverSide : true,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/auditrail-appointment',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.action_date = from;
                    d.username = $('#userappointment_name').val();
                    d.modul_name = $('#modul_name_appointment').val();
                }
            },
            aoColumns : [
                {   data: 'created_at', name: 'created_at',  bSortable: false },
                {   data: 'modul_name', name: 'modul_name',  bSortable: false  },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'old_values', name: 'old_values', bSortable: false },
                {   data: 'new_values', name: 'new_values', bSortable: false },
                {   data: 'ip_address', name: 'ip_address', bSortable: false },
                {   data: 'action_location', name: 'action_location', bSortable: false }
            ],
        });
    }

// trigger agent dev
    var table_agendev = $('#datatable-agendev').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#filter-agendev", function(){
        table_agendev.destroy();
        var type = 'agendev';
        reloadDataAgenDev($('#action_agendev_date').val(), type);
    })

    function reloadDataAgenDev(from, type ){
        table_agendev =  $('#datatable-'+type).DataTable({
            searching : false,
            processing : true,
            serverSide : true,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/auditrail/'+type,
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.action_date = from;
                    d.username = $('#username1').val();
                    d.company_name = $('#company_name1').val();;
                    d.modul_name = $('#module_name1').val();
                    d.agent_developer = $('#agent_developer1').val();
                }
            },
            aoColumns : [
                {   data: 'created_at', name: 'created_at',  bSortable: false },
                {   data: 'modul_name', name: 'modul_name',  bSortable: false  },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'company_name', name: 'company_name' },
                {   data: 'old_values', name: 'old_values', bSortable: false },
                {   data: 'new_values', name: 'new_values', bSortable: false },
                {   data: 'ip_address', name: 'ip_address', bSortable: false },
                {   data: 'action_location', name: 'action_location', bSortable: false }
            ],
        });
    }

// trigger edit profile
    var table_edit = $('#datatable-edit').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#filter-edit", function(){
        table_edit.destroy();
        var type = 'edit';
        reloadDataEdit($('#action_edit_date').val(), type);
    })

    function reloadDataEdit(from, type ){
        table_edit =  $('#datatable-'+type).DataTable({
            searching : false,
            processing : true,
            serverSide : true,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/auditrail/'+type,
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.action_date = from;
                    d.username = $('#customer_name').val();
                    d.modul_name = $('#modul_name').val();
                }
            },
            aoColumns : [
                {   data: 'created_at', name: 'created_at',  bSortable: false },
                {   data: 'modul_name', name: 'modul_name',  bSortable: false  },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'old_values', name: 'old_values', bSortable: false },
                {   data: 'new_values', name: 'new_values', bSortable: false },
                {   data: 'ip_address', name: 'ip_address', bSortable: false },
                {   data: 'action_location', name: 'action_location', bSortable: false }
            ],
        });
    }

// trigger edit login-logout
    var table_loginLogout = $('#datatable-loginLogout').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#filter-loginLogout", function(){
        table_loginLogout.destroy();
        var type = 'login-logout';
        reloadDataLoginLogout($('#action_loginLogout_date').val(), type);
    })

    function reloadDataLoginLogout(from, type ){
        table_loginLogout =  $('#datatable-'+type).DataTable({
            searching : false,
            processing : true,
            serverSide : true,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/auditrail/'+type,
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.action_date = from;
                    d.username = $('#username_login').val();
                }
            },
            aoColumns : [
                {   data: 'created_at', name: 'created_at',  bSortable: false },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'role', name: 'role',  bSortable: false  },
                {   data: 'modul_name', name: 'modul_name',  bSortable: false  },
                {   data: 'ip_address', name: 'ip_address', bSortable: false },
                {   data: 'action_location', name: 'action_location', bSortable: false }
            ],
        });
    }

// trigger collateral
    var table_collateral = $('#datatable-collateral').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#filter-collateral", function(){
        table_collateral.destroy();
        var type = 'collateral';
        reloadDataCollateral($('#action_collateral_date').val(), type);
    })

    function reloadDataCollateral(from, type ){
        table_collateral =  $('#datatable-'+type).DataTable({
            searching : false,
            processing : true,
            serverSide : true,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/auditrail/'+type,
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.action_date = from;
                    d.username = $('#user_name2').val();
                    d.modul_name = $('#module_name2').val();
                    d.developer = $('#developer2').val();
                    d.staff_penilai = $('#staff').val();
                }
            },
            aoColumns : [
                {   data: 'created_at', name: 'created_at',  bSortable: false },
                {   data: 'modul_name', name: 'modul_name',  bSortable: false  },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'staff_penilai', name: 'staff_penilai',  bSortable: false  },
                {   data: 'developer', name: 'developer', bSortable: false },
                {   data: 'old_values', name: 'old_values', bSortable: false },
                {   data: 'new_values', name: 'new_values', bSortable: false },
                {   data: 'ip_address', name: 'ip_address', bSortable: false },
                {   data: 'action_location', name: 'action_location', bSortable: false }
            ],
        });
    }

// trigger property
    var table_property = $('#datatable-property').DataTable({
        searching : false,
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#filter-property", function(){
        table_property.destroy();
        var type = 'property';
        reloadDataProperty($('#action_property_date').val(), type);
    })

    function reloadDataProperty(from, type ){
        table_property =  $('#datatable-'+type).DataTable({
            searching : false,
            processing : true,
            serverSide : true,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/auditrail/'+type,
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                     d.username = $('#user_name3').val();
                    d.modul_name = $('#module_name3').val();
                    d.project_name = $('#project_name').val();
                    d.company_name = $('#company_name3').val();
                    d.action_date = from;
                }
            },
            aoColumns : [
                {   data: 'created_at', name: 'created_at',  bSortable: false },
                {   data: 'modul_name', name: 'modul_name',  bSortable: false  },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'project_name', name: 'project_name',  bSortable: false  },
                {   data: 'company_name', name: 'company_name', bSortable: false },
                {   data: 'old_values', name: 'old_values', bSortable: false },
                {   data: 'new_values', name: 'new_values', bSortable: false },
                {   data: 'ip_address', name: 'ip_address', bSortable: false },
                {   data: 'action_location', name: 'action_location', bSortable: false }
            ],
        });
    }

// trigger useractivity
    var table_useractivity = $('#datatable-useractivity').DataTable({
        searching : false,
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#filter-useractivity", function(){
        table_useractivity.destroy();
        var type = 'useractivity';
        reloadDataUserActivity(type);
    })

    function reloadDataUserActivity(type){
        table_useractivity =  $('#datatable-'+type).DataTable({
            searching : false,
            processing : true,
            serverSide : true,
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/auditrail-'+type,
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.username = $('#username_activity').val();
                }
            },
            aoColumns : [
                {   data: 'user_id', name: 'user_id',  bSortable: false  },
                {   data: 'username', name: 'username',  bSortable: false  },
                {   data: 'action', name: 'action', bSortable: false }
            ],
        });
    }

</script>