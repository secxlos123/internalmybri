<div class="row" id="couple_data">
    <div class="col-md-12">
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
                                @if ($type != 'preview')
                                    <input type="text" class="form-control numericOnly" name="couple_nik" id="couple_nik" @if(!empty($dataCustomer['customer']['couple_nik']))value="{{$dataCustomer['customer']['couple_nik']}}" @else value="{{ old('couple_nik') }}" @endif maxlength="16">
                                @else
                                    <p>{{@$dataCustomer['customer']['couple_nik']}}</p>
                                @endif
                                    @if ($errors->has('couple_nik')) <p class="help-block">{{ $errors->first('couple_nik') }}</p> @endif
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-3 control-label">Nama Lengkap * :</label>
                                <div class="col-md-9">
                                @if ($type != 'preview')
                                    <input type="text" class="form-control" name="couple_name" id="couple_name" @if(!empty($dataCustomer['customer']['couple_name'])) value="{{$dataCustomer['customer']['couple_name']}}" @else value="{{ old('couple_name') }}" @endif maxlength="50">
                                @else
                                    <p>{{@$dataCustomer['customer']['couple_name']}}</p>
                                @endif
                                    @if ($errors->has('couple_name')) <p class="help-block">{{ $errors->first('couple_name') }}</p> @endif
                                </div>
                            </div>
                            @if ($type != 'preview')
                            <div class="form-group couple_identity {!! $errors->has('couple_identity') ? 'has-error' : '' !!}">
                                <label class="col-md-3 control-label">KTP Pasangan * :</label>
                                <div class="col-md-9">
                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="couple_identity" id="couple_identity" accept="image/png,image/jpeg,image/gif">
                                    @if ($errors->has('couple_identity')) <p class="help-block">{{ $errors->first('couple_identity') }}</p> @endif
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <img id="couple_preview" @if(!empty($dataCustomer['customer']['couple_identity'])) src="{{$dataCustomer['customer']['couple_identity']}}" @else src="{{ old('couple_identity') }}" @endif alt="KTP Pasangan" width="300">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-horizontal">
                            <div class="form-group couple_birth_place_id {!! $errors->has('couple_birth_place_id') ? 'has-error' : '' !!}">
                                <label class="col-md-5 control-label">Tempat Lahir * :</label>
                                <div class="col-md-7">
                                @if ($type != 'preview')
                                    {!! Form::select('couple_birth_place_id', [$dataCustomer['customer']['couple_birth_place_id'] => $dataCustomer['customer']['couple_birth_place']], old('couple_birth_place_id'), [
                                    'class' => 'select2 birth_place',
                                    'data-placeholder' => 'Pilih Kota Tempat Lahir',
                                    'readonly' => true,
                                    'id' => 'couple_birth_place'
                                    ]) !!}
                                @else
                                    <p>{{@$dataCustomer['customer']['couple_birth_place']}}</p>
                                @endif
                                    @if ($errors->has('couple_birth_place')) <p class="help-block">{{ $errors->first('couple_birth_place') }}</p> @endif
                                </div>
                                <input type="hidden" id="new_couple_birth_date" value="{{$dataCustomer['customer']['couple_birth_place']}}">
                            </div>
                            <div class="form-group couple_birth_date {!! $errors->has('couple_birth_date') ? 'has-error' : '' !!}">
                                <label class="col-md-5 control-label">Tanggal Lahir * :</label>
                                <div class="col-md-7">
                                    <div class="input-group">
                                    @if ($type != 'preview')
                                        <input type="text" class="form-control datepicker-date" name="couple_birth_date" @if(!empty($dataCustomer['customer']['couple_birth_date'])) value="{{$dataCustomer['customer']['couple_birth_date']}}" @else value="{{ old('couple_birth_date') }}" @endif>
                                    @else
                                        <p>{{@$dataCustomer['customer']['couple_birth_date']}}</p>
                                    @endif
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