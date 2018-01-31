@section('title','MyBRI - Audit Trail User Activity Detail')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Audit Trail User Activity Detail</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('auditrail.index')}}">Audit Trail</a>
                            </li>
                            <li class="active">
                                Audit Trail User Activity Detail
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @if (\Session::has('success'))
            <div class="alert alert-success">{{ \Session::get('success') }}</div>
            @endif
            <div class="row">
                <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Aksi :</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="action_date" id="action_date">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
            </form>
            <div class="text-right">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
            </div>
        </div>
    </div>
</div>
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="table-responsive">
                            <div class="tab-scroll">
                                <table id="datatable" class="table table-bordered">
                                    <thead class="bg-primary">
                                        <tr>
                                            <!-- <th>Nama Mitra Kerjasama</th> -->
                                            <th>Tanggal</th>
                                            <th>Nama Modul</th>
                                            <th>Nama User</th>
                                            <th>Data Lama</th>
                                            <th>Data Baru</th>
                                            <th>IP Address</th>
                                            <th>Lokasi Akses</th>
                                        </tr>
                                    </thead>
                                </table>
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
     $(document).on('click', "#btn-filter", function(){
        $("#datatable").dataTable().fnDestroy();
        reloadDataPengajuan();
    })

function reloadDataPengajuan(from, type){
        var table1 = $('#datatable').DataTable({
                processing : true,
                serverSide : true,
                searching : false,
                lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
                ],
                language : {
                    infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
                },
                ajax : {
                    url : '/datatables/detail-audit',
                    data : function(d, settings){
                        var api = new $.fn.dataTable.Api(settings);

                        d.page = Math.min(
                            Math.max(0, Math.round(d.start / api.page.len())),
                            api.page.info().pages
                            );
                        d.id = '{{$user_id}}';
                        d.action_date = $('#action_date').val();
                    }
                },
                aoColumns : [
                { data: 'created_at', name: 'created_at', bSortable : false},
                { data: 'modul_name', name: 'modul_name', bSortable : false },
                { data: 'username', name: 'username', bSortable : false },
                { data: 'old_values', name: 'old_values', bSortable : false },
                { data: 'new_values', name: 'new_values', bSortable : false },
                { data: 'ip_address', name: 'ip_address', bSortable : false },
                { data: 'action_location', name: 'action_location', bSortable : false },
            ],
        });
    }
</script>