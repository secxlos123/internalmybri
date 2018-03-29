<div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
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
                                        <div class="form-group" id="nonfixed-income">
                                            <label class="col-md-4 control-label">Penghasilan per-Bulan * :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp" name="income" maxlength="16" value="{{ $eformData['customer']['financial']['salary'] }}">
                                                    @if ($errors->has('income')) <p class="help-block">{{ $errors->first('income') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="fixed-salary">
                                            <label class="col-md-4 control-label">Gaji / THP per-Bulan * :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp" name="income_salary" maxlength="16" value="{{ $eformData['customer']['financial']['salary'] }}">
                                                    @if ($errors->has('income_salary')) <p class="help-block">{{ $errors->first('income_salary') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="fixed-allowance">
                                            <label class="col-md-4 control-label">Tunjangan / Insentif Lain :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp" name="income_allowance" maxlength="16" value="{{ $eformData['customer']['financial']['other_salary'] }}" >
                                                    @if ($errors->has('income_allowance')) <p class="help-block">{{ $errors->first('income_allowance') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>