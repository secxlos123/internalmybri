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
                d.region_id = $('.action_kanwil2').val();
                d.branch = $('.branch').val();
            }
        },
        aoColumns : [
        {   data: 'created_at', name: 'created_at',  bSortable: false },
        {   data: 'modul_name', name: 'modul_name',  bSortable: false  },
        {   data: 'username', name: 'username',  bSortable: false  },
        {   data: 'ref_number', name: 'ref_number' },
        {   data: 'old_values', name: 'old_values', bSortable: false },
        {   data: 'new_values', name: 'new_values', bSortable: false },
        {   data: 'debitur', name: 'debitur', bSortable: false },
        {   data: 'ip_address', name: 'ip_address', bSortable: false },
        {   data: 'action_location', name: 'action_location', bSortable: false }
        ],
    });
}

// trigger pengajuan kredit briguna
var table_pengajuan_kredit_briguna = $('#datatable-pengajuan_kredit_briguna').DataTable({
    searching : false,
    // order : [[1, 'asc']],
    "language": {
        "emptyTable": "No data available in table"
    }
});

$(document).on('click', "#filter-eform-briguna", function() {
    table_pengajuan_kredit_briguna.destroy();
    var date = $('#action_date_eform_briguna').val();
    reloadDataPengajuanBriguna(date);
});

function reloadDataPengajuanBriguna(from){
    var http = window.location.protocol; 
    var domain = window.location.host;
    var url = http+'//'+domain;
    var action_url = '';
    if (url == 'https://internalmybri.bri.co.id' || url == 'http://internalmybridev.bri.co.id' || url=='http://localhost:96') {
        action_url = '/datatables/auditrail-kredit/';
    } else {
        action_url = '/internal/datatables/auditrail-kredit/';
    }

    table_pengajuan_kredit_briguna = $('#datatable-pengajuan_kredit_briguna').DataTable({
        searching : false,
        processing : true,
        serverSide : true,
        // order : [[1, 'asc']],
        lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10', '25', '50', 'All' ]
        ],
        language : {
            infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
        },
        ajax : {
            // url : '/datatables/auditrail-kredit/',
            url : action_url,
            data : function(d, settings){
                var api = new $.fn.dataTable.Api(settings);

                d.page = Math.min(
                    Math.max(0, Math.round(d.start / api.page.len())),
                    api.page.info().pages
                    );

                d.action_date = from;
                d.ref_number  = $('#no_ref').val();
                d.username    = $('#ao_name').val();
                d.status_name = $('#status_name').val();
                d.region_id = $('#branch_id').val();
                d.branch_id = $('#branch').val();
                d.branch_name = $('#branch_name').val();
            }
        },
        aoColumns : [
        {   data: 'tgl_pengajuan', name: 'tgl_pengajuan',  bSortable: false },
        {   data: 'cif', name: 'cif',  bSortable: false },
        {   data: 'id_aplikasi', name: 'id_aplikasi',  bSortable: false },
        {   data: 'ref_number', name: 'ref_number' },
        {   data: 'product', name: 'product',  bSortable: false },
        {   data: 'username', name: 'username',  bSortable: false  },
        {   data: 'tgl_analisa', name: 'tgl_analisa', bSortable: false },
        {   data: 'pinca_name', name: 'pinca_name', bSortable: false },
        {   data: 'tgl_putusan', name: 'tgl_putusan', bSortable: false },
        {   data: 'nama_debitur', name: 'nama_debitur', bSortable: false },
        {   data: 'tgl_pencairan', name: 'tgl_pencairan', bSortable: false },
        {   data: 'no_rekening', name: 'no_rekening', bSortable: false },
        {   data: 'Plafond_usulan', name: 'Plafond_usulan',  bSortable: false },
        {   data: 'status_putusan', name: 'status_putusan',  bSortable: false },
        {   data: 'status_prescreening', name: 'status_prescreening',  bSortable: false },
        {   data: 'eform_id', name: 'eform_id', bSortable: false, className: 'hidden' },
        {   data: 'action', name: 'action', orderable: false, searchable: false }
        ],
    });
}

