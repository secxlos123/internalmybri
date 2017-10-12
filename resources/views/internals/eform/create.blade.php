@section('title','My BRI - Tambah Pengajuan')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style type="text/css">
    #wizard-validation-form label.error{
        font-family: 'Varela Round', sans-serif;
    }
</style>
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
                        <form id="wizard-validation-form"  action="{{route('eform.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div>
                                <h3>Produk</h3>
                                @include('internals.eform.product')
                                <div id="divForm"></div>
                                <h3>Leads</h3>
                                <section>
                                    <h4 class="m-t-0 header-title"><b>Leads</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Cari NIK Leads atau tambah Leads baru
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div role="form">
                                                <div class="form-group nik {!! $errors->has('nik') ? 'has-error' : '' !!}">
                                                    <label class="control-label"">Cari NIK Leads *</label>
                                                    <div class="input-group">
                                                        {!! Form::select('nik', ['' => ''], old('nik'), [
                                                                'class' => 'select2 nikSelect',
                                                                'data-placeholder' => 'NIK',
                                                                'id' => 'nik'
                                                            ]) !!}
                                                        <span class="input-group-btn">
                                                        <a href="#" class="btn waves-effect waves-light btn-primary" id="search"><i class="fa fa-search"></i> Cari</a>
                                                        </span>
                                                    </div>
                                                            @if ($errors->has('nik')) <p class="help-block">{{ $errors->first('nik') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inline m-t-27" role="form">
                                                <div class="form-group">
                                                    Atau
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light m-l-10 btn-md disabled" id="btn-leads" ><i class="fa fa-plus-circle"></i> Tambah Leads Baru</a>
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
                                                    <textarea name="address" id="location" class="form-control" readonly="" rows="3">Bandung</textarea>
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- <label class="control-label">Latitude</label> -->
                                                    <input type="hidden" name="latitude" id="lat" class="form-control" readonly="" value="123456789">
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- <label class="control-label">Longitude</label> -->
                                                    <input type="hidden" name="longitude" id="lng" class="form-control" readonly="" value="12345678">
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
                                            <div role="form">
                                                <div class="form-group office_id {!! $errors->has('office_name') ? 'has-error' : '' !!}">
                                                    <label class="control-label">Kantor Cabang BRI *</label>
                                                    <!-- {!! Form::select('office_name', ['' => ''], old('office_name'), [
                                                        'class' => 'select2 offices',
                                                        'data-placeholder' => 'Pilih Kantor',
                                                        'readonly' => true
                                                    ]) !!} -->
                                                    <input type="hidden" name="branch_id" value="{{$office['branch']}}">
                                                        <input type="text" name="branch" value="{{$office['unit']}}" readonly="" class="form-control" id="branch">

                                                    @if ($errors->has('office_id')) <p class="help-block">{{ $errors->first('office_id') }}</p> @endif
                                                </div>
                                                <div class="form-group office_id {!! $errors->has('office_name') ? 'has-error' : '' !!}">
                                                    <label class="control-label">Alamat Kantor Cabang </label>
                                                    <!-- {!! Form::select('office_name', ['' => ''], old('office_name'), [
                                                        'class' => 'select2 offices',
                                                        'data-placeholder' => 'Pilih Kantor',
                                                        'readonly' => true
                                                    ]) !!} -->
                                                    <!-- <input type="hidden" name="office_id" value="1"> -->
                                                        <textarea type="text" name="branch" value="KC Lembang" readonly="" class="form-control">{{$office['address']}}</textarea>

                                                    @if ($errors->has('office_id')) <p class="help-block">{{ $errors->first('office_id') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
@include('internals.eform.script-eform')
<script src="{{asset('assets/js/jquery.gmaps.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Customer\CustomerRequest', '#form_data_personal'); !!}
<!-- {!! JsValidator::formRequest('App\Http\Requests\EForm\EFormRequest', '#wizard-validation-form'); !!} -->

