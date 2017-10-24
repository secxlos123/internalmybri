@section('title','My BRI - Form Verifikasi Data Nasabah')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Verifikasi Data Nasabah</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('indexAO')}}">Pengajuan</a>
                            </li>
                            <li class="active">
                                Verifikasi
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @if (\Session::has('success'))
                <div class="alert alert-success">{{ \Session::get('success') }}</div>
            @endif
                        
            <form @if(!empty($dataCustomer)) action="{{route('verifyData', $dataCustomer['customer']['id'])}}" @endif method="POST" enctype="multipart/form-data" id="form1">
                {{ csrf_field() }}
                {{ method_field('PUT') }} 
                <!--Bundle of data pribadi-->                             
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
                                    <table class="table table-bordered">
                                        <input type="hidden" name="form_id" value="{{$id}}">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="bg-inverse">Field</th>
                                                <th>Data Nasabah</th>
                                                <th>Data CIF</th>
                                                <th>Data Kemendagri</th>
                                                <th class="m-w-210">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Lengkap</td>
                                                <td class="align-middle"><span id="nameDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['name']}}@endif</span></td>
                                                <td class="align-middle" id="nameCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['name']}}@endif</td>
                                                <td class="align-middle" id="nameKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['name']}}@endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="name">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td class="align-middle bg-primary">Tanggal Lahir</td>
                                                <td class="align-middle"><span id="birth_dateDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['birth_date']}} @endif</span></td>
                                                <td class="align-middle" id="birth_dateCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['birth_date']}} @endif</td>
                                                <td class="align-middle" id="birth_dateKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['birth_date']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="birth_date">Sesuaikan</a>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="align-middle bg-primary">Alamat</td>
                                                <td class="align-middle"><span id="addressDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['address']}}@endif</span></td>
                                                <td class="align-middle" id="addressCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['address']}}@endif</td>
                                                <td class="align-middle" id="addressKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['address']}}@endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="address">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td class="align-middle bg-primary">Jenis Kelamin</td>
                                                <td class="align-middle"><span id="genderDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['gender']}} @endif</span></td>
                                                <td class="align-middle" id="genderCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['gender']}} @endif</td>
                                                <td class="align-middle" id="genderKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['gender']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="gender">Sesuaikan</a>
                                                </td>
                                            </tr> -->
                                         <!--    <tr>
                                                <td class="align-middle bg-primary">Status Tempat Tinggal</td>
                                                <td class="align-middle"><span id="address_statusDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['address_status']}} @endif</span></td>
                                                <td class="align-middle" id="address_statusCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['address_status']}} @endif</td>
                                                <td class="align-middle" id="address_statusKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['address_status']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="address_status">Sesuaikan</a>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="align-middle bg-primary">No. Telepon</td>
                                                <td class="align-middle"><span id="phoneDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['phone']}} @endif</span></td>
                                                <td class="align-middle" id="phoneCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['phone']}} @endif</td>
                                                <td class="align-middle" id="phoneKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['phone']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Handphone</td>
                                                <td class="align-middle"><span id="mobile_phoneDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['mobile_phone']}} @endif</span></td>
                                                <td class="align-middle" id="mobile_phoneCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['mobile_phone']}} @endif</td>
                                                <td class="align-middle" id="mobile_phoneKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['mobile_phone']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="mobile_phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Gadis Ibu Kandung</td>
                                                <td class="align-middle"><span id="mother_nameDF">@if(!empty($dataCustomer)){{$dataCustomer['customer']['mother_name']}} @endif</span></td>
                                                <td class="align-middle" id="mother_nameCIF">@if(!empty($dataCustomer)){{$dataCustomer['cif']['mother_name']}} @endif</td>
                                                <td class="align-middle" id="mother_nameKM">@if(!empty($dataCustomer)){{$dataCustomer['kemendagri']['mother_name']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="mother_name">Sesuaikan</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tempat Lahir * :</label>
                                                <div class="col-md-9">
                                                    {!! Form::select('birth_place_id', [$dataCustomer['customer']['birth_place_id'] => $dataCustomer['customer']['birth_place']], old('birth_place'), [
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
                                                        <input type="text" class="form-control datepicker-date" id="datepicker-date" name="birth_date" @if(!empty($dataCustomer)) value="{{ $dataCustomer['customer']['birth_date'] }}" @endif>
                                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                        @if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Kota * :</label>
                                                <div class="col-md-9">
                                                    {!! Form::select('city_id', [$dataCustomer['customer']['city_id'] => $dataCustomer['customer']['city']], old('city_id'), [
                                                        'class' => 'select2 cities',
                                                        'data-placeholder' => 'Pilih Kota Tempat Tinggal',
                                                        'readonly' => true
                                                    ]) !!}
                                                    @if ($errors->has('city_id')) <p class="help-block">{{ $errors->first('city_id') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">KTP * :</label>
                                                <div class="col-md-9">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="identity" id="identity" accept="image/png,image/jpeg,image/gif">
                                                    @if ($errors->has('couple_identity')) <p class="help-block">{{ $errors->first('couple_identity') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-9">
                                                    <img id="preview" src="{{$dataCustomer['customer']['identity']}}" width="300">
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Jenis Kelamin * :</label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="gender">
                                                        <option disabled="" selected="">-- Pilih --</option>
                                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['gender'] == 'Laki-laki') ? selected @endif @endif value="L">Laki-laki</option>
                                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['gender'] == 'Perempuan') ? selected @endif @endif value="P">Perempuan</option>
                                                    </select>
                                                    @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group status {!! $errors->has('status') ? 'has-error' : '' !!}">
                                                <label class="col-md-5 control-label">Status Pernikahan * :</label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="status" id="status">
                                                        <option disabled="" selected="">-- Pilih --</option>
                                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['status'] == 1) ? selected @endif @endif value="1">Belum Menikah</option>
                                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['status'] == 2) ? selected @endif @endif value="2">Menikah</option>
                                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['status'] == 3) ? selected @endif @endif value="3">Janda/Duda</option>
                                                    </select>
                                                    @if ($errors->has('status')) <p class="help-block">{{ $errors->first('status') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Status Tempat Tinggal * :</label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="address_status">
                                                        <option disabled="" selected="">-- Pilih --</option>
                                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['address_status'] == '0') ? selected @endif @endif value="0">Milik Sendiri</option>
                                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['address_status'] == '1') ? selected @endif @endif value="1">Milik Orang Tua/Mertua atau Rumah Dinas </option>
                                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['address_status'] == '3') ? selected @endif @endif value="3">Tinggal di Rumah Kontrakan</option>
                                                    </select>
                                                    @if ($errors->has('address_status')) <p class="help-block">{{ $errors->first('address_status') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Kewarganegaraan * :</label>
                                                <div class="col-md-7">
                                                    {!! Form::select('citizenship_id', [$dataCustomer['customer']['citizenship_id']['desc1'] => $dataCustomer['customer']['citizenship_id']['desc2']], old('citizenship'), [
                                                        'class' => 'select2 citizenship',
                                                        'data-placeholder' => 'Pilih Kewarganegaraan',
                                                        'readonly' => true
                                                    ]) !!}
                                                    @if ($errors->has('citizenship')) <p class="help-block">{{ $errors->first('citizenship') }}</p> @endif
                                                </div>
                                            </div>    
                                            <div class="form-group email {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                <label class="col-md-5 control-label">Email * :</label>
                                                <div class="col-md-7">
                                                    <input type="email" class="form-control" name="email"  maxlength="50" readonly="" value="{{$dataCustomer['customer']['email']}}">
                                                    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                </div>
                                            </div>  
                                        </div>                                      
                                    </div>
                            </div>
                        </div>
                    </div>
                </div> <!--End--> 
                <!--Field texts of data pribadi-->  
                <div class="row">
                    <input type="hidden" name="full_name"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['name']}}" @endif id="name">
                    <!-- <input type="hidden" name="birth_place_id"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['birth_place_id']}}" @endif id="birth_place_id"> -->
                    <!-- <input type="hidden" name="birth_date"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['birth_date']}}" @endif id="birth_date"> -->
                    <input type="hidden" name="address"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['address']}}" @endif id="address">
                    <!-- <input type="hidden" name="gender"  @if(!empty($dataCustomer)) value="@if($dataCustomer['customer']['gender'] == 'Laki-laki')L @else P @endif" @endif id="gender"> -->
                    <!-- <input type="hidden" name="address_status"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['address_status']}}" @endif id="address_status"> -->
                    <input type="hidden" name="mother_name"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['mother_name']}}" @endif id="mother_name">
                    <input type="hidden" name="phone"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['phone']}}" @endif id="phone">
                    <input type="hidden" name="mobile_phone"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['mobile_phone']}}" @endif id="mobile_phone">
                </div><!--End -->
                <!--Bundle of data pasangan--> 
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
                                            <div class="form-group couple_nik ">
                                                <label class="col-md-3 control-label">NIK Pasangan * :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control numericOnly" name="couple_nik" id="couple_nik" value="{{ old('couple_nik') }}" maxlength="16">
                                                    @if ($errors->has('couple_nik')) <p class="help-block">{{ $errors->first('couple_nik') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="col-md-3 control-label">Nama Lengkap * :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="couple_name" id="couple_name" value="{{ old('couple_name') }}" maxlength="50">
                                                     @if ($errors->has('couple_name')) <p class="help-block">{{ $errors->first('couple_name') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group couple_identity {!! $errors->has('couple_identity') ? 'has-error' : '' !!}">
                                                <label class="col-md-3 control-label">KTP Pasangan * :</label>
                                                <div class="col-md-9">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="identity" id="couple_identity" accept="image/png,image/jpeg,image/gif">
                                                    @if ($errors->has('couple_identity')) <p class="help-block">{{ $errors->first('couple_identity') }}</p> @endif
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-9">
                                                    <img id="couple_preview" src="{{asset('assets/images/no-image.jpg')}}" alt="KTP Pasangan" width="300">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="form-group couple_birth_place_id {!! $errors->has('couple_birth_place_id') ? 'has-error' : '' !!}">
                                                <label class="col-md-5 control-label">Tempat Lahir * :</label>
                                                <div class="col-md-7">
                                                    {!! Form::select('couple_birth_place_id', ['' => ''], old('couple_birth_place_id'), [
                                                        'class' => 'select2 birth_place',
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
                                                        <input type="text" class="form-control datepicker-date" name="couple_birth_date" value="{{ old('couple_birth_date') }}">
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
                </div><!--End--> 
                <!--Bundle of data pekerjaan--> 
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
                                                    {!! Form::select('job_field_id', [$dataCustomer['customer']['job_field_id']['desc1'] => $dataCustomer['customer']['job_field_id']['desc2']], old('work_field'), [
                                                        'class' => 'select2 work_field',
                                                        'data-placeholder' => 'Pilih Bidang Pekerjaan'
                                                    ]) !!}
                                                    @if ($errors->has('work_field')) <p class="help-block">{{ $errors->first('work_field') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Jenis Pekerjaan * :</label>
                                                <div class="col-md-8">
                                                    {!! Form::select('job_type_id', [$dataCustomer['customer']['job_type_id']['desc1'] => $dataCustomer['customer']['job_type_id']['desc2']], old('work_type'), [
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
                                                    {!! Form::select('job_id', [$dataCustomer['customer']['job_id']['desc1'] => $dataCustomer['customer']['job_id']['desc2']], old('work'), [
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
                                                    <input type="text" class="form-control" name="company_name" maxlength="50" value="{{$dataCustomer['customer']['company_name']}}">
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
                                                        <input type="number" class="form-control" name="work_duration" maxlength="3" min="0" value="{{$dataCustomer['customer']['work_duration']}}">
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
                                                    <textarea class="form-control" rows="3" name="office_address" maxlength="255">{{$dataCustomer['customer']['office_address']}}</textarea>
                                                    @if ($errors->has('office_address')) <p class="help-block">{{ $errors->first('office_address') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End--> 
                <!--Bundle of data finansial--> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Keuangan</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="card-box m-t-30">                                    
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Nasabah</h4>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group salary {!! $errors->has('salary') ? 'has-error' : '' !!}">
                                                            <label class="col-md-4 control-label">Gaji/Pendapatan * :</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">Rp</span>
                                                                    <input type="text" class="form-control numericOnly currency-rp" name="salary" maxlength="24" value="{{$dataCustomer['customer']['salary']}}">
                                                                    @if ($errors->has('salary')) <p class="help-block">{{ $errors->first('salary') }}</p> @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group salary {!! $errors->has('salary') ? 'has-error' : '' !!}">
                                                            <label class="col-md-4 control-label">Pendapatan Lain * :</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">Rp</span>
                                                                    <input type="text" class="form-control numericOnly currency-rp" name="other_salary" maxlength="24" value="{{$dataCustomer['customer']['other_salary']}}">
                                                                    @if ($errors->has('salary')) <p class="help-block">{{ $errors->first('salary') }}</p> @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                       <!--  <div class="form-group npwp {!! $errors->has('npwp') ? 'has-error' : '' !!}">
                                                            <label class="col-md-4 control-label">Foto NPWP * :</label>
                                                            <div class="col-md-8">
                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="npwp" accept="image/png,image/jpeg,image/gif">
                                                                @if ($errors->has('npwp')) <p class="help-block">{{ $errors->first('npwp') }}</p> @endif
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group loan_installment {!! $errors->has('loan_installment') ? 'has-error' : '' !!}">
                                                            <label class="col-md-5 control-label">Angsuran Pinjaman * :</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">Rp</span>
                                                                    <input type="text" class="form-control numericOnly currency-rp" name="loan_installment" maxlength="24" value="{{$dataCustomer['customer']['loan_installment']}}">
                                                                    @if ($errors->has('loan_installment')) <p class="help-block">{{ $errors->first('loan_installment') }}</p> @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group dependent_amount {!! $errors->has('dependent_amount') ? 'has-error' : '' !!}">
                                                            <label class="col-md-5 control-label">Jumlah Tanggungan * :</label>
                                                            <div class="col-md-7">
                                                                <input type="text" class="form-control numericOnly" name="dependent_amount" maxlength="2" value="{{$dataCustomer['customer']['dependent_amount']}}">
                                                                @if ($errors->has('dependent_amount')) <p class="help-block">{{ $errors->first('dependent_amount') }}</p> @endif
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-md-7" id="join_income">
                                <div class="checkbox checkbox-single checkbox-primary">
                                    <input type="checkbox" name="join_income" @if(!empty($dataCustomer)) @if(!empty($dataCustomer['customer']['couple_nik'])) ? checked="" @endif @endif value="join_income" id="join_check">
                                    <label class="header-title custom-title-2"><b>  Joint Income</b></label>
                                </div>
                            </div>

                            <!--Pasangan-->
                            <div class="col-md-12" id="couple_financial">
                                <div class="card-box m-t-30">                                    
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Pasangan</h4>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Gaji/Pendapatan * :</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">Rp</span>
                                                                    <input type="text" class="form-control numericOnly currency-rp" name="couple_salary" maxlength="24" value="{{$dataCustomer['customer']['couple_salary']}}">
                                                                    @if ($errors->has('couple_salary')) <p class="help-block">{{ $errors->first('couple_salary') }}</p> @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Pendapatan Lain * :</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">Rp</span>
                                                                    <input type="text" class="form-control numericOnly currency-rp" name="couple_other_salary" maxlength="24" value="{{$dataCustomer['customer']['couple_other_salary']}}">
                                                                    @if ($errors->has('couple_other_salary')) <p class="help-block">{{ $errors->first('couple_other_salary') }}</p> @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group ">
                                                            <label class="col-md-5 control-label">Angsuran Pinjaman * :</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">Rp</span>
                                                                    <input type="text" class="form-control numericOnly currency-rp" name="couple_loan_installment" maxlength="24" value="{{$dataCustomer['customer']['couple_loan_installment']}}">
                                                                    @if ($errors->has('couple_loan_installment')) <p class="help-block">{{ $errors->first('couple_loan_installment') }}</p> @endif
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
                    </div>
                </div><!--End--> 
                
                <!--Bundle of data Emergency contact--> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Keluarga/Kerabat Terdekat</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="form-group ">
                                                <label class="col-md-4 control-label">Nama * :</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="emergency_name" value="{{$dataCustomer['customer']['emergency_name']}}" maxlength="50">
                                                    @if ($errors->has('emergency_name')) <p class="help-block">{{ $errors->first('emergency_name') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">No. Handphone * :</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control numericOnly" name="emergency_mobile_phone" value="{{$dataCustomer['customer']['emergency_contact']}}" maxlength="16">
                                                    @if ($errors->has('emergency_mobile_phone')) <p class="help-block">{{ $errors->first('emergency_mobile_phone') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Hubungan * :</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="emergency_relation" maxlength="50" value="{{$dataCustomer['customer']['emergency_relation']}}">
                                                    @if ($errors->has('emergency_relation')) <p class="help-block">{{ $errors->first('emergency_relation') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End--> 
                <!--Action button-->
                <div class="row" @if(!empty($dataCustomer))  @if($dataCustomer['customer']['is_completed'] == false) hidden="" @endif @endif>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" href="javascript:void(0);" id="save" class="btn btn-default waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Kirim Verifikasi Data</button>
                        </div>
                    </div>
                </div><!--End--> 
            </form>
        </div>
    </div>
</div>

<!-- Modals update -->
<div id="update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <h3>Pilih Data</h3>
                    <div class="col-md-12 text-center">
                        <select class="form-control" name="data-source" id="data-source">
                            <option selected="" disabled="">-- Pilih --</option>
                            <option value="cif">Data CIF</option>
                            <option value="kemendagri">Data Kemendagri</option>
                        </select>
                        <input type="hidden" id="field">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0);" class="btn btn-default waves-effect" data-dismiss="modal">Batal</a>
                <a href="javascript:void(0);" id="btnSave" class="btn btn-success waves-effect waves-light">Simpan</a>
            </div>
        </div>
    </div>
</div><!--End--> 
@include('internals.layouts.footer')
@include('internals.layouts.foot') 
@include('internals.eform.verification_script')
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

       $('#join_check').on('change', function() {
            if(this.checked){
                console.log('true');
                $('#couple_financial').show();
            }else{
                $('#couple_financial').hide();
            }
       });

       // console.log($('#status').val());
       if($('#status').val() == 2){
            $('#marrital_certificate').show();
            $('#couple_data').show();
            $('#join_income').show();
        }else if($('#status').val()== 3){
            $('#separate_certificate').show();
            $('#couple_data').hide();
            $('#join_income').hide();
            $('#couple_financial').hide();
        }else{
            hideCouple();
        }
   });

    function hideCouple(){
        $('#couple_data').hide();
        $('#separate_certificate').hide();
        $('#marrital_certificate').hide();
        $('#join_income').hide();
        $('#couple_financial').hide();

    }
    hideCouple();

    $('#status').on('change', function() {
        if(this.value==2){
            $('#marrital_certificate').show();
            $('#couple_data').show();
            $('#join_income').show();
        }else if(this.value==3){
            $('#separate_certificate').show();
            $('#couple_data').hide();
            $('#join_income').hide();
        }else{
            hideCouple();
        }
    })

    $('.datepicker-date').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        autoclose: true,
        endDate: new Date(),
        todayHighlight: true
    });
    $('.datepicker-date').datepicker("setDate",  "{{date('Y-m-d', strtotime('-20 years'))}}");

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


    function readURLCouple(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#couple_preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#couple_identity").change(function(){
        readURLCouple(this);
    });

    $("#identity").change(function(){
        readURL(this);
    });

</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Customer\CompleteCustomer', '#form1'); !!}