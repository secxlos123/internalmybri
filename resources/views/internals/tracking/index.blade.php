@section('title','My BRI - Daftar Tracking')
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
                        <h4 class="page-title">Daftar Tracking</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li class="active">
                                Manajemen Tracking
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
                            <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a>
                            <a href="{{route('downloadTracking')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a>
                        </div>
                        <div id="filter" class="collapse m-b-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-box">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Status :</label>
                                                <div class="col-sm-8">
                                                    {!! Form::select('status', ['' => ''], old('status'), [
                                                        'class' => 'select2 cities',
                                                        'data-placeholder' => '-- Pilih Status --'
                                                    ]) !!}
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
                        <table id="datatable" class="table table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Nomor Referensi</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Developer</th>
                                    <th>Nama Properti</th>
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
                        <p>Apakah Anda yakin ingin mengubah status Tracking ini?</p>
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
                url : '/datatables/tracking',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                }
            },
            aoColumns : [
                { data: 'ref_number', name: 'ref_number' },
                { data: 'appointment_date', name: 'appointment_date' },
                { data: 'developer_id', name: 'developer_id' },
                { data: 'property_id', name: 'property_id' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });

        $('#btn-filter').on('click', function () {
            table.fnDraw();
        });
    });

    TableManageButtons.init();
</script>