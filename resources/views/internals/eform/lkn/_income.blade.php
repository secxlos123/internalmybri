<div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group source {!! $errors->has('source') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Sumber *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="source" id="source">
                                                    <option disabled="">-- Pilih --</option>
                                                    <option selected="" value="fixed">Fixed Income</option>
                                                    <option value="nonfixed">Non Fixed Income</option>
                                                </select>
                                                @if ($errors->has('source')) <p class="help-block">{{ $errors->first('source') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group income {!! $errors->has('income') ? 'has-error' : '' !!}" id="nonfixed-income">
                                            <label class="col-md-4 control-label">Penghasilan per-Bulan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp" name="income" maxlength="24" value="{{ $eformData['customer']['financial']['salary'] }}">
                                                    <!-- <span class="input-group-addon">,00</span> -->
                                                    @if ($errors->has('income')) <p class="help-block">{{ $errors->first('income') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group income_salary {!! $errors->has('income_salary') ? 'has-error' : '' !!}" id="fixed-salary">
                                            <label class="col-md-4 control-label">Gaji / THP :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp" name="income_salary" maxlength="24" value="{{ $eformData['customer']['financial']['salary'] }}">
                                                    <!-- <span class="input-group-addon">,00</span> -->
                                                    @if ($errors->has('income_salary')) <p class="help-block">{{ $errors->first('income_salary') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group income_allowance {!! $errors->has('income_allowance') ? 'has-error' : '' !!}" id="fixed-allowance">
                                            <label class="col-md-4 control-label">Tunjangan / Insentif Lain :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp" name="income_allowance" maxlength="24" value="{{ $eformData['customer']['financial']['other_salary'] }}" readonly="">
                                                    @if ($errors->has('income_allowance')) <p class="help-block">{{ $errors->first('income_allowance') }}</p> @endif
                                                    <!-- <span class="input-group-addon">,00</span> -->
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <!-- <h3 class="header-title m-l-310 m-t-20">Sumber Data</h3>
                                        <div class="form-group bussiness_mutation_type {!! $errors->has('bussiness_mutation_type') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Mutasi Rekening :</label>
                                            <div class="col-md-3">
                                                <select class="form-control" name="business_mutation_type">
                                                    <option selected="" disabled="">-- Pilih Bank --</option>
                                                    <option value="bni">BNI</option>
                                                    <option value="mandiri">Bank Mandiri</option>
                                                </select>
                                                @if ($errors->has('bussiness_mutation_type')) <p class="help-block">{{ $errors->first('bussiness_mutation_type') }}</p> @endif
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control numericOnly" placeholder="No Rekening" name="bussiness_mutation_number" value="{{ old('bussiness_mutation_number') }}">
                                                @if ($errors->has('bussiness_mutation_number')) <p class="help-block">{{ $errors->first('bussiness_mutation_number') }}</p> @endif
                                            </div>

                                            <div class="col-md-1">
                                                <a href="javascript:void(0)" class="form-control btn btn-info" title="Tambah Rekening" id="add_account">+</a>
                                            </div>
                                        </div> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>