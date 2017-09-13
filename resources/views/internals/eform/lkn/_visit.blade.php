<div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group visitor_name {!! $errors->has('visitor_name') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Pejabat BRI yang mengunjungi *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="visitor_name" maxlength="50" value="{{ old('visitor_name') }}">
                                                @if ($errors->has('visitor_name')) <p class="help-block">{{ $errors->first('visitor_name') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group place {!! $errors->has('visitor_name') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Tempat Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" rows="3" name="place" maxlength="255">{{ old('place') }}</textarea>
                                                @if ($errors->has('place')) <p class="help-block">{{ $errors->first('place') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group date {!! $errors->has('date') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Tanggal Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="datepicker-autoclose" name="date" value="{{ old('date') }}">
                                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                                    @if ($errors->has('date')) <p class="help-block">{{ $errors->first('date') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group name {!! $errors->has('name') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Nama Calon Debitur/ Debitur *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="name" maxlength="50" value="{{ old('name') }}">
                                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group job {!! $errors->has('job') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Pekerjaan / Usaha *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="job" maxlength="50" value="{{ old('job') }}">
                                                @if ($errors->has('job')) <p class="help-block">{{ $errors->first('job') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group phone {!! $errors->has('phone') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">No Telp Kantor / Tempat Usaha *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="phone" maxlength="12" value="{{ old('phone') }}">
                                                @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group account {!! $errors->has('account') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">No Rekening Pinjaman / ID Aplikasi *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="account" maxlength="20" value="{{ old('account') }}">
                                                @if ($errors->has('account')) <p class="help-block">{{ $errors->first('account') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group amount {!! $errors->has('amount') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Jumlah Permohonan *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="amount" maxlength="12" value="{{ old('amount') }}">
                                                @if ($errors->has('amount')) <p class="help-block">{{ $errors->first('amount') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group type {!! $errors->has('type') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Jenis Pinjaman *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="type" maxlength="50" value="{{ old('type') }}">
                                                @if ($errors->has('type')) <p class="help-block">{{ $errors->first('type') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group purpose_of_visit {!! $errors->has('purpose_of_visit') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Tujuan Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="purpose_of_visit" title="Pilih Tujuan Kunjungan">
                                                    <option value="0" disabled="" selected="">Pilih Tujuan Kunjungan</option>
                                                    <option value="prakarsa">Prakarsa Kredit</option>
                                                    <option value="negosiasi">Negosiasi</option>
                                                    <option value="pembinaan">Pembinaan</option>
                                                    <option value="penagihan">Penagihan</option>
                                                    <option value="lain-lain">Lain-lain</option>

                                                </select>

                                                <div id="other-input" style="display: none;">
                                                    <input type="text" class="form-control">
                                                </div>
                                                @if ($errors->has('purpose_of_visit')) <p class="help-block">{{ $errors->first('purpose_of_visit') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group result {!! $errors->has('result') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Hasil Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="result" maxlength="50" value="{{ old('result') }}">
                                                @if ($errors->has('result')) <p class="help-block">{{ $errors->first('result') }}</p> @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>