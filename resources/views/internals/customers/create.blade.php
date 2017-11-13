@section('title','My BRI - Tambah Leads')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tambah Leads</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('customers.index')}}">Leads</a>
                                        </li>
                                        <li class="active">
                                            Tambah Leads
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
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Personal</h3>
                                    </div>
                                    <form class="form-horizontal" role="form" action="{{route('customers.store')}}" method="POST" enctype="multipart/form-data" id="form1">
                                    {{ csrf_field() }}
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" >
                                                    <div class="form-group nik {!! $errors->has('nik') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">NIK * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control numericOnly" name="nik" id="nik" value="{{ old('nik') }}" maxlength="16">
                                                            @if ($errors->has('nik')) <p class="help-block">{{ $errors->first('nik') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group full_name {!! $errors->has('full_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Nama Lengkap * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="full_name" id="full_name" value="{{ old('full_name') }}" maxlength="50">
                                                             @if ($errors->has('full_name')) <p class="help-block">{{ $errors->first('full_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group birth_place {!! $errors->has('birth_place') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tempat Lahir * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="birth_place" value="{{ old('birth_place') }}" maxlength="50">
                                                            @if ($errors->has('birth_place')) <p class="help-block">{{ $errors->first('birth_place') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group birth_date {!! $errors->has('birth_date') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tanggal Lahir * :</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control datepicker-date" id="datepicker-date" name="birth_date" value="{{ old('birth_date') }}">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                                @if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group gender {!! $errors->has('gender') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Jenis Kelamin * :</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="gender">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                            @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group status {!! $errors->has('status') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Status Pernikahan * :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="status" id="status">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option value="0">Belum Menikah</option>
                                                                <option value="1">Menikah</option>
                                                                <option value="2">Janda/Duda</option>
                                                            </select>
                                                            @if ($errors->has('status')) <p class="help-block">{{ $errors->first('status') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group email {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Email * :</label>
                                                        <div class="col-md-7">
                                                            <input type="email" class="form-control" name="email" value="{{old('email')}}" maxlength="50">
                                                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group mobile_phone {!! $errors->has('mobile_phone') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">No. Handphone * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" name="mobile_phone" value="{{old('mobile_phone')}}" maxlength="12">
                                                            @if ($errors->has('mobile_phone')) <p class="help-block">{{ $errors->first('mobile_phone') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group mother_name {!! $errors->has('mother_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Nama Gadis Ibu Kandung * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="mother_name" value="{{old('mother_name')}}" maxlength="50">
                                                            @if ($errors->has('mother_name')) <p class="help-block">{{ $errors->first('mother_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group identity {!! $errors->has('identity') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Foto KTP * :</label>
                                                        <div class="col-md-7">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="identity" accept="image/png,image/jpeg,image/gif">
                                                            @if ($errors->has('identity')) <p class="help-block">{{ $errors->first('identity') }}</p> @endif
                                                        </div>
                                                    </div>
                                                <div class="form-horizontal">
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="couple_data">
                            <div class="col-md-12">
                                @if (\Session::has('error'))
                                 <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Pasangan</h3>
                                    </div>
                                    <form class="form-horizontal" role="form" action="{{route('customers.store')}}" method="POST" enctype="multipart/form-data" id="form1">
                                    {{ csrf_field() }}
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" >
                                                    <div class="form-group couple_nik {!! $errors->has('couple_nik') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">NIK * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control numericOnly" name="couple_nik" id="nik" value="{{ old('couple_nik') }}" maxlength="16">
                                                            @if ($errors->has('couple_nik')) <p class="help-block">{{ $errors->first('couple_nik') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group couple_name {!! $errors->has('couple_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Nama Lengkap * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="couple_name" id="couple_name" value="{{ old('couple_name') }}" maxlength="50">
                                                             @if ($errors->has('couple_name')) <p class="help-block">{{ $errors->first('couple_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group couple_birth_place {!! $errors->has('couple_birth_place') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tempat Lahir * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="couple_birth_place" value="{{ old('couple_birth_place') }}" maxlength="50">
                                                            @if ($errors->has('couple_birth_place')) <p class="help-block">{{ $errors->first('couple_birth_place') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group couple_birth_date {!! $errors->has('couple_birth_date') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tanggal Lahir * :</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control datepicker-date" id="datepicker-autoclose" name="couple_birth_date" value="{{ old('couple_birth_date') }}">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                                @if ($errors->has('couple_birth_date')) <p class="help-block">{{ $errors->first('couple_birth_date') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group couple_identity {!! $errors->has('couple_identity') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">KTP Pasangan * :</label>
                                                        <div class="col-md-7">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="couple_identity" accept="image/png,image/jpeg,image/gif">
                                                            @if ($errors->has('couple_identity')) <p class="help-block">{{ $errors->first('couple_identity') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                                    <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

                 <!-- Modals Save -->
        <div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>Apakah Anda yakin ingin menambah Leads "<b id="name"></b>" ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <button type="button" id="btnSave" class="btn btn-orange waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot') 
<script type="text/javascript">
    $(document).ready(function() {
       $('#btnSave').on('click', function(e) {
            $("#form1").submit();
       });

       $('#btn-save').on('click', function(e) {
            var name = $('#full_name').val();
            $('#save').modal('show');
            $("#save #name").html(name);
       });
   });

    function hideCouple(){
        $('#couple_data').hide();

    }
    hideCouple();

    $('#status').on('change', function() {
        if(this.value==1){
            $('#couple_data').show();
        }else{
            hideCouple();
        }
    })

    $('#datepicker-date').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        endDate: new Date(),
        todayHighlight: true
    });
    $('#datepicker-date').datepicker("setDate",  "{{date('Y-m-d', strtotime('-20 years'))}}");

</script>