@section('title','MyBRI - Detail Tracking')
@include('internals.layouts.head')
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

            <!-- <div class="row tracking-widget">
                <div class="col-md-3">
                    <div class="card-box widget-box-three active">
                        <div class="bg-icon pull-left">
                            <i class="fa fa-envelope"></i>
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
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="text-right">
                            <p class="m-t-5 text-uppercase font-600 font-secondary">Disposisi Pengajuan</p>
                        </div>
                    </div>
                    <span><i class="mdi mdi-arrow-right-bold-circle"></i></span>
                </div>
                <div class="col-md-3">
                    <div class="card-box widget-box-three">
                        <div class="bg-icon pull-left">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="text-right">
                            <p class="m-t-5 text-uppercase font-600 font-secondary">Proses Prakarsa Pengajuan</p>
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
                            <p class="m-t-5 text-uppercase font-600 font-secondary">Proses CLF</p>
                        </div>
                    </div>
                    <span><i class="mdi mdi-arrow-right-bold-circle"></i></span>
                </div>
                <div class="col-md-3">
                    <div class="card-box widget-box-three">
                        <div class="bg-icon pull-left">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="text-right">
                            <p class="m-t-5 text-uppercase font-600 font-secondary">Pengajuan Diterima</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-box widget-box-three">
                        <div class="bg-icon pull-left">
                            <i class="fa fa-usd"></i>
                        </div>
                        <div class="text-right">
                            <p class="m-t-5 text-uppercase font-600 font-secondary">Pencairan</p>
                        </div>
                    </div>
                </div>
            </div> -->
            @php ( $className = ($datas['kpr']['status_property'] == "1" && $datas['kpr']['developer_id'] != ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
            @php ( $classNameType = ($datas['kpr']['status_property'] != "1" || $datas['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
            @php ( $classKPRType = ($datas['kpr']['status_property'] != "1" && $datas['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
            @php ( $classNameDeveloper = ($datas['kpr']['status_property'] == "1") ? '' : 'hide' )
            <div>
                <div class="tracking-widget cms-tracking-widget">
                    <div class="tracking-card">
                        <div class="card-box widget-box-three @if($datas['status']=='Pengajuan Kredit') active @endif">
                            <div class="bg-icon">

                                <i class="fa fa-envelope"></i> 
                            </div>
                            <div class="text-center">
                                <p class="m-t-5 text-uppercase font-600 font-secondary">Pengajuan Telah Diterima</p>
                            </div>
                        </div>
                        <span><i class="mdi mdi-arrow-right-bold-circle"></i></span>
                    </div>
                    <div class="tracking-card">
                        <div class="card-box widget-box-three @if($datas['status']=='Disposisi Pengajuan') active @endif">
                            <div class="bg-icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="text-center">
                                <p class="m-t-5 text-uppercase font-600 font-secondary">Disposisi Pengajuan</p>
                            </div>
                        </div>
                        <span><i class="mdi mdi-arrow-right-bold-circle"></i></span>
                    </div>
                    <div class="tracking-card">
                        <div class="card-box widget-box-three @if($datas['status']=='Prakarsa') active @endif">
                            <div class="bg-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="text-center">
                                <p class="m-t-5 text-uppercase font-600 font-secondary">Prakarsa</p>
                            </div>
                        </div>
                        <span><i class="mdi mdi-arrow-right-bold-circle"></i></span>
                    </div>
                    <div class="tracking-card">
                        <div class="card-box widget-box-three @if($datas['status']=='Proses CLF') active @endif">
                            <div class="bg-icon">
                                <i class="ti-archive"></i>
                            </div>
                            <div class="text-center">
                                <p class="m-t-5 text-uppercase font-600 font-secondary">Proses CLF</p>
                            </div>
                        </div>
                    </div>
                    <div class="tracking-card">
                        <div class="card-box widget-box-three @if($datas['status']=='Kredit Disetujui') active @elseif($datas['status']=='Kredit Ditolak') active @endif">
                            <div class="bg-icon">
                                <i class="ti-wallet"></i>
                            </div>
                            <div class="text-center">
                                <p class="m-t-5 text-uppercase font-600 font-secondary">
                                    @if ($datas['status']=='Kredit Disetujui')
                                    Kredit Disetujui
                                    @elseif($datas['status']=='Kredit Ditolak')
                                    Kredit Ditolak
                                    @else
                                    Status Putusan Kredit
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @if($datas['status']=='Rekontes Kredit') 
                    <div class="tracking-card">
                        <div class="card-box widget-box-three active">
                            <div class="bg-icon">
                                <i class="ti-wallet"></i>
                            </div>
                            <div class="text-center">
                                <p class="m-t-5 text-uppercase font-600 font-secondary">Rekontes Kredit</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="tracking-card">
                        <div class="card-box widget-box-three @if($datas['status']=='Pencairan') active @endif">
                            <div class="bg-icon">
                                <i class="fa fa-usd"></i>
                            </div>
                            <div class="text-center">
                                <p class="m-t-5 text-uppercase font-600 font-secondary">Pencairan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-t-10">
                <div class="col-md-12">
                    <div class="card-box w-80">
                        <h4 class="m-t-0 m-b-30 header-title"><b>Detail Informasi</b></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">No. Ref :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['ref_number']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Tanggal Pengajuan :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['appointment_date']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Jenis KPR :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">@if($datas['kpr']['status_property'] == 1) Baru
                                                @elseif($datas['kpr']['status_property'] == 2)Secondary
                                                @elseif($datas['kpr']['status_property'] == 3)Refinancing
                                                @elseif($datas['kpr']['status_property'] == 4)Renovasi
                                                @elseif($datas['kpr']['status_property'] == 5)Top Up
                                                @elseif($datas['kpr']['status_property'] == 6)Take Over
                                                @elseif($datas['kpr']['status_property'] == 7)Take Over Top Up
                                                @elseif($datas['kpr']['status_property'] == 8)Take Over Account In House (Cash Bertahap)
                                            @endif</p>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $classNameDeveloper }}">
                                        <label class="col-md-4 control-label">Nama Developer :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['kpr']['developer_name']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group  {{ $className }}">
                                        <label class="col-md-4 control-label">Nama Proyek :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['kpr']['property_name']}}</p>
                                        </div>
                                    </div>
                                    @if(($datas['kpr']['developer_id'] == 1) || ($datas['kpr']['status_property'] != 1))
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Jenis Properti :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['kpr']['kpr_type_property_name']}}</p>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group {{ $className }}">
                                        <label class="col-md-4 control-label">Tipe Properti :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['kpr']['property_type_name']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $className }}">
                                        <label class="col-md-4 control-label">Unit Properti :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['kpr']['property_item_name']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Harga Rumah :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">Rp {{number_format($datas['kpr']['price'],2)}}</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Luas Bangunan :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['kpr']['building_area']}} M<sup>2</sup></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Lokasi Rumah :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['kpr']['home_location']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Jangka Waktu :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['kpr']['year']}} Bulan</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">KPR Aktif ke- :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">@if($datas['kpr']['active_kpr'] < 3){{$datas['kpr']['active_kpr']}} @else >2 @endif </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Uang Muka :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">Rp {{number_format($datas['kpr']['down_payment'],2)}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nama Pemohon :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['customer_name']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Jumlah Permohonan :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">Rp {{number_format($datas['nominal'],2)}}</p>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-4 control-label">Nama AO / Officer :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['ao_name']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Kantor Cabang :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static">{{$datas['branch']}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Status Aplikasi :</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"><mark>{{$datas['status']}}</mark></p>
                                        </div>
                                    </div> -->
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