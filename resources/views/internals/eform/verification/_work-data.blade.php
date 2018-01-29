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
                                <label class="col-md-3 control-label">Bidang Pekerjaan * :</label>
                                <div class="col-md-9">
                                @if ($type != 'preview')
                                    @if(isset($dataCustomer['customer']['job_field_id']))
                                        {!! Form::select('job_field_id', [$dataCustomer['customer']['job_field_id'] => $dataCustomer['customer']['job_field_name']], old('job_field_id'), [
                                        'class' => 'select2 work_field',
                                        'data-placeholder' => 'Pilih Bidang Pekerjaan'
                                        ]) !!}
                                    @else
                                        {!! Form::select('job_field_id', [old('job_field_id') => old('job_field_name')], old('job_field_id'), [
                                        'class' => 'select2 work_field',
                                        'data-placeholder' => 'Pilih Bidang Pekerjaan'
                                        ]) !!}
                                    @endif
                                @else
                                    <p>{{@$dataCustomer['customer']['job_field_name']}}</p>
                                @endif
                                    @if ($errors->has('work_field')) <p class="help-block">{{ $errors->first('work_field') }}</p> @endif
                                </div>

                                <input type="hidden" name="job_field_name" id="new_job_field" value="{{$dataCustomer['customer']['job_field_name']}}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Jenis Pekerjaan * :</label>
                                <div class="col-md-9">
                                @if ($type != 'preview')
                                    @if(isset($dataCustomer['customer']['job_type_id']))
                                        {!! Form::select('job_type_id', [$dataCustomer['customer']['job_type_id'] => $dataCustomer['customer']['job_type_name']], old('job_type_id'), [
                                        'class' => 'select2 work_type',
                                        'data-placeholder' => 'Pilih Jenis Pekerjaan',
                                        'readonly' => true
                                        ]) !!}
                                    @else
                                        {!! Form::select('job_type_id', [old('job_type_id') => old('job_type_name')], old('job_type_id'), [
                                        'class' => 'select2 work_type',
                                        'data-placeholder' => 'Pilih Jenis Pekerjaan',
                                        'readonly' => true
                                        ]) !!}
                                    @endif
                                @else
                                    <p>{{@$dataCustomer['customer']['job_type_name']}}</p>
                                @endif
                                    @if ($errors->has('work_type')) <p class="help-block">{{ $errors->first('work_type') }}</p> @endif
                                </div>
                                <input type="hidden" name="job_type_name" id="new_job_type" value="{{$dataCustomer['customer']['job_type_name']}}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Pekerjaan * :</label>
                                <div class="col-md-9">
                                @if ($type != 'preview')
                                    @if(isset($dataCustomer['customer']['job_type_id']))
                                        {!! Form::select('job_id', [$dataCustomer['customer']['job_id'] => $dataCustomer['customer']['job_name']], old('job_id'), [
                                        'class' => 'select2 work',
                                        'data-placeholder' => 'Pilih Pekerjaan',
                                        'readonly' => true
                                        ]) !!}
                                    @else
                                        {!! Form::select('job_id', [old('job_id') => old('job_name')], old('job_id'), [
                                        'class' => 'select2 work',
                                        'data-placeholder' => 'Pilih Pekerjaan',
                                        'readonly' => true
                                        ]) !!}
                                    @endif
                                @else
                                    <p>{{@$dataCustomer['customer']['job_name']}}</p>
                                @endif
                                    @if ($errors->has('work')) <p class="help-block">{{ $errors->first('work') }}</p> @endif
                                </div>
                                <input type="hidden" name="job_name" id="new_job" value="{{$dataCustomer['customer']['job_name']}}">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nama Perusahaan * :</label>
                                <div class="col-md-9">
                                @if ($type != 'preview')
                                    <input type="text" class="form-control" name="company_name" maxlength="50" value="{{(isset($dataCustomer['customer']['company_name']) ? $dataCustomer['customer']['company_name'] : old('company_name'))}}">
                                @else
                                    <p>{{@$dataCustomer['customer']['company_name']}}</p>
                                @endif
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
                                @if ($type != 'preview')
                                    @if(isset($dataCustomer['customer']['job_type_id']))
                                        {!! Form::select('position', [$dataCustomer['customer']['position'] => $dataCustomer['customer']['position_name']], old('position'), [
                                        'class' => 'select2 positions',
                                        'data-placeholder' => 'Pilih Posisi',
                                        'readonly' => true
                                        ]) !!}
                                    @else
                                        {!! Form::select('position', [old('position') => old('position_name')], old('position'), [
                                        'class' => 'select2 positions',
                                        'data-placeholder' => 'Pilih Posisi',
                                        'readonly' => true
                                        ]) !!}
                                    @endif
                                @else
                                    <p>{{@$dataCustomer['customer']['position_name']}}</p>
                                @endif
                                    @if ($errors->has('position')) <p class="help-block">{{ $errors->first('position') }}</p> @endif
                                </div>
                                <input type="hidden" name="position_name" id="new_position" value="{{$dataCustomer['customer']['position_name']}}">
                            </div>
                            <div class="form-group work_duration {!! $errors->has('work_duration') ? 'has-error' : '' !!}">
                                <label class="col-md-4 control-label">Lama Kerja * :</label>
                                <div class="col-md-8">
                                    <div class="col-md-4">
                                    @if ($type != 'preview')
                                        <input type="number" class="form-control" name="work_duration" maxlength="3" min="0" value="{{(isset($dataCustomer['customer']['work_duration']) ? $dataCustomer['customer']['work_duration'] : old('work_duration'))}}">
                                    @else
                                        <p>{{@$dataCustomer['customer']['work_duration']}}</p>
                                    @endif
                                    </div>
                                    <label class="col-md-2 control-label">Tahun</label>
                                    <div class="col-md-4">
                                    @if ($type != 'preview')
                                        <input type="text" class="form-control numericOnly" name="work_duration_month" id="work_duration_month" maxlength="2" value="{{(isset($dataCustomer['customer']['work_duration_month']) ? $dataCustomer['customer']['work_duration_month'] : old('work_duration_month'))}}">
                                    @else
                                        <p>{{@$dataCustomer['customer']['work_duration_month']}}</p>
                                    @endif
                                    </div>
                                    <label class="col-md-1 control-label">Bulan</label>
                                    @if ($errors->has('work_duration')) <p class="help-block">{{ $errors->first('work_duration') }}</p> @endif
                                </div>
                            </div>
                            <div class="form-group office_address {!! $errors->has('office_address') ? 'has-error' : '' !!}">
                                <label class="col-md-4 control-label">Alamat Kantor * :</label>
                                <div class="col-md-8">
                                @if ($type != 'preview')
                                    <textarea class="form-control" rows="3" name="office_address" maxlength="255">{{(isset($dataCustomer['customer']['office_address']) ? $dataCustomer['customer']['office_address'] : old('office_address'))}}</textarea>
                                @else
                                    <p>{{@$dataCustomer['customer']['office_address']}}</p>
                                @endif
                                    @if ($errors->has('office_address')) <p class="help-block">{{ $errors->first('office_address') }}</p> @endif
                                </div>
                            </div>
                             <div class="form-group zip_code_office {!! $errors->has('zip_code_office') ? 'has-error' : '' !!}">
                                <label class="col-md-4 control-label">Kode Pos Perusahaan * :</label>
                                <div class="col-md-3">
                                @if ($type != 'preview')
                                    <input type="text" class="form-control numericOnly" name="zip_code_office" maxlength="5" value="{{(isset($dataCustomer['customer']['zip_code_office']) ? $dataCustomer['customer']['zip_code_office'] : old('zip_code_office'))}}" id="zip_code_office">
                                    <span id="err-zco"></span>
                                @else
                                    <p>{{@$dataCustomer['customer']['zip_code_office']}}</p>
                                @endif
                                    @if ($errors->has('zip_code_office')) <p class="help-block">{{ $errors->first('zip_code_office') }}</p> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--End-->