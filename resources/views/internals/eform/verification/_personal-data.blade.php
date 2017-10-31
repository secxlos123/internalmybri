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
                            <tr>
                                <td class="align-middle bg-primary">Alamat</td>
                                <td class="align-middle"><span id="addressDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['address']}}@endif</span></td>
                                <td class="align-middle" id="addressCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['address']}}@endif</td>
                                <td class="align-middle" id="addressKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['address']}}@endif</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="address">Sesuaikan</a>
                                </td>
                            </tr>
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
                <!--Bundle of text field data pribadi-->                             
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tempat Lahir * :</label>
                                <div class="col-md-9">
                                    {!! Form::select('birth_place_id', [$dataCustomer['customer']['birth_place_id'] => $dataCustomer['customer']['birth_place']], old('birth_place'), [
                                    'class' => 'select2 birth_place',
                                    'data-placeholder' => 'Pilih Kota Tempat Lahir',
                                    'readonly' => true,
                                    'id' => 'birth_place'
                                    ]) !!}
                                    @if ($errors->has('birth_place')) <p class="help-block">{{ $errors->first('birth_place') }}</p> @endif
                                </div>
                                <input type="hidden" id="new_birth_place" value="{{$dataCustomer['customer']['birth_place']}}">
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
                                <input type="hidden" id="new_city" value="{{$dataCustomer['customer']['city']}}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">KTP * :</label>
                                <div class="col-md-9">
                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="identity" id="identity" accept="image/png,image/jpeg,image/gif">
                                    @if ($errors->has('identity')) <p class="help-block">{{ $errors->first('identity') }}</p> @endif
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
                                    <select class="form-control gender" name="gender">
                                        <option disabled="" selected="">-- Pilih --</option>
                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['gender'] == 'Laki-laki') ? selected @endif @endif value="L">Laki-laki</option>
                                        <option @if(!empty($dataCustomer)) @if($dataCustomer['customer']['gender'] == 'Perempuan') ? selected @endif @endif value="P">Perempuan</option>
                                    </select>
                                    @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
                                </div>
                                <input type="hidden" id="new_gender" value="{{$dataCustomer['customer']['gender']}}">
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
                                <input type="hidden" id="new_status" value="{{$dataCustomer['customer']['status']}}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Status Tempat Tinggal * :</label>
                                <div class="col-md-7">
                                    <select class="form-control address_status" name="address_status">
                                        <option disabled="" selected="">-- Pilih --</option>
                                        <option @if($dataCustomer['customer']['address_status'] == '0') ? selected @endif value="0">Milik Sendiri</option>
                                        <option @if($dataCustomer['customer']['address_status'] == '1') ? selected @endif value="1">Milik Orang Tua/Mertua atau Rumah Dinas </option>
                                        <option @if($dataCustomer['customer']['address_status'] == '3') ? selected @endif value="3">Tinggal di Rumah Kontrakan</option>
                                    </select>
                                    @if ($errors->has('address_status')) <p class="help-block">{{ $errors->first('address_status') }}</p> @endif
                                </div>
                                <input type="hidden" id="new_address_status" value="{{$dataCustomer['customer']['address_status']}}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Kewarganegaraan * :</label>
                                <div class="col-md-7">
                                    {!! Form::select('citizenship_id', [$dataCustomer['customer']['citizenship_id'] => $dataCustomer['customer']['citizenship_name']], old('citizenship'), [
                                    'class' => 'select2 citizenship',
                                    'data-placeholder' => 'Pilih Kewarganegaraan',
                                    'readonly' => true
                                    ]) !!}
                                    @if ($errors->has('citizenship')) <p class="help-block">{{ $errors->first('citizenship') }}</p> @endif
                                </div>
                                <input type="hidden" name="citizenship_name" id="new_citizenship" value="{{$dataCustomer['customer']['citizenship_name']}}">
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
</div>