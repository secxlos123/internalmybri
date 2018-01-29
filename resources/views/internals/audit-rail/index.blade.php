@section('title','MyBRI - Auditrail')

@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Auditrail</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li class="active">
                                Auditrail
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#pengajuan">Pengajuan Kredit</a></li>
                        <li><a data-toggle="tab" href="#developerAdmin">Admin Developer</a></li>
                        <li><a data-toggle="tab" href="#schedule">Penjadwalan</a></li>
                        <li><a data-toggle="tab" href="#collateral">Collateral</a></li>
                        <li><a data-toggle="tab" href="#loginUser">User Login</a></li>
                        <li><a data-toggle="tab" href="#profileEdit">Edit Profil & Ubah Password</a></li>
                        <li><a data-toggle="tab" href="#developerAgent">Agen Developer</a></li>
                        <li><a data-toggle="tab" href="#property">Property</a></li>
                        <li><a data-toggle="tab" href="#activityUser">User Activity</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="pengajuan" class="tab-pane fade in active">
                            @include('internals.audit-rail._eform')
                        </div>
                        <div id="developerAdmin" class="tab-pane fade ">
                            @include('internals.audit-rail._developerAdmin')
                        </div>
                        <div id="schedule" class="tab-pane fade">
                            @include('internals.audit-rail._schedule')
                        </div>
                        <div id="collateral" class="tab-pane fade">
                            @include('internals.audit-rail._collateral')
                        </div>
                        <div id="loginUser" class="tab-pane fade">
                            @include('internals.audit-rail._loginUser')
                        </div>
                        <div id="profileEdit" class="tab-pane fade">
                            @include('internals.audit-rail._profilEdit')
                        </div>
                        <div id="developerAgent" class="tab-pane fade">
                            @include('internals.audit-rail._developerAgent')
                        </div>
                        <div id="property" class="tab-pane fade">
                            @include('internals.audit-rail._property')
                        </div>
                        <div id="activityUser" class="tab-pane fade">
                            @include('internals.audit-rail._activityUser')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')

<script type="text/javascript">
    var table_pengajuan_kredit = $('#datatable-pengajuan_kredit').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

// trigger pengajuan kredit
    $(document).on('click', "#filter-eform", function(){
        table_pengajuan_kredit.destroy();
        var type = 'pengajuan_kredit';
        reloadData1($('#action_date_eform').val(), type);
    })

    var table_admin_dev = $('#datatable-admindev').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

// trigger admin dev
    $(document).on('click', "#filter-dev-admin", function(){
        table_admin_dev.destroy();
        var type = 'admindev';
        reloadData1($('#action_date_admin').val(), type);
    })

        var table_appointment = $('#datatable-appointment').DataTable({
        searching : false,
        order : [[3, 'asc']],
        "language": {
            "emptyTable": "No data available in table"
        }
    });

// trigger appointment
    $(document).on('click', "#filter-appointment", function(){
        table_appointment.destroy();
        var type = 'appointment';
        reloadData1($('#action_date_admin').val(), type);
    })

    function reloadData1(from, type){
        table1 = $('#datatable-'+type).DataTable({
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
</script>