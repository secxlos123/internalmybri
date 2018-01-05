@section('title','My BRI - Edit Nasabah')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Edit Nasabah</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('customers.index')}}">Nasabah</a>
                                        </li>
                                        <li class="active">
                                            Edit Nasabah
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
                                        <h3 class="panel-title">Data Pribadi</h3>
                                    </div>
                                    <form class="form-horizontal" role="form" action="{{route('customers.update', $id)}}" method="POST" enctype="multipart/form-data" id="form1">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group nik {!! $errors->has('nik') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">NIK *:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control numericOnly" value="@if(!empty($dataCustomer['personal']['nik'])){{$dataCustomer['personal']['nik']}}@endif" name="nik" maxlength="16">
                                                            @if ($errors->has('nik')) <p class="help-block">{{ $errors->first('nik') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group full_name {!! $errors->has('full_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Nama Lengkap *:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['personal']['name']}}" name="full_name" id="full_name" maxlength="50">
                                                            @if ($errors->has('full_name')) <p class="help-block">{{ $errors->first('full_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group birth_place {!! $errors->has('birth_place') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tempat Lahir *:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="@if(!empty($dataCustomer['personal']['birth_place'])){{$dataCustomer['personal']['birth_place']}}@endif" name="birth_place" maxlength="50">
                                                            @if ($errors->has('birth_place')) <p class="help-block">{{ $errors->first('birth_place') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group birth_date {!! $errors->has('birth_date') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tanggal Lahir *:</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="datepicker-autoclose" value="@if(!empty($dataCustomer['personal']['birth_date'])){{$dataCustomer['personal']['birth_date']}}@endif" name="birth_date">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                            @if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group address {!! $errors->has('address') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Alamat *:</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" name="address" maxlength="255">@if(!empty($dataCustomer['personal']['address'])){{$dataCustomer['personal']['address']}}@endif</textarea>
                                                            @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group gender {!! $errors->has('gender') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Jenis Kelamin *:</label>
                                                        <div class="col-md-7">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" id="laki" value="L"{{($dataCustomer['personal']['gender'] == "Laki-laki") ? 'checked' : '' }} name="gender">
                                                                <label for="laki"> Laki-laki </label>
                                                            </div>
                                                            <div class="radio radio-pink radio-inline">
                                                                <input type="radio" id="perempuan" value="P" {{($dataCustomer['personal']['gender'] == "Perempuan") ? 'checked' : '' }} name="gender">
                                                                <label for="perempuan"> Perempuan </label>
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
                                                    </div>
                                                    <div class="form-group citizenship {!! $errors->has('citizenship') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Kewarganegaraan *:</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="citizenship">
                                                                <option disabled="">-- Pilih --</option>
                                                                <option @if(!empty($dataCustomer['personal']['citizenship'])){{($dataCustomer['personal']['citizenship'] == "Indonesia") ? 'selected' : '' }}@endif>WNI</option>
                                                                <option @if(!empty($dataCustomer['personal']['citizenship'])){{($dataCustomer['personal']['citizenship'] == "WNA") ? 'selected' : '' }}@endif>WNA</option>
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('citizenship')) <p class="help-block">{{ $errors->first('citizenship') }}</p> @endif
                                                    </div>
                                                    <div class="form-group status {!! $errors->has('status') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Status Pernikahan *:</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="status">
                                                                <option disabled="">-- Pilih --</option>
                                                                <option @if(!empty($dataCustomer['personal']['status'])){{($dataCustomer['personal']['status'] == "0") ? 'selected' : '' }}@endif value="0">Belum Menikah</option>
                                                                <option @if(!empty($dataCustomer['personal']['status'])){{($dataCustomer['personal']['status'] == "1") ? 'selected' : '' }}@endif value="1">Menikah</option>
                                                                <option @if(!empty($dataCustomer['personal']['status'])){{($dataCustomer['personal']['status'] == "2") ? 'selected' : '' }}@endif value="2">Janda</option>
                                                                <option @if(!empty($dataCustomer['personal']['status'])){{($dataCustomer['personal']['status'] == "3") ? 'selected' : '' }}@endif value="3">Duda</option>
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('status')) <p class="help-block">{{ $errors->first('status') }}</p> @endif
                                                    </div>
                                                    <div class="form-group address_status {!! $errors->has('address_status') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Status Tempat Tinggal *:</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="address_status">
                                                                <option disabled="">-- Pilih --</option>
                                                                <option @if(!empty($dataCustomer['personal']['address_status'])){{($dataCustomer['personal']['address_status'] == "menetap") ? 'selected' : '' }}@endif>Permanen</option>
                                                                <option @if(!empty($dataCustomer['personal']['address_status'])){{($dataCustomer['personal']['address_status'] == "sementara") ? 'selected' : '' }}@endif>Sementara</option>
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('address_status')) <p class="help-block">{{ $errors->first('address_status') }}</p> @endif
                                                    </div>
                                                    <div class="form-group email {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Email *:</label>
                                                        <div class="col-md-7">
                                                            <input type="email" class="form-control" value="{{$dataCustomer['personal']['email']}}" name="email" maxlength="30">
                                                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group mother_name {!! $errors->has('mother_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Nama Gadis Ibu Kandung *:</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" value="@if(!empty($dataCustomer['personal']['mother_name'])){{$dataCustomer['personal']['mother_name']}}@endif" name="mother_name" maxlength="50">
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
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group work_type {!! $errors->has('work_type') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Jenis Pekerjaan *:</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="work_type">
                                                                <option>-- Pilih --</option>
                                                                <option {{($dataCustomer['work']['type'] == "swasta") ? 'selected' : '' }}>Pegawai Swasta</option>
                                                                <option {{($dataCustomer['work']['type'] == "negeri") ? 'selected' : '' }}>Pegawai Negeri</option>
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('work_type')) <p class="help-block">{{ $errors->first('work_type') }}</p> @endif
                                                    </div>
                                                    <div class="form-group work {!! $errors->has('work') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Pekerjaan *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['work']}}" name="work" maxlength="50">
                                                            @if ($errors->has('work')) <p class="help-block">{{ $errors->first('work') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group company_name {!! $errors->has('company_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Nama Perusahaan *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['company_name']}}" name="company_name" maxlength="50">
                                                            @if ($errors->has('company_name')) <p class="help-block">{{ $errors->first('company_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group work_field {!! $errors->has('work_field') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Bidang Pekerjaan *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['work_field']}}" name="work_field" maxlength="50">
                                                            @if ($errors->has('work_field')) <p class="help-block">{{ $errors->first('work_field') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group position {!! $errors->has('position') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Jabatan *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['position']}}" name="position" maxlength="50">
                                                            @if ($errors->has('position')) <p class="help-block">{{ $errors->first('position') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group work_duration {!! $errors->has('work_duration') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Lama Kerja *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['work_duration']}}" name="work_duration" maxlength="2" >
                                                            @if ($errors->has('work_duration')) <p class="help-block">{{ $errors->first('work_duration') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group office_address {!! $errors->has('office_address') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Alamat Kantor *:</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" rows="3" name="office_address" maxlength="255">{{$dataCustomer['work']['office_address']}}</textarea>
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
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group salary {!! $errors->has('salary') ? 'has-error' : '' !!}">
                                                        <label title ="Take Home Pay Per Bulan" class="col-md-4 control-label">Gaji/Pendapatan *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" value="{{$dataCustomer['financial']['salary']}}" name="salary" maxlength="12">
                                                            @if ($errors->has('salary')) <p class="help-block">{{ $errors->first('salary') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group other_salary {!! $errors->has('other_salary') ? 'has-error' : '' !!}">
                                                        <label title ="Rata-Rata Per Bulan" class="col-md-4 control-label">Pendapatan Lain *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" value="{{$dataCustomer['financial']['other_salary']}}" name="other_salary" maxlength="12">
                                                            @if ($errors->has('other_salary')) <p class="help-block">{{ $errors->first('other_salary') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group loan_installment {!! $errors->has('loan_installment') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Angsuran Permohonan *:</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" value="{{$dataCustomer['financial']['loan_installment']}}" name="loan_installment" maxlength="12">
                                                            @if ($errors->has('loan_installment')) <p class="help-block">{{ $errors->first('loan_installment') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group dependent_amount {!! $errors->has('dependent_amount') ? 'has-error' : '' !!}">
                                                        <label title ="Anak Dalam Tanggungan" class="col-md-5 control-label">Jumlah Tanggungan *:</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" value="{{$dataCustomer['financial']['dependent_amount']}}" name="dependent_amount" maxlength="2">
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
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group phone {!! $errors->has('phone') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">No. Telepon *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" value="{{$dataCustomer['contact']['phone']}}" name="phone" maxlength="12">
                                                            @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group mobile_phone {!! $errors->has('mobile_phone') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">No. Handphone *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" value="{{$dataCustomer['contact']['mobile_phone']}}" name="mobile_phone" maxlength="12">
                                                            @if ($errors->has('mobile_phone')) <p class="help-block">{{ $errors->first('mobile_phone') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group emergency_contact {!! $errors->has('emergency_contact') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Emergency Contact *:</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" value="{{$dataCustomer['contact']['emergency_contact']}}" name="emergency_contact" maxlength="12">
                                                            @if ($errors->has('emergency_contact')) <p class="help-block">{{ $errors->first('emergency_contact') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group emergency_relation {!! $errors->has('emergency_relation') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Hubungan *:</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['contact']['emergency_relation']}}" name="emergency_relation" maxlength="50">
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
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group identity {!! $errors->has('identity') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Foto KTP *:</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="@if(!empty($dataCustomer['other']['identity'])){{$dataCustomer['other']['identity']}}@endif" name="identity">
                                                            @if ($errors->has('identity')) <p class="help-block">{{ $errors->first('identity') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group npwp {!! $errors->has('npwp') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Foto NPWP *:</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="@if(!empty($dataCustomer['other']['npwp'])){{$dataCustomer['other']['npwp']}}@endif" name="npwp">
                                                            @if ($errors->has('npwp')) <p class="help-block">{{ $errors->first('npwp') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group images {!! $errors->has('images') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Foto Nasabah *:</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="@if(!empty($dataCustomer['other']['image'])){{$dataCustomer['other']['image']}}@endif" name="images">
                                                            @if ($errors->has('images')) <p class="help-block">{{ $errors->first('images') }}</p> @endif
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
                                    <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Edit</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>


        <div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>Apakah Anda yakin ingin mengubah Nasabah "<b id="name"></b>" ?</p>
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

</script>