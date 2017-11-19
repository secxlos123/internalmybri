@section('title','My BRI - Tambah Pengajuan')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"> --}}
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<style type="text/css">
    #wizard-validation-form label.error{
        font-family: 'Varela Round', sans-serif;
    }
</style>

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
                        <form id="wizard-validation-form"  action="{{route('eform.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div>
                                <h3>Produk</h3>
                                @include('internals.eform.product')
                                <h3>Customer</h3>
                                <section>
                                    <h4 class="m-t-0 header-title"><b>Customer</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Cari NIK Customer atau tambah Customer baru
                                    </p>
                                <div id="divForm"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div role="form">
                                                <div class="form-group nik {!! $errors->has('nik') ? 'has-error' : '' !!}">
                                                    <label class="control-label">Cari NIK Customer *</label>
                                                    <div class="input-group">
                                                        {!! Form::select('nik_id', ['' => ''], old('nik'), [
                                                                'class' => 'select2 nikSelect',
                                                                'data-placeholder' => 'NIK',
                                                                'id' => 'nik',
                                                                'maximumInputLength' => 16
                                                            ]) !!}
                                                        <span class="input-group-btn">
                                                        <a href="#" class="btn waves-effect waves-light btn-primary disabled" id="search"><i class="fa fa-search"></i> Cari</a>
                                                        </span>
                                                    </div>
                                                            @if ($errors->has('nik')) <p class="help-block">{{ $errors->first('nik') }}</p> @endif
                                                </div>
                                                <input type="hidden" name="nik" id="nik_customer">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inline m-t-27" role="form">
                                                <div class="form-group">
                                                    Atau
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light m-l-10 btn-md" id="btn-leads" ><i class="fa fa-plus-circle"></i> Tambah Nasabah Baru</a>
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
                                                    <code>Space ini nantinya berisi detail Nasabah (seperti yang ada di dalam modul Nasabah / detail), dan akan terisi jika NIK yang diisikan pada field Cari NIK di atas ditemukan.</code>
                                                </p> -->
                                                <!-- End Detail Nasabah -->
                                                <!-- ============================================== -->

                                            </div>
                                        </div>
                                    </div>

                                @if($data['role'] == 'ao')
                                    <input type="hidden" class="form-control" name="ao_id" value="{{ $data['pn'] }}">
                                @endif

                                @if((($data['uker'] == "KC")||($data['uker'] == "KCP")))
                                    <input type="hidden" class="form-control" id="datepicker-mindate" name="appointment_date" value="{{date('Y-m-d')}}">
                                    <input type="hidden" name="latitude" id="lat" class="form-control" readonly="" @if(!empty($office)) value="{{$office['lat']}}" @endif>
                                    <input type="hidden" name="longitude" id="lng" class="form-control" readonly="" @if(!empty($office)) value="{{$office['long']}}" @endif>
                                    <input type="hidden" name="address" id="address" class="form-control" readonly="" @if(!empty($office)) value="{{$office['address']}}" @endif>
                                    <input type="hidden" name="branch_id" @if(!empty($office)) value="{{$office['branch']}}" @endif>
                                    <input type="hidden" name="unit" id="branch_id" @if(!empty($office)) value="{{$office['unit']}}" @endif>
                                @endif
                                </section>
                            @if(!(($data['uker'] == "KC")||($data['uker'] == "KCP")))
                                <h3>Penjadwalan</h3>

                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="m-t-0 header-title"><b>Waktu</b></h4>
                                            <p class="text-muted m-b-30 font-13">
                                                Tentukan Perjanjian
                                            </p>
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group appointment_date {!! $errors->has('appointment_date') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Tanggal *:</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="datepicker-mindate" name="appointment_date" value="{{old('appointment_date')}}">
                                                            <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                            @if ($errors->has('appointment_date')) <p class="help-block">{{ $errors->first('appointment_date') }}</p> @endif
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
                                            <input id="searchInput" class="input-controls " type="text" placeholder="Masukkan nama tempat atau nama jalan untuk lokasi pertemuan">
                                            <div class="map" id="map" style="width: 100%; height: 400px;"></div>
                                            <div class="form-group m-t-20 location {!! $errors->has('location') ? 'has-error' : '' !!}">
                                                <div class="col-md-6">
                                                    <label class="control-label">Lokasi</label>
                                                    <textarea name="address" id="location" class="form-control" readonly="" rows="3">@if(!empty($office)) {{$office['address']}} @endif</textarea>
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- <label class="control-label">Latitude</label> -->
                                                    <input type="hidden" name="latitude" id="lat" class="form-control" readonly="" @if(!empty($office)) value="{{$office['lat']}}" @endif>
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- <label class="control-label">Longitude</label> -->
                                                    <input type="hidden" name="longitude" id="lng" class="form-control" readonly="" @if(!empty($office)) value="{{$office['long']}}" @endif>
                                                </div>
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
                                            <div class="form-group">
                                              <label class="control-label">Jarak (Kilometer)</label>
                                              <div class="form-group">
                                                <div class="col-md-6">
                                                  <input id="distance1" data-slider-id="distanceSlider" type="text" data-slider-min="0" data-slider-max="20" class="distanceSlider" data-slider-step="1" data-slider-value="10" name="distance" value="10">
                                                </div>
                                                <a href="javascript:void(0);" id="changeDistance" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i> Cari</a>
                                              </div>
                                            </div>
                                             <div class="form-group">
                                                  <label class="control-label">Kantor Cabang BRI</label>
                                                  <div>
                                                    <select id="branch_id" name="branch_id" class="select2 offices" value="1" data-placeholder="Pilih Kantor" style="width: 70%;">
                                                    </select>
                                                    <div id="alert-nik" class="text-danger">{!! $errors->first('branch_id') !!}</div>
                                                  </div>
                                                </div>

                                                <div class="form-group">
                                                  <label class="control-label">Alamat</label>
                                                  <div>
                                                    <textarea id="branch_address" class="form-control" placeholder="Alamat Kantor Cabang" readonly="">
                                                    </textarea>
                                                    <div id="alert-nik" class="text-danger">{!! $errors->first('branch_id') !!}</div>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                </section>
                            @endif
                            </div>
                            <!-- <input type="submit" name="" value="Done"> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('internals.eform.eform-modal')
@include('internals.eform.leads-form-modal')
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.eform.script-eform')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>
@if(!(($data['uker'] == "KC")||!($data['uker'] == "KCP")))
    <script src="{{asset('assets/js/jquery.gmaps.js')}}"></script>
@endif

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\Customer\CustomerRequest', '#form_data_personal'); !!}
{!! JsValidator::formRequest('App\Http\Requests\EForm\EFormRequest', '#wizard-validation-form'); !!}
@include('internals.eform.eform-validator')

