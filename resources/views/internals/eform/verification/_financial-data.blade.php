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
                                    <div class="form-group">
                                        <label title ="Take Home Pay Per Bulan" class="col-md-3 control-label">Gaji/Pendapatan Per bulan * :</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                            @if ($type != 'preview')
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" class="form-control numericOnly currency-rp" name="salary" maxlength="16" value="{{(isset($dataCustomer['customer']['salary']) ? $dataCustomer['customer']['salary'] : old('salary'))}}">
                                                @if ($errors->has('salary')) <p class="help-block">{{ $errors->first('salary') }}</p> @endif
                                            @else
                                                <p>Rp {{ number_format($dataCustomer['customer']['salary'], 2, ",", ".") }}</p>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label title ="Rata-Rata Per Bulan" class="col-md-3 control-label">Pendapatan Lain :</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                            @if ($type != 'preview')
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" class="form-control numericOnly currency-rp" name="other_salary" maxlength="16" value="{{(isset($dataCustomer['customer']['other_salary']) ? $dataCustomer['customer']['other_salary'] : old('other_salary'))}}">
                                                @if ($errors->has('salary')) <p class="help-block">{{ $errors->first('salary') }}</p> @endif
                                            @else
                                                <p>Rp {{ number_format($dataCustomer['customer']['other_salary'], 2, ",", ".") }}</p>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Angsuran Pinjaman Berjalan * :</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                            @if ($type != 'preview')
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" class="form-control numericOnly currency-rp" name="loan_installment" maxlength="16" value="{{(isset($dataCustomer['customer']['loan_installment']) ? $dataCustomer['customer']['loan_installment'] : old('loan_installment'))}}">
                                            @else
                                                <p>Rp {{ number_format($dataCustomer['customer']['loan_installment'], 2, ",", ".")}}</p>
                                            @endif
                                                @if ($errors->has('loan_installment')) <p class="help-block">{{ $errors->first('loan_installment') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label title ="Anak Dalam Tanggungan" class="col-md-4 control-label">Jumlah Tanggungan :</label>
                                        <div class="col-md-8">
                                        @if ($type != 'preview')
                                            <input type="text" class="form-control numericOnly" name="dependent_amount" maxlength="2" value="{{(isset($dataCustomer['customer']['dependent_amount']) ? $dataCustomer['customer']['dependent_amount'] : old('dependent_amount'))}}">
                                        @else
                                            <p>{{@$dataCustomer['customer']['dependent_amount']}}</p>
                                        @endif
                                            @if ($errors->has('dependent_amount')) <p class="help-block">{{ $errors->first('dependent_amount') }}</p> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 source" id="join_income">
                @if ($type != 'preview')
                    <div class="checkbox checkbox-single checkbox-primary">
                        <input type="checkbox" {{ !empty($dataCustomer) ? ($dataCustomer['customer']['source_income'] == 'joint' ? 'checked' : '' ) : '' }} value="join_income" id="join_check">
                        <label class="header-title custom-title-2" for="join_check">
                            <b>  Joint Income</b>
                        </label>
                        <input type="hidden" name="source_income" id="join_val" value="{{ !empty($dataCustomer) ? $dataCustomer['customer']['source_income'] : 'single' }}">
                    @else
                    <div>
                        <label class="header-title custom-title-2" for="join_check">
                            <b>
                                <i class="fa fa{{ $dataCustomer['customer']['source_income'] == 'joint' ? '-check' : ''  }}-square"></i> Joint Income
                            </b>
                        </label>
                    @endif
                </div>
            </div>

            <!--Pasangan-->
            <div class="col-md-12" id="couple_financial" style="display: {{ !empty($dataCustomer) ? ($dataCustomer['customer']['source_income'] == 'joint' ? 'block' : 'none' ) : 'none' }}">
                <div class="card-box m-t-30">
                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Pasangan</h4>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label title ="Take Home Pay Per Bulan" class="col-md-4 control-label">Gaji/Pendapatan * :</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                            @if ($type != 'preview')
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" class="form-control numericOnly currency-rp" name="couple_salary" maxlength="16" @if(!empty($dataCustomer['customer']['couple_salary'])) value="{{$dataCustomer['customer']['couple_salary']}}" @else value="{{ old('couple_salary') }}" @endif>
                                            @else
                                                <p>Rp {{@number_format($dataCustomer['customer']['couple_salary'], 2, ",", ".")}}</p>
                                            @endif
                                                @if ($errors->has('couple_salary')) <p class="help-block">{{ $errors->first('couple_salary') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label title ="Rata-Rata Per Bulan" class="col-md-4 control-label">Pendapatan Lain :</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                            @if ($type != 'preview')
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" class="form-control numericOnly currency-rp" name="couple_other_salary" maxlength="16" @if(!empty($dataCustomer['customer']['couple_other_salary'])) value="{{$dataCustomer['customer']['couple_other_salary']}}" @else value="{{ old('couple_other_salary') }}" @endif>
                                            @else
                                                <p>Rp {{@number_format($dataCustomer['customer']['couple_other_salary'], 2, ",", ".")}}</p>
                                            @endif
                                                @if ($errors->has('couple_other_salary')) <p class="help-block">{{ $errors->first('couple_other_salary') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-horizontal">
                                    <div class="form-group ">
                                        <label class="col-md-4 control-label">Angsuran Permohonan :</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                            @if ($type != 'preview')
                                                <span class="input-group-addon">Rp</span>
                                                <input type="text" class="form-control numericOnly currency-rp" name="couple_loan_installment" maxlength="16" @if(!empty($dataCustomer['customer']['couple_loan_installment'])) value="{{$dataCustomer['customer']['couple_loan_installment']}}" @else value="{{ old('couple_loan_installment') }}" @endif>
                                            @else
                                                <p>Rp {{@number_format($dataCustomer['customer']['couple_loan_installment'], 2, ",", ".")}}</p>
                                            @endif
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