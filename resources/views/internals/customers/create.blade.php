@section('title','My BRI - Tambah Nasabah')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tambah Nasabah</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('customers.index')}}">Nasabah</a>
                                        </li>
                                        <li class="active">
                                            Tambah Nasabah
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Pribadi</h3>
                                    </div>
                                    <form class="form-horizontal" role="form" action="{{route('customers.store')}}" method="POST" enctype="multipart/form-data" id="form1">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
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
                                                                <input type="text" class="form-control" id="datepicker-autoclose" name="birth_date" value="{{ old('birth_date') }}">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                                @if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group address {!! $errors->has('address') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Alamat * :</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" name="address" maxlength="255">{{ old('address') }}</textarea>
                                                            @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group gender {!! $errors->has('gender') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Jenis Kelamin * :</label>
                                                        <div class="col-md-7">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" id="laki" value="L"  name="gender">
                                                                <label for="laki"> Laki-laki </label>
                                                            </div>
                                                            <div class="radio radio-pink radio-inline">
                                                                <input type="radio" id="perempuan" value="P" name="gender">
                                                                <label for="perempuan"> Perempuan </label>
                                                            </div>
                                                            @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group citizenship {!! $errors->has('citizenship') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Kewarganegaraan * :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="citizenship">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option>WNI</option>
                                                                <option>WNA</option>
                                                            </select>
                                                            @if ($errors->has('citizenship')) <p class="help-block">{{ $errors->first('citizenship') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group status {!! $errors->has('status') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Status Pernikahan * :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="status">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option value="0">Tidak Menikah</option>
                                                                <option value="1">Menikah</option>
                                                                <option value="2">Janda</option>
                                                                <option value="3">Duda</option>
                                                            </select>
                                                            @if ($errors->has('status')) <p class="help-block">{{ $errors->first('status') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group address_status {!! $errors->has('address_status') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Status Tempat Tinggal * :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="address_status">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option value="menetap">Permanen</option>
                                                                <option value="sementara">Sementara</option>
                                                            </select>
                                                            @if ($errors->has('address_status')) <p class="help-block">{{ $errors->first('address_status') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group email {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Email * :</label>
                                                        <div class="col-md-7">
                                                            <input type="email" class="form-control" name="email" value="{{old('email')}}" maxlength="50">
                                                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group mother_name {!! $errors->has('mother_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Nama Gadis Ibu Kandung * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="mother_name" value="{{old('mother_name')}}" maxlength="50">
                                                            @if ($errors->has('mother_name')) <p class="help-block">{{ $errors->first('mother_name') }}</p> @endif
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
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Pekerjaan</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group work_type {!! $errors->has('work_type') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Jenis Pekerjaan * :</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="work_type">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option value="swasta">Pegawai Swasta</option>
                                                                <option value="negeri">Pegawai Negeri</option>
                                                            </select>
                                                            @if ($errors->has('work_type')) <p class="help-block">{{ $errors->first('work_type') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group work {!! $errors->has('work') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Pekerjaan * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="work" value="{{old('work')}}">
                                                            @if ($errors->has('work')) <p class="help-block">{{ $errors->first('work') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group company_name {!! $errors->has('company_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Nama Perusahaan * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="company_name" value="{{old('company_name')}}" maxlength="50">
                                                            @if ($errors->has('company_name')) <p class="help-block">{{ $errors->first('company_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group work_field {!! $errors->has('work_field') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Bidang Pekerjaan * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="work_field" value="{{old('work_field')}}" maxlength="50">
                                                            @if ($errors->has('work_field')) <p class="help-block">{{ $errors->first('work_field') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group position {!! $errors->has('position') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Jabatan * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="position" value="{{old('position')}}" maxlength="50">
                                                            @if ($errors->has('position')) <p class="help-block">{{ $errors->first('position') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group work_duration {!! $errors->has('work_duration') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Lama Kerja (Tahun) * :</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control" name="work_duration" maxlength="3" min="0" value="{{old('work_duration')}}">
                                                            @if ($errors->has('work_duration')) <p class="help-block">{{ $errors->first('work_duration') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group office_address {!! $errors->has('office_address') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Alamat Kantor * :</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" rows="3" name="office_address" maxlength="255">{{old('office_address')}}</textarea>
                                                            @if ($errors->has('office_address')) <p class="help-block">{{ $errors->first('office_address') }}</p> @endif
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
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Finansial</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group salary {!! $errors->has('salary') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Gaji/Pendapatan * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" name="salary" maxlength="12" value="{{old('salary')}}" >
                                                            @if ($errors->has('salary')) <p class="help-block">{{ $errors->first('salary') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group salary {!! $errors->has('salary') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Pendapatan Lain * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" name="other_salary" maxlength="12" value="{{old('salary')}}" >
                                                            @if ($errors->has('salary')) <p class="help-block">{{ $errors->first('salary') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group loan_installment {!! $errors->has('loan_installment') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Angsuran Pinjaman * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" name="loan_installment" maxlength="12" value="{{old('loan_installment')}}" >
                                                            @if ($errors->has('loan_installment')) <p class="help-block">{{ $errors->first('loan_installment') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group dependent_amount {!! $errors->has('dependent_amount') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Jumlah Tanggungan * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" name="dependent_amount" maxlength="2" value="{{old('dependent_amount')}}">
                                                            @if ($errors->has('dependent_amount')) <p class="help-block">{{ $errors->first('dependent_amount') }}</p> @endif
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
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Contact Person</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group phone {!! $errors->has('phone') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">No. Telepon * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" name="phone" value="{{old('phone')}}">
                                                            @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group mobile_phone {!! $errors->has('mobile_phone') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">No. Handphone * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" name="mobile_phone" value="{{old('mobile_phone')}}">
                                                            @if ($errors->has('mobile_phone')) <p class="help-block">{{ $errors->first('mobile_phone') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group emergency_contact {!! $errors->has('emergency_contact') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Emergency Contact * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" name="emergency_contact" value="{{old('emergency_contact')}}">
                                                            @if ($errors->has('emergency_contact')) <p class="help-block">{{ $errors->first('emergency_contact') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group emergency_relation {!! $errors->has('emergency_relation') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Hubungan * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="emergency_relation"  value="{{old('emergency_relation')}}">
                                                            @if ($errors->has('emergency_relation')) <p class="help-block">{{ $errors->first('emergency_relation') }}</p> @endif
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
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Pendukung</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto KTP * :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="identity" accept="image/png,image/jpeg,image/gif">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto NPWP * :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="npwp" accept="image/png,image/jpeg,image/gif">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto Nasabah * :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="images" accept="image/png,image/jpeg,image/gif">
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
                                    <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Simpan</a>
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
                                <p>Apakah Anda yakin ingin menambah nasabah "<b id="name"></b>" ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <button type="button" id="btnSave" class="btn btn-success waves-effect waves-light">Simpan</button>
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

</script>