//show modal CRS
$(document).on('click', "#btn-prescreening", function(){
    HoldOn.open();
    if ( $(this).attr('data-verified') != 1 ) {
        // notif for verification
        $("#result-modal .modal-body")
            .html(
                $('.modal-text-base').html()
            );
        $('#result-modal').modal('show');
        $("#result-modal .custom-dialog").attr('style', 'margin: 50px auto; width: 300px;');
        HoldOn.close();
    } else if ( $(this).attr('data-screening') == 1 ) {
        eformId = $(this).parent().parent().children('td').eq(15).html();
        // alert(eformId);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("detailPrescreening") }}',
            data: {
                eform : eformId
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            $("#result-modal .modal-body").html($('.modal-body-base').html());
            // sicd.bikole: 1 = hijau; 2 = kuning; dst = merah
            contents = data.response.contents;
            $('.card-box.m-t-30.remove-class-prescreening').remove();

            if (contents.eform.prescreening_status == "Hijau") {
                warna = '<p class="text-success form-control-static">Hijau</p>';
            } else if (contents.eform.prescreening_status == "Kuning") {
                warna = '<p class="text-warning form-control-static">Kuning</p>';
            } else if (contents.eform.prescreening_status == "Merah") {
                warna = '<p class="text-danger form-control-static">Merah</p>';
            }

            pefindo_warna = '<p class="text-warning form-control-static">Kuning</p>';
            if (contents.eform.pefindo_score >= 250 && contents.eform.pefindo_score <= 573) {
                pefindo_warna = '<p class="text-danger form-control-static">Merah</p>';
            } else if (contents.eform.pefindo_score >= 677 && contents.eform.pefindo_score <= 900 ) {
                pefindo_warna = '<p class="text-success form-control-static">Hijau</p>';
            }

            $("#result-modal .modal-body #prescreening-id").html(contents.eform.id);
            $("#result-modal .modal-body #prescreening-nik").html(contents.eform.nik);
            $("#result-modal .modal-body #prescreening-name").html(contents.eform.customer_name);
            $("#result-modal .modal-body #prescreening-result").html(warna);
            $("#result-modal .modal-body #prescreening-color").html(pefindo_warna);
            $("#result-modal .modal-body #prescreening-score").html(contents.eform.pefindo_score);
            $("#result-modal .modal-body #prescreening-notice").html(contents.eform.ket_risk);

            uploadscore = contents.eform.uploadscore;
            html = '';
            assets = "{{asset('assets/images/download.png')}}";
            if ( uploadscore != null || uploadscore != '') {
                split = uploadscore.split(',');
                $.each(split, function(key, value) {
                    if (value != ''){
                        html += '<a href="'+value+'" target="_blank"><img src="'+assets+'" width="50" class="img-responsive"></a><br/>';
                    }
                })
            } else {
                html = '<p class="form-control-static">-</p>';
            }

            $("#result-modal .modal-body #prescreening-image").html(html);
            base = $("#result-modal .modal-body .card-box.m-t-30.after-this");
            html = '';
            $.each(contents.dhn, function(key, dhn) {
                if (dhn.warna == "Hijau") {
                    warna = '<p class="text-success form-control-static">Hijau</p>';
                } else if (dhn.warna == "Kuning") {
                    warna = '<p class="text-warning form-control-static">Kuning</p>';
                } else if (dhn.warna == "Merah") {
                    warna = '<p class="text-danger form-control-static">Merah</p>';
                }

                html += '<div class="card-box m-t-30 remove-class-prescreening"><h4 class="m-t-min30 m-b-30 header-title custom-title" id="success"> DHN </h4><div class="row"><div class="col-md-6"><div class="form-horizontal" role="form"><div class=""><label class="col-md-6 control-label"> Hasil DHN </label><div class="col-md-6 dhn-color">'+warna+'</div></div></div></div></div></div>';
            })

            $.each(contents.sicd, function(key, sicd) {
                if (sicd.bikole == 1 || sicd.bikole == '-' || sicd.bikole == null || sicd.bikole == '') {
                    warna = '<p class="text-success form-control-static">Hijau</p>';
                } else if (sicd.bikole == 2) {
                    warna = '<p class="text-warning form-control-static">Kuning</p>';
                } else if (sicd.bikole >= 3) {
                    warna = '<p class="text-danger form-control-static">Merah</p>';
                }

                html += '<div class="card-box m-t-30 remove-class-prescreening"><h4 class="m-t-min30 m-b-30 header-title custom-title" id="success"> SICD </h4><div class="row"><div class="col-md-6"><div class="form-horizontal" role="form"><div class=""><label class="col-md-6 control-label"> Nama Nasabah </label><div class="col-md-6"><p class="form-control-static">'+(sicd.nama_debitur==null ? '-' : sicd.nama_debitur)+'</p></div></div><div class=""><label class="col-md-6 control-label"> NIK </label><div class="col-md-6"><p class="form-control-static">'+(sicd.no_identitas==null ? '-' : sicd.no_identitas)+'</p></div></div><div class=""><label class="col-md-6 control-label"> Tanggal Lahir </label><div class="col-md-6"><p class="form-control-static">'+(sicd.tgl_lahir==null ? '-' : sicd.tgl_lahir)+'</p></div></div><div class=""><label class="col-md-6 control-label"> Kolektibilitas </label><div class="col-md-6"><p class="form-control-static">'+(sicd.bikole==null ? '-' : sicd.bikole)+'</p></div></div><div class=""><label class="col-md-6 control-label"> Hasil SICD </label><div class="col-md-6">'+warna+'</div></div></div></div></div></div>';
            })

            $(html).insertAfter(base);
            $("#result-modal .custom-dialog").attr('style', 'margin: 50px auto; width: 1000px;');
            $('#result-modal').modal('show');
            HoldOn.close();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    } else {
        // window.location = $(this).attr('data-url');
        // notif for verification
        $("#result-modal .modal-body")
            .html(
                $('.modal-text-base-none').html()
            );
        $('#result-modal').modal('show');
        $("#result-modal .custom-dialog").attr('style', 'margin: 50px auto; width: 300px;');
        HoldOn.close();
    }
});

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
                d.region_name = $('.action_kanwil').val();
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
        {   data: 'debitur', name: 'debitur', bSortable: false },
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
        {   data: 'ip_address', name: 'ip_address',  bSortable: false  },
        {   data: 'action_location', name: 'action_location',  bSortable: false  },
        {   data: 'action', name: 'action', bSortable: false }
        ],
    });
}

