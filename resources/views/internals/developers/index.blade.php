@section('title','MyBRI - Daftar Mitra Kerjasama')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Daftar Mitra Kerjasama</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Home MyBRI</a>
                            </li>
                            <li class="active">
                                Manajemen Mitra Kerjasama
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
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div class="add-button">
                            <!-- <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a> -->
                            <a href="{{route('developers.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah Mitra Kerjasama</a>
                        </div>
                        <div id="filter" class="m-b-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-box">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Kota :</label>
                                                <div class="col-sm-8">
                                                    {!! Form::select('cities', ['' => ''], old('cities'), [
                                                    'class' => 'select2 cities',
                                                    'data-placeholder' => '-- Pilih Kota --'
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Jumlah Project :</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control projects" name="projects">
                                                        <option value="0" disabled="" selected=""> -- Pilih -- </option>
                                                        <option value="0|49"> < 50 </option>
                                                        <option value="50|100"> 50 - 100 </option>
                                                        <option value="100|200"> 100 - 200 </option>
                                                        <option value="200|400"> > 200 </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <a href="javascript:void(0)" id="btn-filter" class="btn btn-orange waves-light waves-effect w-md">Filter</a>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-scroll">
                            <table id="datatable" class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <!-- <th>Nama Mitra Kerjasama</th> -->
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor Telepon</th>
                                        <th>Kota</th>
                                        <th>Jumlah Project</th>
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
    </div>

    <!-- Modals Status -->
    <div id="confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p>Apakah Anda yakin ingin merubah status Mitra Kerjasama "<b class="fullname"></b>" ?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-orange waves-effect waves-light btn-save">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    @include('internals.layouts.footer')
    @include('internals.layouts.foot')
    <script type="text/javascript">
        var table1 = $('#datatable').DataTable({
            searching: false,
            "language": {
                "emptyTable": "No data available in table"
            }
        });

        $(document).on('click', "#btn-filter", function(){
            table1.destroy();
            reloadData1($('.cities').val(), $('.projects').val());
        })

        function reloadData1(city_id, project)
        {
            table1 = $('#datatable').DataTable({
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
                    url : '/datatables/developers',
                    data : function(d, settings){
                        var api = new $.fn.dataTable.Api(settings);

                        d.page = Math.min(
                            Math.max(0, Math.round(d.start / api.page.len())),
                            api.page.info().pages
                            );

                        d.city_id = $('.cities').val();
                        d.project = $('.projects').val();
                    }
                },
                aoColumns : [
                // { data: 'company_name', name: 'company_name' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'city_name', name: 'city_name' },
                { data: 'project', name: 'project' },
                {
                 data: 'is_actived',
                 name: 'is_actived',
                 bSortable: false,
                 mRender: function (data, type, full) {
                    var checked = full.is_actived ? 'checked' : '';
                    return '<input type="checkbox" data-developer="${full.name}" id="${full.dev_id}" class="status" switch="success" ${checked}><label for="${full.dev_id}" data-on-label="Aktif" data-off-label="Inaktif"></label>';
                },
                createdCell:  function (td, cellData, rowData, row, col) {
                    $(td).attr('class', 'status');
                }
            },
            { data: 'action', name: 'action', bSortable: false },
            ],
        });
        }
        var resizefunc = [];
        $(document).ready(function () {
            var lastStatusElement = null;
            $('.select2').select2({
                witdh : '100%',
                allowClear: true,
            });
        // var baseurl = window.location.origin;

        // var table = $('#datatable').dataTable({
        //     processing : true,
        //     serverSide : true,
        //     lengthMenu: [
        //         [ 10, 25, 50, -1 ],
        //         [ '10', '25', '50', 'All' ]
        //     ],
        //     language : {
        //         infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
        //     },
        //     ajax : {
        //         url : baseurl+'/datatables/developers',
        //         data : function(d, settings){
        //             var api = new $.fn.dataTable.Api(settings);

        //             d.page = Math.min(
        //                 Math.max(0, Math.round(d.start / api.page.len())),
        //                 api.page.info().pages
        //             );

        //             d.city_id = $('.cities').val();
        //             d.project = $('.projects').val();
        //         }
        //     },
        //     aoColumns : [
        //         // { data: 'company_name', name: 'company_name' },
        //         { data: 'name', name: 'name' },
        //         { data: 'email', name: 'email' },
        //         { data: 'phone_number', name: 'phone_number' },
        //         { data: 'city_name', name: 'city_name' },
        //         { data: 'project', name: 'project' },
        //         {
        //            data: 'is_actived',
        //            name: 'is_actived',
        //            bSortable: false,
        //            mRender: function (data, type, full) {
        //                 var checked = full.is_actived ? 'checked' : '';
        //                 return `<input type="checkbox" data-developer="${full.name}" id="${full.dev_id}" class="status" switch="success" ${checked}><label for="${full.dev_id}" data-on-label="Aktif" data-off-label="Inaktif"></label>`;
        //            },
        //            createdCell:  function (td, cellData, rowData, row, col) {
        //                 $(td).attr('class', 'status');
        //            }
        //         },
        //         { data: 'action', name: 'action', bSortable: false },
        //     ],
        // });

        // $('#btn-filter').on('click', function () {
        //     table.fnDraw();
        // });

        $(document).on('click', '.status input[type=checkbox]', function(e){
            e.preventDefault();
            var val = $(this).is(':checked');
            lastStatusElement = $(this);
            $(this).prop('checked', !val);
            $('b.fullname').text($(this).data('developer'));
            $('#confirm').modal('show');
        });

        $('.btn-save').click(function () {
            var val = lastStatusElement.is(':checked');
            var id = lastStatusElement.attr('id');

            $.ajax({
                url : `/developers/${id}/actived`,
                method : 'put',
                dataType : 'json',
                data : {
                    _token : "{!! csrf_token() !!}",
                    is_actived : !val
                }
            })
            .done(function (response) {
                //reloadData1($('.cities').val(), $('.projects').val());
                $('#confirm').modal('hide');
                $("#btn-filter").click();
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

TableManageButtons.init();
</script>