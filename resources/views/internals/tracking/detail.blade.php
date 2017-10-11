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
                        <h4 class="page-title">Tracking</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Tracking</a>
                            </li>
                            <li class="active">
                                Tracking Detail
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row tracking-widget">
                <div class="col-md-3">
                    <div class="card-box widget-box-three active">
                        <div class="bg-icon pull-left">
                            <i class="ti-check-box"></i>
                        </div>
                        <div class="text-right">
                            <p class="m-t-5 text-uppercase font-600 font-secondary">Aplikasi Telah Diterima</p>
                        </div>
                    </div>
                    <span><i class="mdi mdi-arrow-right-bold-circle"></i></span>
                </div>
                <div class="col-md-3">
                    <div class="card-box widget-box-three">
                        <div class="bg-icon pull-left">
                            <i class="ti-target"></i>
                        </div>
                        <div class="text-right">
                            <p class="m-t-5 text-uppercase font-600 font-secondary">Sedang Dalam Analisis</p>
                        </div>
                    </div>
                    <span><i class="mdi mdi-arrow-right-bold-circle"></i></span>
                </div>
                <div class="col-md-3">
                    <div class="card-box widget-box-three">
                        <div class="bg-icon pull-left">
                            <i class="ti-archive"></i>
                        </div>
                        <div class="text-right">
                            <p class="m-t-5 text-uppercase font-600 font-secondary">Sedang Proses Pemberkasan</p>
                        </div>
                    </div>
                    <span><i class="mdi mdi-arrow-right-bold-circle"></i></span>
                </div>
                <div class="col-md-3">
                    <div class="card-box widget-box-three">
                        <div class="bg-icon pull-left">
                            <i class="ti-wallet"></i>
                        </div>
                        <div class="text-right">
                            <p class="m-t-5 text-uppercase font-600 font-secondary">Proses Pencairan Dana</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-t-10">
                <div class="col-md-6">
                    <div class="card-box w-80">
                        <h4 class="m-t-0 m-b-30 header-title"><b>Detail Informasi</b></h4>
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">No. Ref :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['no_ref']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nama Pemohon :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['nama_pemohon']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Jumlah Pengajuan :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">Rp{{number_format($datas['jumlah_pengajuan'])}},00</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nama AO / Officer :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['ao']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Kantor Cabang :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['wacab']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Status Aplikasi :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"><mark>{{$datas['status']}}</mark></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer text-right">
        2017 © Bank Rakyat Indonesia.
    </footer>
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