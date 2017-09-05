@section('title','My BRI - Tambah Pengajuan')
@include('internals.layouts.head')
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
                    @if (\Session::has('error'))
                     <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="card-box">
                        <form id="basic-form" action="{{route('eform.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div>
                                <h3>Produk</h3>
                                @include('internals.eform.product')
                                <h3>Leads</h3>
                                <section>
                                    <h4 class="m-t-0 header-title"><b>Leads</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Cari NIK Leads atau tambah Leads baru
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div role="form">
                                                <div class="form-group name {!! $errors->has('name') ? 'has-error' : '' !!}">
                                                    <label class="control-label"">Cari NIK Leads *</label>
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
                                                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inline m-t-27" role="form">
                                                <div class="form-group">
                                                    Atau
                                                </div>
                                                <a href="{{route('customers.create')}}" class="btn btn-primary waves-effect waves-light m-l-10 btn-md"><i class="fa fa-plus-circle"></i> Tambah Leads Baru</a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <div class="" id="detail">
                                                <!-- <h4 class="m-t-0 header-title"><b>Data Leads</b></h4>
 -->
                                                <!-- ============================================== -->
                                                <!-- Space untuk Detail Leads -->
                                               <!--  <p class="text-muted font-13 m-t-20" >
                                                    <code>Space ini nantinya berisi detail Leads (seperti yang ada di dalam modul Leads / detail), dan akan terisi jika NIK yang diisikan pada field Cari NIK di atas ditemukan.</code>
                                                </p> -->
                                                <!-- End Detail Leads -->
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
                                                Tentukan Perjanjian
                                            </p>
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group date {!! $errors->has('date') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Tanggal *:</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="datepicker-mindate" name="date" value="{{old('date')}}">
                                                            <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                            @if ($errors->has('date')) <p class="help-block">{{ $errors->first('date') }}</p> @endif
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label class="control-label col-md-4">Pukul :</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="timepicker2" name="time" value="{{old('time')}}">
                                                            <span class="input-group-addon b-0"><i class="mdi mdi-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="m-t-0 header-title"><b>Lokasi *</b></h4>
                                            <p class="text-muted m-b-30 font-13">
                                                Tentukan lokasi/tempat Pertemuan
                                            </p>
                                            <input id="searchInput" class="input-controls" type="text" placeholder="Masukkan nama tempat atau nama jalan untuk lokasi pertemuan">
                                            <div class="map" id="map" style="width: 100%; height: 400px;"></div>
                                            <div class="form-group m-t-20 location {!! $errors->has('location') ? 'has-error' : '' !!}">
                                                <div class="col-md-6">
                                                    <label class="control-label">Lokasi</label>
                                                    <textarea name="location" id="location" class="form-control" readonly="" rows="3">{{old('location')}}</textarea>
                                                </div>
                                                <!-- <div class="col-md-3">
                                                    <label class="control-label">Latitude</label>
                                                    <input type="text" name="lat" id="lat" class="form-control" readonly="" value="{{old('lat')}}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label">Longitude</label>
                                                    <input type="text" name="lng" id="lng" class="form-control" readonly="" value="{{old('lng')}}">
                                                </div> -->
                                                @if ($errors->has('location')) <p class="help-block">{{ $errors->first('location') }}</p> @endif
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
                                                Pilih Lokasi Bank Pengajuan
                                            </p>
                                            <div role="form">
                                                <div class="form-group >
                                                    <label class="control-label">Kota *</label>
                                                    {!! Form::select('cities', ['' => ''], old('cities'), [
                                                        'class' => 'select2 cities',
                                                        'data-placeholder' => 'Pilih Kota'
                                                    ]) !!}

                                                    @if ($errors->has('cities')) <p class="help-block">{{ $errors->first('cities') }}</p> @endif
                                                </div>
                                                <div class="form-group office_name {!! $errors->has('office_name') ? 'has-error' : '' !!}">
                                                    <label class="control-label">Kantor Cabang BRI *</label>
                                                    {!! Form::select('office_name', ['' => ''], old('office_name'), [
                                                        'class' => 'select2 offices',
                                                        'data-placeholder' => 'Pilih Kantor'
                                                    ]) !!}

                                                    @if ($errors->has('office_name')) <p class="help-block">{{ $errors->first('office_name') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

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

       $( "ul.nav.nav-pills.m-b-30 li" ).click(function() {
            $("ul.nav.nav-pills.m-b-30 li").removeClass('active');
            $(this).addClass('active');

           if($('li#li_kpr').hasClass('active')){
                $('#product_type').val('kpr');  

                 $('#form1').validate({
                    onkeyup: false,
                    rules: {
                      name: {
                        required: true
                      },
                      date: {
                        required: true
                      },
                      location: {
                        required: true,
                        email: true
                      },
                      cities: {
                        required: true
                      },
                      office_name: {
                        required: true
                      },
                      request_amount: {
                        required: true
                      },
                      year: {
                        required: true
                      },
                      home_location: {
                        required: true,
                        email: true
                      },
                      active_kpr: {
                        required: true
                      },
                      price: {
                        required: true
                      },
                      down_payment: {
                        required: true,
                        email: true
                      },
                      building_area: {
                        required: true
                      },
                      image: {
                        required: true
                      }
                    },
                    messages: {
                      name: {
                        required: "Anda harus memasukkan NIK"
                      },
                      date: {
                        required: "Anda harus memasukkan Tanggal"
                      },
                      location: {
                        required: "Anda harus memasukkan Lokasi"
                      },
                      cities: {
                        required: "Anda harus memasukkan Kota"
                      },
                      office_name: {
                        required: "Anda harus memasukkan Kantor Cabang"
                      },
                      request_amount: {
                        required: "Anda harus memasukkan Jumlah Permohonan"
                      },
                      year: {
                        required: "Anda harus memasukkan Jangka Waktu"
                      },
                      home_location: {
                        required: "Anda harus memasukkan Lokasi Rumah"
                      },
                      active_kpr: {
                        required: "Anda harus memasukkan KPR Aktif"
                      },
                      price: {
                        required: "Anda harus memasukkan Harga Rumah"
                      },
                      down_payment: {
                        required: "Anda harus memasukkan Jumlah Uang Muka"
                      },
                      building_area: {
                        required: "Anda harus memasukkan Luas Bangunan"
                      },
                      image: {
                        required: "Anda harus memasukkan Foto Dokumen"
                      }
                    },
                    onsubmit: function( element, event ) {
                        this.element( element );
                    }
                });
           }
           if($('li#li_kkb').hasClass('active')){
                $('#product_type').val('kkb');
           }
           if($('li#li_briguna').hasClass('active')){
                $('#product_type').val('briguna');  
           }
           if($('li#li_britama').hasClass('active')){
                $('#product_type').val('britama');  
           }
           if($('li#li_kur').hasClass('active')){
                $('#product_type').val('kur');  
           }
           if($('li#li_kartu').hasClass('active')){
                $('#product_type').val('kartu');    
           }
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