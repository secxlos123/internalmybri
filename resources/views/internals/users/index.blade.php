@section('title','My BRI - Daftar User')
@include('internals.layouts.head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Daftar User</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                Manajemen User
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div class="add-button">
                            <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a>
                            <a href="{{route('users.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah User</a>
                        </div>
                        <div id="filter" class="collapse m-b-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-box">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kota :</label>
                                                <div class="col-sm-8">
                                                    {!! Form::select('cities', ['' => ''], old('cities'), [
                                                        'class' => 'select2 cities',
                                                        'data-placeholder' => 'Pilih Kota'
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kantor Cabang :</label>
                                                <div class="col-sm-8">
                                                    {!! Form::select('office_name', ['' => ''], old('office_name'), [
                                                        'class' => 'select2 offices',
                                                        'data-placeholder' => 'Pilih Kantor'
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <a href="javascript:void(0)" id="btn-filter" class="btn btn-success waves-light waves-effect w-md">Filter</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Kantor Cabang</th>
                                    <th>Handphone</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modals Status -->
<div id="confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Apakah Anda yakin ingin merubah status user "<b class="fullname"></b>" ?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success waves-effect waves-light btn-save">Simpan</button>
            </div>
        </div>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    var resizefunc = [];
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });

        var table = $('#datatable').dataTable({
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
                url : '/datatables/users',
                data : function (params) {
                    params.office_id = $('.offices').val()
                }
            },
            aoColumns : [
                { data: 'nip', name: 'nip' },
                { data: 'fullname', name: 'fullname' },
                { data: 'email', name: 'email' },
                { data: 'office_name', name: 'office_name' },
                { data: 'mobile_phone', name: 'mobile_phone' },
                { data: 'role_slug', name: 'role_slug' },
                {
                   data: 'is_actived', 
                   name: 'is_actived', 
                   bSortable: false,
                   mRender: function (data, type, full) {
                        var checked = full.is_actived ? 'checked' : '';
                        return `<input type="checkbox" data-user="${full.fullname}" id="${full.id}" class="status" switch="success" ${checked}><label for="${full.id}" data-on-label="Aktif" data-off-label="Inaktif"></label>`;
                   },
                   createdCell:  function (td, cellData, rowData, row, col) {
                        $(td).attr('class', 'status'); 
                   }
                },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });

        $('#btn-filter').on('click', function () {
            table.fnDraw();
        });

        $(document).on('click', '.status input[type=checkbox]', function(e){
            e.preventDefault();
            var val = $(this).is(':checked');
            lastStatusElement = $(this);
            $(this).prop('checked', !val);
            $('b.fullname').text($(this).data('user'));
            $('#confirm').modal('show');
        });

        $('.btn-save').click(function () {
            var val = lastStatusElement.is(':checked');
            var id = lastStatusElement.attr('id');

            $.ajax({
                url : `/users/${id}/actived`,
                method : 'put',
                dataType : 'json',
                data : {
                    _token : "{!! csrf_token() !!}",
                    is_actived : !val
                }
            })
            .done(function (response) {
                table.fnDraw();
                $('#confirm').modal('hide');
            });
        });
        
        $('.cities').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/cities',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.cities.data,
                        pagination: {
                            more: (params.page * data.cities.per_page) < data.cities.total
                        }
                    };
                },
                cache: true
            },
        });
    });


    $('.cities').on('select2:unselect', function (e) {
        $('.offices').empty().select2({
            witdh : '100%',
            allowClear: true,
        });
    });

    $('.cities').on('select2:select', function (e) {
        var citi_id = e.params.data.id;
        get_offices(citi_id);
    });

    function get_offices(citi_id) {
        $('.offices').empty().select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: `/offices?citi_id=${citi_id}`,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1,
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.offices.data,
                        pagination: {
                            more: (params.page * data.offices.per_page) < data.offices.total
                        }
                    };
                },
                cache: true
            },
        });
    }

    TableManageButtons.init();
</script>