// trigger document
var table_document = $('#datatable-document').DataTable({
    searching : false,
    "language": {
        "emptyTable": "No data available in table"
    }
});

$(document).on('click', "#filter-document", function(){
    table_document.destroy();
    var type = 'document';
    reloadDataDocument(type);
})

function reloadDataDocument(type){
    table_document =  $('#datatable-'+type).DataTable({
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

                d.nik = $('#modul_action_document').val();
            }
        },
        aoColumns : [
        {   data: 'ref_number', name: 'ref_number',  bSortable: false  },
        {   data: 'customer_name', name: 'customer_name',  bSortable: false  },
        {   data: 'nominal', name: 'nominal',  bSortable: false  },
        {   data: 'status', name: 'status',  bSortable: false  },
        {   data: 'action', name: 'action', bSortable: false }
        ],
    });
}

//collaterl doc
    $(document).on('click', "#btn-filter-doc-collateral", function(){
        
        $("#datatable-developer").dataTable().fnDestroy();
        $("#datatable-non").dataTable().fnDestroy();
      
        reloadDatacolDeveloper();
        reloadDatacolNon();
    })

      function reloadDatacolDeveloper()
    {
        tablecdev = $('#datatable-developer').DataTable({
         processing : true,
         serverSide : true,
         ordering: false,
         lengthMenu: [
         [ 10, 25, 50, -1 ],
         [ '10', '25', '50', 'All' ]
         ],
         language : {
            infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
        },
        ajax : { 
 
            url :'{{ route("list-collateral-dev") }}',
            data : function(d, settings){
                var api = new $.fn.dataTable.Api(settings);

                d.page = Math.min(
                    Math.max(0, Math.round(d.start / api.page.len())),
                    api.page.info().pages
                    );
                d.status = $('#status_doc_collateral').val();
                d.created_at = $('#doc_collateral_date').val();
                d.staff_name = $('#doc_staff').val();
                d.manager_name = $('#doc_manager').val();
                d.region_name = $('.doc_kanwil').val();
            }
        },
        aoColumns : [
        {   data: 'prop_name', name: 'prop_name', bSortable: false  },
        {   data: 'prop_city_name', name: 'prop_city_name',  bSortable: false  },
        {   data: 'prop_types', name: 'prop_types',  bSortable: false  },
        {   data: 'prop_items', name: 'prop_items', bSortable: true },
                {   data: 'prop_pic_name', name: 'prop_pic_name', bSortable: false },
                {   data: 'prop_pic_phone', name: 'prop_pic_phone', bSortable: false },
                {   data: 'staff_name', name: 'staff_name', bSortable: false },
                {   data: 'status', name: 'status', bSortable: true },
                {   data: 'manager_name', name: 'manager_name', bSortable: true },
                {   data: 'action', name: 'action', bSortable: false, bSearchable: false },
                ],
            });
    }
    function reloadDatacolNon()
    {
       var status = $('#status_doc_collateral').val();
        tablecdev = $('#datatable-non').DataTable({
         processing : true,
         serverSide : true,
         ordering: false,
         lengthMenu: [
         [ 10, 25, 50, -1 ],
         [ '10', '25', '50', 'All' ]
         ],
         language : {
            infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
        },
        ajax : {
            url :'{{ route("list-collateral-non") }}',
            data : function(d, settings){
                var api = new $.fn.dataTable.Api(settings);

                d.page = Math.min(
                    Math.max(0, Math.round(d.start / api.page.len())),
                    api.page.info().pages
                    );
                d.status = status;
                d.created_at = $('#doc_collateral_date').val();
                d.staff_name = $('#doc_staff').val();
                d.manager_name = $('#doc_manager').val();
                d.region_name = $('.doc_kanwil').val();
            }
        },
         aoColumns : [
            {   data: 'first_name', name: 'first_name', bSortable: false  },
            {   data: 'home_location', name: 'home_location',  bSortable: false  },
            {   data: 'mobile_phone', name: 'mobile_phone',  bSortable: false  },
            {   data: 'staff_name', name: 'staff_name', bSortable: false },
            {   data: 'status', name: 'status', bSortable: false },
            {   data: 'manager_name', name: 'manager_name', bSortable: false },
            {   data: 'action', name: 'action', orderable: false, searchable: false}
            ],
        });
    }
</script>