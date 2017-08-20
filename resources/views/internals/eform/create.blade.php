@section('title','My BRI - Tambah Pengajuan')
@include('internals.layouts.head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah Pengajuan</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('eform.index')}}">E-Form</a>
                            </li>
                            <li class="active">
                                Tambah Pengajuan
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <form id="basic-form" action="{{route('eform.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div>
                                <h3>Nasabah</h3>
                                <section>
                                    <h4 class="m-t-0 header-title"><b>Nasabah</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Cari NIK nasabah atau tambah nasabah baru
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div role="form">
                                                <div class="form-group">
                                                    <label class="control-label"">Cari NIK Nasabah</label>
                                                    <div class="input-group">
                                                        {!! Form::select('name', ['' => ''], old('name'), [
                                                                'class' => 'select2 nik',
                                                                'data-placeholder' => 'NIK',
                                                                'id' => 'nik'
                                                            ]) !!}
                                                        <span class="input-group-btn">
                                                        <a href="#" class="btn waves-effect waves-light btn-primary" id="search"><i class="fa fa-search"></i> Cari</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inline m-t-27" role="form">
                                                <div class="form-group">
                                                    Atau
                                                </div>
                                                <a href="{{route('customers.create')}}" class="btn btn-primary waves-effect waves-light m-l-10 btn-md"><i class="fa fa-plus-circle"></i> Tambah Nasabah Baru</a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <div class="" id="detail">
                                                <!-- <h4 class="m-t-0 header-title"><b>Data Nasabah</b></h4>
 -->
                                                <!-- ============================================== -->
                                                <!-- Space untuk Detail Nasabah -->
                                               <!--  <p class="text-muted font-13 m-t-20" >
                                                    <code>Space ini nantinya berisi detail nasabah (seperti yang ada di dalam modul nasabah / detail), dan akan terisi jika NIK yang diisikan pada field Cari NIK di atas ditemukan.</code>
                                                </p> -->
                                                <!-- End Detail Nasabah -->
                                                <!-- ============================================== -->

                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Penjadwalan</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="m-t-0 header-title"><b>Waktu</b></h4>
                                            <p class="text-muted m-b-30 font-13">
                                                Tentukan Waktu Pertemuan
                                            </p>
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tanggal :</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="datepicker-autoclose" name="date">
                                                            <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Pukul :</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="timepicker2" name="time">
                                                            <span class="input-group-addon b-0"><i class="mdi mdi-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="m-t-0 header-title"><b>Lokasi</b></h4>
                                            <p class="text-muted m-b-30 font-13">
                                                Tentukan lokasi/tempat Pertemuan
                                            </p>
                                            <input id="searchInput" class="input-controls" type="text" placeholder="Masukkan nama tempat atau nama jalan untuk lokasi pertemuan">
                                            <div class="map" id="map" style="width: 100%; height: 400px;"></div>
                                            <div class="form-group m-t-20">
                                                <div class="col-md-6">
                                                    <label class="control-label">Lokasi</label>
                                                    <textarea name="location" id="location" class="form-control" readonly="" rows="3"></textarea>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label">Latitude</label>
                                                    <input type="text" name="lat" id="lat" class="form-control" readonly="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label">Longitude</label>
                                                    <input type="text" name="lng" id="lng" class="form-control" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Kantor Cabang</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="m-t-0 header-title"><b>Kantor Cabang</b></h4>
                                            <p class="text-muted m-b-30 font-13">
                                                Pilih kantor cabang terdekat
                                            </p>
                                            <div role="form">
                                                <div class="form-group">
                                                    <label class="control-label">Kota</label>
                                                    {!! Form::select('cities', ['' => ''], old('cities'), [
                                                        'class' => 'select2 cities',
                                                        'data-placeholder' => 'Pilih Kota'
                                                    ]) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Kantor Cabang BRI</label>
                                                    {!! Form::select('office_name', ['' => ''], old('office_name'), [
                                                        'class' => 'select2 offices',
                                                        'data-placeholder' => 'Pilih Kantor'
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Produk</h3>
                                @include('internals.eform.product')
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot') 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });
        
        $('.nik').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getCustomer")}}',
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
                        results: data.customers.data,
                        pagination: {
                            more: (params.page * data.customers.per_page) < data.customers.total
                        }
                    };
                },
                cache: true
            },
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

       $('#search').on('click', function() {
           var id = $('#nik').val();

           $.ajax({
                dataType: 'json',
                type: 'GET',
                url: '{{route("detailCustomer")}}',
                data: { id : id } 
            }).done(function(data){
                console.log(data);
                $('#detail').html(data['view']);
            });
           
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
</script>