@section('title','MyBRI - Lengkapi Data Profil Calon Debitur')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
        <form action="{{route('postVerification', ['eform_id' => $eform_id, 'customer_id' => $customer_id ])}}" method="POST" enctype="multipart/form-data" id="form1">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Lengkapi Data Profil Calon Debitur</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('customers.index')}}">Profil Calon Debitur</a>
                                        </li>
                                        <li class="active">
                                            Lengkapi Data Profil Calon Debitur
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

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" >
                                                    <div class="form-group nik {!! $errors->has('nik') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">NIK * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control numericOnly" name="nik" id="nik" @if(!empty($dataCustomer)) value="{{ $dataCustomer['personal']['nik'] }}" @endif maxlength="16">
                                                            @if ($errors->has('nik')) <p class="help-block">{{ $errors->first('nik') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group full_name {!! $errors->has('full_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Nama Lengkap * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="full_name" id="full_name" @if(!empty($dataCustomer)) value="{{ $dataCustomer['personal']['name'] }}" @endif maxlength="50">
                                                             @if ($errors->has('full_name')) <p class="help-block">{{ $errors->first('full_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Tempat Lahir * :</label>
                                                        <div class="col-md-9">
                                                            {!! Form::select('birth_place_id', ['' => ''], old('birth_place'), [
                                                                'class' => 'select2 birth_place',
                                                                'data-placeholder' => 'Pilih Kota Tempat Lahir',
                                                                'readonly' => true
                                                            ]) !!}
                                                            @if ($errors->has('birth_place')) <p class="help-block">{{ $errors->first('birth_place') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group birth_date {!! $errors->has('birth_date') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tanggal Lahir * :</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="datepicker-date" name="birth_date" @if(!empty($dataCustomer)) value="{{ $dataCustomer['personal']['birth_date'] }}" @endif>
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                                @if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group address {!! $errors->has('address') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Alamat * :</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" name="address" maxlength="255">@if(!empty($dataCustomer)) {{ $dataCustomer['personal']['address'] }} @endif</textarea>
                                                            @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group city {!! $errors->has('city') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Kota * :</label>
                                                        <div class="col-md-9">
                                                            {!! Form::select('city_id', ['' => ''], old('cities'), [
                                                                'class' => 'select2 cities',
                                                                'data-placeholder' => 'Pilih Kota',
                                                                'readonly' => true
                                                            ]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group gender {!! $errors->has('gender') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Jenis Kelamin * :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="gender">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                            @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Kewarganegaraan * :</label>
                                                        <div class="col-md-7">
                                                            {!! Form::select('citizenship_id', ['' => ''], old('citizenship'), [
                                                                'class' => 'select2 citizenship',
                                                                'data-placeholder' => 'Pilih Kewarganegaraan',
                                                                'readonly' => true
                                                            ]) !!}
                                                            @if ($errors->has('citizenship')) <p class="help-block">{{ $errors->first('citizenship') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group status {!! $errors->has('status') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Status Pernikahan * :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="status" id="status">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option value="0">Tidak Menikah</option>
                                                                <option value="1">Menikah</option>
                                                                <option value="2">Janda/Duda</option>
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
                                                            <input type="email" class="form-control" name="email" @if(!empty($dataCustomer)) value="{{$dataCustomer['personal']['email']}}" @endif maxlength="50" readonly="">
                                                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group mother_name {!! $errors->has('mother_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Nama Gadis Ibu Kandung * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="mother_name" @if(!empty($dataCustomer)) value="{{$dataCustomer['personal']['mother_name']}}" @endif maxlength="50">
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

                        <div class="row" id="couple_data">
                            <div class="col-md-12">
                                @if (\Session::has('error'))
                                 <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data Pasangan</h3>
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" >
                                                    <div class="form-group couple_nik {!! $errors->has('couple_nik') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">couple_nik * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control numericOnly" name="couple_nik" id="couple_nik" value="{{ old('couple_nik') }}" maxlength="16">
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
                                                   <!--  <div class="form-group couple_identity {!! $errors->has('couple_identity') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">KTP Pasangan * :</label>
                                                        <div class="col-md-9">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="identity" accept="image/png,image/jpeg,image/gif">
                                                            @if ($errors->has('couple_identity')) <p class="help-block">{{ $errors->first('couple_identity') }}</p> @endif
                                                        </div>
                                                    </div> -->

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group couple_birth_place_id {!! $errors->has('couple_birth_place_id') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Tempat Lahir * :</label>
                                                        <div class="col-md-7">
                                                            {!! Form::select('couple_birth_place_id', ['' => ''], old('couple_birth_place_id'), [
                                                                'class' => 'select2 couple_birth_place',
                                                                'data-placeholder' => 'Pilih Kota Tempat Lahir',
                                                                'readonly' => true
                                                            ]) !!}
                                                            @if ($errors->has('couple_birth_place')) <p class="help-block">{{ $errors->first('couple_birth_place') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group couple_birth_date {!! $errors->has('couple_birth_date') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Tanggal Lahir * :</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="datepicker-autoclose" name="couple_birth_date" value="{{ old('couple_birth_date') }}">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                                @if ($errors->has('couple_birth_date')) <p class="help-block">{{ $errors->first('couple_birth_date') }}</p> @endif
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
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Bidang Pekerjaan * :</label>
                                                        <div class="col-md-8">
                                                            {!! Form::select('job_field_id', ['' => ''], old('work_field'), [
                                                                'class' => 'select2 work_field',
                                                                'data-placeholder' => 'Pilih Bidang Pekerjaan',
                                                                'readonly' => true
                                                            ]) !!}
                                                            @if ($errors->has('work_field')) <p class="help-block">{{ $errors->first('work_field') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Pekerjaan * :</label>
                                                        <div class="col-md-8">
                                                            {!! Form::select('job_type_id', ['' => ''], old('work_type'), [
                                                                'class' => 'select2 work_type',
                                                                'data-placeholder' => 'Pilih Jenis Pekerjaan',
                                                                'readonly' => true
                                                            ]) !!}
                                                            @if ($errors->has('work_type')) <p class="help-block">{{ $errors->first('work_type') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pekerjaan * :</label>
                                                        <div class="col-md-8">
                                                            {!! Form::select('job_id', ['' => ''], old('work'), [
                                                                'class' => 'select2 work',
                                                                'data-placeholder' => 'Pilih Pekerjaan',
                                                                'readonly' => true
                                                            ]) !!}
                                                            @if ($errors->has('work')) <p class="help-block">{{ $errors->first('work') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Perusahaan * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="company_name" @if(!empty($dataCustomer)) value="{{$dataCustomer['work']['company_name']}}" @endif maxlength="50">
                                                            @if ($errors->has('company_name')) <p class="help-block">{{ $errors->first('company_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jabatan * :</label>
                                                        <div class="col-md-8">
                                                            {!! Form::select('position', ['' => ''], old('positions'), [
                                                                'class' => 'select2 positions',
                                                                'data-placeholder' => 'Pilih Posisi',
                                                                'readonly' => true
                                                            ]) !!}
                                                            @if ($errors->has('position')) <p class="help-block">{{ $errors->first('position') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group work_duration {!! $errors->has('work_duration') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Lama Kerja * :</label>
                                                        <div class="col-md-8">
                                                            <div class="col-md-4">
                                                                <input type="number" class="form-control" name="work_duration" maxlength="3" min="0" @if(!empty($dataCustomer)) value="{{$dataCustomer['work']['work_duration']}}" @endif>
                                                            </div>
                                                                <label class="col-md-2 control-label">Tahun</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control numericOnly" name="work_duration" maxlength="2" value="0">
                                                            </div>
                                                                <label class="col-md-1 control-label">Bulan</label>
                                                            @if ($errors->has('work_duration')) <p class="help-block">{{ $errors->first('work_duration') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group office_address {!! $errors->has('office_address') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Alamat Kantor * :</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" rows="3" name="office_address" maxlength="255">@if(!empty($dataCustomer)) {{$dataCustomer['work']['office_address']}} @endif</textarea>
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
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span>
                                                                <input type="text" class="form-control numericOnly currency-rp" name="salary" maxlength="24" @if(!empty($dataCustomer)) value="{{$dataCustomer['financial']['salary']}}" @endif>
                                                                @if ($errors->has('salary')) <p class="help-block">{{ $errors->first('salary') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group salary {!! $errors->has('salary') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Pendapatan Lain * :</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span>
                                                                <input type="text" class="form-control numericOnly currency-rp" name="other_salary" maxlength="24" @if(!empty($dataCustomer)) value="{{$dataCustomer['financial']['other_salary']}}" @endif>
                                                                @if ($errors->has('salary')) <p class="help-block">{{ $errors->first('salary') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group npwp {!! $errors->has('npwp') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Foto NPWP * :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="npwp" accept="image/png,image/jpeg,image/gif">
                                                            @if ($errors->has('npwp')) <p class="help-block">{{ $errors->first('npwp') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal">
                                                    <div class="form-group loan_installment {!! $errors->has('loan_installment') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Angsuran Permohonan * :</label>
                                                        <div class="col-md-7">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">Rp</span>
                                                                <input type="text" class="form-control numericOnly currency-rp" name="loan_installment" maxlength="24" @if(!empty($dataCustomer)) value="{{$dataCustomer['financial']['loan_installment']}}" @endif >
                                                                @if ($errors->has('loan_installment')) <p class="help-block">{{ $errors->first('loan_installment') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group dependent_amount {!! $errors->has('dependent_amount') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Jumlah Tanggungan * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" name="dependent_amount" maxlength="2" @if(!empty($dataCustomer)) value="{{$dataCustomer['financial']['dependent_amount']}}" @endif>
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
                                                            <input type="text" class="form-control numericOnly" name="phone" @if(!empty($dataCustomer)) value="{{$dataCustomer['contact']['phone']}}" @endif maxlength="12">
                                                            @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group mobile_phone {!! $errors->has('mobile_phone') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">No. Handphone * :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" name="mobile_phone" @if(!empty($dataCustomer)) value="{{$dataCustomer['contact']['mobile_phone']}}" @endif maxlength="12">
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
                                                            <input type="text" class="form-control numericOnly" name="emergency_contact" @if(!empty($dataCustomer)) value="{{$dataCustomer['contact']['emergency_contact']}}" @endif maxlength="12">
                                                            @if ($errors->has('emergency_contact')) <p class="help-block">{{ $errors->first('emergency_contact') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group emergency_relation {!! $errors->has('emergency_relation') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Hubungan * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="emergency_relation" @if(!empty($dataCustomer)) value="{{$dataCustomer['contact']['emergency_relation']}}" @endif>
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
                                            <div class="col-md-8">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Slip Gaji / Dokumen Legal Usaha / Izin Praktek *:</label>
                                                        <div class="col-md-6">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="salary_slip">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Bank Statement :</label>
                                                        <div class="col-md-6">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="bank_statement">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Kartu Keluarga :</label>
                                                        <div class="col-md-6">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="family_card">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="marrital_certificate">
                                                        <label class="col-md-6 control-label">Akta Nikah/Akta Cerai :</label>
                                                        <div class="col-md-6">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="marrital_certificate">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label class="col-md-6 control-label">Dokumen Legal Usaha / Izin Praktek :</label>
                                                        <div class="col-md-6">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group" id="separate_certificate">
                                                        <label class="col-md-6 control-label">Akta Pisah Harta :</label>
                                                        <div class="col-md-6">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="diforce_certificate">
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
                                    <!-- <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Simpan</a> -->
                                    <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

                 <!-- Modals Save -->
       <!--  <div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>Apakah Anda yakin ingin menambah Profil Calon Debitur "<b id="name"></b>" ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <button type="button" id="btnSave" class="btn btn-orange waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div> -->
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
        $('#separate_certificate').hide();
        $('#marrital_certificate').hide();

    }
    hideCouple();

    $('#status').on('change', function() {
        if(this.value==1){
            $('#marrital_certificate').show();
            $('#couple_data').show();
        }else if(this.value==2){
            $('#separate_certificate').show();
            $('#couple_data').hide();
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

    $('.birth_place').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/birth_place',
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

    $('.work').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/jobs',
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
                    results: data.jobs.data,
                    pagination: {
                        more: (params.page * data.jobs.per_page) < data.jobs.total
                    }
                };
            },
            cache: true
        },
    });

    $('.work_type').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/job_types',
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
                    results: data.job_types.data,
                    pagination: {
                        more: (params.page * data.job_types.per_page) < data.job_types.total
                    }
                };
            },
            cache: true
        },
    });

    $('.work_field').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/job_fields',
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
                    results: data.job_fields.data,
                    pagination: {
                        more: (params.page * data.job_fields.per_page) < data.job_fields.total
                    }
                };
            },
            cache: true
        },
    });

    $('.positions').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/positions',
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
                    results: data.positions.data,
                    pagination: {
                        more: (params.page * data.positions.per_page) < data.positions.total
                    }
                };
            },
            cache: true
        },
    });

    $('.citizenship').select2({
        witdh : '100%',
        allowClear: true,
        ajax: {
            url: '/dropdown/citizenship',
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
                    results: data.citizenship.data,
                    pagination: {
                        more: (params.page * data.citizenship.per_page) < data.citizenship.total
                    }
                };
            },
            cache: true
        },
    });

</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Customer\CompleteCustomer', '#form1'); !!}