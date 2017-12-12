@section('title','My BRI - Detail Informasi Approval Collateral Properti')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <!-- header -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Informasi Approval Collateral Properti</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dasboard</a>
                            </li>
                            <li>
                                <a href="{{route('collateral.index')}}">List Approval Pengajuan Properti Baru</a>
                            </li>
                            <li class="active">
                                Approval Collateral Properti
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- contains -->
            <div class="row">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                     <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="m-t-0 header-title"><b>Detail Informasi Approval Collateral Appraisal</b></h5>
                           
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jenis KPR :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Baru</p>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Developer :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Non Kerjasama</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jenis Properti :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Rumah Tapak</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Harga Rumah :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Rp. 89.999.000,00</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Luas Bangunan :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">87 M <sup>2</sup></p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Lokasi Rumah :</label>
                                                        <div class="col-md-7">
                                                            <p class="form-control-static">Lorem ipsum</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Foto :</label>
                                                        <div class="col-md-7">
                                                            <img id="preview" src="{{asset('assets/images/no-image.jpg')}}" width="300">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- rekomendasi approval -->
                                        <form class="form-horizontal" role="form" method="POST" id="form1">
                                            <div class="text-center">
                                                <a href="{{URL::previous()}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- informasi penilaian -->                                @include('internals.collateral.manager.detail-information-modal')           @include('internals.collateral._reject-modal')
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.collateral.script')
@include('internals.collateral.manager.append-script')

<script type="text/javascript">
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });
        
        $('.name').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getAO")}}',
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
                    // console.log(data);
                    return {
                        results: data.officers.data,
                        pagination: {
                            more: (params.page * data.officers.per_page) < data.officers.total
                        }
                    };
                },
                cache: true
            },
        });
    });
    // $(document).on('click', "#view-detail", function(){
    //     $('#detail-collateral-modal').modal('show');
    // })

    $(document).on('click', "#btn-approve", function(){
        $('#is_approved').attr('value', true);
        $('#form1').submit();
        HoldOn.open(options);
    })

    $(document).on('click', "#btn-reject", function(){
        $('#reject-modal').modal('show');
    })

    $(document).on('click', "#btn-submit", function(){
        $('#is_approved').attr('value', false);
        $('#form1').submit();
        HoldOn.open(options);
    })
</script>