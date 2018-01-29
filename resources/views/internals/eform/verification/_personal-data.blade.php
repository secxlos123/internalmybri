<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Data Pribadi</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table table-bordered">
                        <input type="hidden" name="eform_id" value="{{$id}}">
                        <thead class="bg-primary">
                            <tr>
                                <th class="bg-inverse">Field</th>
                                <th>Data Nasabah</th>
                                <th>Data CIF {{$dataCustomer['cif']['cif_number']}}</th>
                                <th>Data Kemendagri</th>
                                @if ($type != 'preview')
                                <th class="m-w-210">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php ( $arrayField = array("name" => "Nama Lengkap", "address" => "Alamat", "phone" => "No. Telepon", "mobile_phone" => "No. Handphone", "mother_name" => "Nama Gadis Ibu Kandung") )

                            @foreach ($arrayField as $field => $label)
                                <tr>
                                    <td class="align-middle bg-primary">{{ $label }}</td>
                                    <td class="align-middle" id="{{ $field }}DF">{{ !empty($dataCustomer) ? $dataCustomer['customer'][$field] : (in_array(array('phone', 'mobile_phone'), $field) ? 0 : '' ) }}</td>
                                    <td class="align-middle" id="{{ $field }}CIF">{{ !empty($dataCustomer) ? $dataCustomer['cif'][$field] : (in_array(array('phone', 'mobile_phone'), $field) ? 0 : '' ) }}</td>
                                    <td class="align-middle" id="{{ $field }}KM">{{ !empty($dataCustomer) ? $dataCustomer['kemendagri'][$field] : (in_array(array('phone', 'mobile_phone'), $field) ? 0 : '' ) }}</td>
                                    @if ($type != 'preview')
                                    <td>
                                        <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="{{ $field }}">Sesuaikan</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--Bundle of text field data pribadi-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-horizontal">
                            <input type="hidden" name="cif_number" value="{{ $dataCustomer['cif']['cif_number'] }}">

                            <div class="form-group">
                                <label class="col-md-3 control-label">NIK * :</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        @if ($type != 'preview')
                                        <input type="text" class="form-control" name="nik" value="{{ $dataCustomer['customer']['nik'] }}" maxlength="16" readonly>
                                        <span class="input-group-addon b-0" style="padding: 1px 1px;background-color: #eee0;">
                                            <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect change-nik" style="outline: none !important;box-sizing: border-box;border: 3px;border: 3px solid #ff9800 !important;">Ubah</a>
                                        </span>

                                        @else
                                            <p>{{@$dataCustomer['customer']['nik']}}</p>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Tempat Lahir * :</label>
                                <div class="col-md-9">
                                    @if ($type != 'preview')
                                        {!! Form::select('birth_place_id', [$dataCustomer['customer']['birth_place_id'] => $dataCustomer['customer']['birth_place']], old('birth_place'), [
                                            'class' => 'select2 birth_place',
                                            'data-placeholder' => 'Pilih Kota Tempat Lahir',
                                            'readonly' => true,
                                            'id' => 'birth_place'
                                        ]) !!}
                                    @else
                                        <p>{{@$dataCustomer['customer']['birth_place']}}</p>
                                    @endif

                                    @if ($errors->has('birth_place'))
                                        <p class="help-block">{{ $errors->first('birth_place') }}</p>
                                    @endif
                                </div>
                                <input type="hidden" id="new_birth_place" value="{{ $dataCustomer['customer']['birth_place'] }}">
                            </div>

                            <div class="form-group birth_date {!! $errors->has('birth_date') ? 'has-error' : '' !!}">
                                <label class="col-md-3 control-label">Tanggal Lahir * :</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                    @if ($type != 'preview')
                                        <input type="text" class="form-control datepicker-date" id="datepicker-date" name="birth_date" @if(!empty($dataCustomer)) value="{{ $dataCustomer['customer']['birth_date'] }}" @endif>
                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                    @else
                                        <p>{{ @$dataCustomer['customer']['birth_date'] }}</p>
                                    @endif

                                        @if ($errors->has('birth_date'))
                                            <p class="help-block">{{ $errors->first('birth_date') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Kota sesuai KTP * :</label>
                                <div class="col-md-9">
                                @if ($type != 'preview')
                                    {!! Form::select('city_id', [$dataCustomer['customer']['city_id'] => $dataCustomer['customer']['city']], old('city_id'), [
                                        'class' => 'select2 cities',
                                        'data-placeholder' => 'Pilih Kota Tempat Tinggal',
                                        'readonly' => true
                                    ]) !!}
                                @else
                                    <p>{{$dataCustomer['customer']['city']}}</p>
                                @endif

                                    @if ($errors->has('city_id'))
                                        <p class="help-block">{{ $errors->first('city_id') }}</p>
                                    @endif
                                </div>
                                <input type="hidden" id="new_city" value="{{ $dataCustomer['customer']['city'] }}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Kode Pos KTP * :</label>
                                <div class="col-md-3">
                                @if ($type != 'preview')
                                    <input type="text" class="form-control numericOnly" name="zip_code" maxlength="5" value="{{(isset($dataCustomer['customer']['zip_code']) ? $dataCustomer['customer']['zip_code'] : old('zip_code'))}}" id="zip_code">
                                    <span id="err-zc"></span>
                                @else
                                    <p>{{@$dataCustomer['customer']['zip_code']}}</p>
                                @endif
                                    @if ($errors->has('zip_code')) <p class="help-block">{{ $errors->first('zip_code') }}</p> @endif
                                </div>
                            </div>

                            @if ($type != 'preview')
                            <div class="form-group">
                                <label class="col-md-3 control-label">KTP * :</label>
                                <div class="col-md-9">
                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="identity" id="identity" accept="image/png,image/jpeg,image/gif">

                                    @if ($errors->has('identity'))
                                        <p class="help-block">{{ $errors->first('identity') }}</p>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    @if((pathinfo(strtolower($dataCustomer['customer']['identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['customer']['identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['customer']['identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                                        @if(strpos($dataCustomer['customer']['identity'], 'noimage.jpg'))
                                        <p style="margin-left:25px">Foto KTP Kosong</p>
                                        @else
                                        <img id="preview" src="@if(!empty($dataCustomer['customer']['identity'])){{$dataCustomer['customer']['identity']}}@endif" width="300">
                                        <p style="margin-left:25px">Foto KTP</p>
                                        @endif
                                    @else
                                        <a href="@if(!empty($dataCustomer['customer']['identity'])){{$dataCustomer['customer']['identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                        <p style="margin-left:25px">Klik Untuk Lihat Foto KTP</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Jenis Kelamin * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    {!! Form::select('gender', array("" => "", "L" => "Laki-laki", "P" => "Perempuan"), !empty($dataCustomer) ? substr($dataCustomer['customer']['gender'], 0, 1) : old('gender'), [
                                        'class' => 'select2 gender ',
                                        'data-placeholder' => 'Pilih Jenis Kelamin',
                                        'data-bri' => ''
                                    ]) !!}
                                @else
                                    <p>{{ isset($dataCustomer['customer']['gender']) ? $dataCustomer['customer']['gender'] : ''}}</p>
                                @endif

                                    @if ($errors->has('gender'))
                                        <p class="help-block">{{ $errors->first('gender') }}</p>
                                    @endif
                                </div>
                                <input type="hidden" id="new_gender" value="{{ $dataCustomer['customer']['gender'] }}">
                            </div>

                            <div class="form-group status {!! $errors->has('status') ? 'has-error' : '' !!}">
                                <label class="col-md-4 control-label">Status Pernikahan * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    {!! Form::select('status', array("" => "", "1" => "Belum Menikah", "2" => "Menikah", "3" => "Janda / Duda"), !empty($dataCustomer) ? $dataCustomer['customer']['status'] : old('status'), [
                                        'class' => 'select2 status ',
                                        'id' => 'status',
                                        'data-placeholder' => 'Pilih Status Pernikahan',
                                        'data-bri' => ''
                                    ]) !!}
                                @else
                                    <p>@if($dataCustomer['customer']['status'] == 1) Belum Menikah
                                        @elseif($dataCustomer['customer']['status'] == 2)Menikah
                                        @elseif($dataCustomer['customer']['status'] == 3)Janda / Duda
                                        @endif</p>
                                        <input type="hidden" id="status" value="{{$dataCustomer['customer']['status']}}">
                                @endif

                                    @if ($errors->has('status'))
                                        <p class="help-block">{{ $errors->first('status') }}</p>
                                    @endif
                                </div>
                                <input type="hidden" id="new_status" value="{{ $dataCustomer['customer']['status'] }}">
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Status Tempat Tinggal * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    {!! Form::select('address_status', array("" => "", "0" => "Milik Sendiri", "1" => "Orang Tua / Mertua / Rumah Dinas", "3" => "Rumah Kontrakan"), !empty($dataCustomer) ? $dataCustomer['customer']['address_status'] : old('address_status'), [
                                        'class' => 'select2 address_status ',
                                        'data-placeholder' => 'Pilih Status Tempat Tinggal',
                                        'data-bri' => ''
                                    ]) !!}
                                @else
                                    <p>@if($dataCustomer['customer']['address_status'] == 0) Milik Sendiri
                                        @elseif($dataCustomer['customer']['address_status'] == 1)Orang Tua / Mertua / Rumah Dinas
                                        @elseif($dataCustomer['customer']['address_status'] == 3)Rumah Kontrakan
                                        @endif</p>
                                @endif

                                    @if ($errors->has('address_status'))
                                        <p class="help-block">{{ $errors->first('address_status') }}</p>
                                    @endif
                                </div>
                                <input type="hidden" id="new_address_status" value="{{$dataCustomer['customer']['address_status']}}">
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Kewarganegaraan * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    {!! Form::select('citizenship_id', [$dataCustomer['customer']['citizenship_id'] => $dataCustomer['customer']['citizenship_name']], old('citizenship'), [
                                        'class' => 'select2 citizenship',
                                        'data-placeholder' => 'Pilih Kewarganegaraan',
                                        'readonly' => true
                                    ]) !!}
                                @else
                                    <p>{{ @$dataCustomer['customer']['citizenship_name']}}</p>
                                @endif
                                    @if ($errors->has('citizenship'))
                                        <p class="help-block">{{ $errors->first('citizenship') }}</p>
                                    @endif
                                </div>
                                <input type="hidden" name="citizenship_name" id="new_citizenship" value="{{ $dataCustomer['customer']['citizenship_name'] }}">
                            </div>

                            <div class="form-group email {!! $errors->has('email') ? 'has-error' : '' !!}">
                                <label class="col-md-4 control-label">Email * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    <input type="email" class="form-control" name="email"  maxlength="50" readonly="" value="{{ $dataCustomer['customer']['email'] }}">
                                @else
                                    <p>{{ @$dataCustomer['customer']['email']}}</p>
                                @endif
                                    @if ($errors->has('email'))
                                        <p class="help-block">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>

                            @if ($type != 'preview')
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <div class="checkbox checkbox-single checkbox-primary">
                                        <input type="checkbox" id="myCheckBox" {{ ($dataCustomer['customer']['current_address'] == $dataCustomer['customer']['address']) ? "checked" : "" }}>
                                        <label class="header-title custom-title-2" for="myCheckBox">Alamat Domisili Sesuai Dengan Alamat KTP</label>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group current_address {!! $errors->has('current_address') ? 'has-error' : '' !!}">
                                <label class="col-md-4 control-label">Alamat Domisili * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    <textarea type="current_address" class="form-control" name="current_address" value="{{ $dataCustomer['customer']['current_address'] }}" {{ ($dataCustomer['customer']['current_address'] == $dataCustomer['customer']['address']) ? "readonly" : "" }}>{{ $dataCustomer['customer']['current_address'] }}</textarea>
                                @else
                                    <p>{{@$dataCustomer['customer']['current_address']}}</p>
                                @endif
                                    @if ($errors->has('current_address'))
                                        <p class="help-block">{{ $errors->first('current_address') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Kode Pos Domisili * :</label>
                                <div class="col-md-3">
                                @if ($type != 'preview')
                                    <input type="text" class="form-control numericOnly" name="zip_code_current" maxlength="5" value="{{(isset($dataCustomer['customer']['zip_code_current']) ? $dataCustomer['customer']['zip_code_current'] : old('zip_code_current'))}}" id="zip_code_current">
                                    <span id="err-zcd"></span>
                                @else
                                    <p>{{@$dataCustomer['customer']['zip_code_current']}}</p>
                                @endif
                                    @if ($errors->has('zip_code_current')) <p class="help-block">{{ $errors->first('zip_code_current') }}</p> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--End-->
</div>