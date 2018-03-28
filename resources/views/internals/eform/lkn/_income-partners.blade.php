<div class="panel-body">
    <div class="row">
        <div class="col-md-9">
            <div class="form-horizontal" role="form">

                <div class="form-group source_income {!! $errors->has('source_income') ? 'has-error' : '' !!}">
                    <label class="col-md-4 control-label">Sumber *:</label>
                    <div class="col-md-8">
                        <select class="form-control" name="source_income" id="source_income">
                            <option selected="" disabled="">-- Pilih --</option>
                            <option value="single" {{ $eformData['customer']['financial']['status_finance'] != 'Joint Income' || $eformData['customer']['personal']['status_id'] != 2 ? 'selected' : '' }}>Single Income</option>
                            <option value="joint" {{ $eformData['customer']['financial']['status_finance'] == 'Joint Income' && $eformData['customer']['personal']['status_id'] == 2 ? 'selected' : '' }}>Joint Income</option>
                        </select>
                        @if ($errors->has('source_income')) <p class="help-block">{{ $errors->first('source_income') }}</p> @endif
                    </div>
                </div>
                <div class="form-group" id="income_partner" style="{{ $eformData['customer']['financial']['status_finance'] == 'Joint Income' && $eformData['customer']['personal']['status_id'] == 2 ? '' : "display: none;" }}">
                    <label class="col-md-4 control-label">Penghasilan per-Bulan *:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" class="form-control numericOnly currency-rp" name="couple_salary" maxlength="16" value="{{$eformData['customer']['financial']['salary_couple']}}">
                            @if ($errors->has('couple_salary')) <p class="help-block">{{ $errors->first('couple_salary') }}</p> @endif
                        </div>
                    </div>
                </div>
                <div class="form-group" id="income_other" style="{{ $eformData['customer']['financial']['status_finance'] == 'Joint Income' && $eformData['customer']['personal']['status_id'] == 2 ? '' : "display: none;" }}">
                    <label class="col-md-4 control-label">Tunjangan / Insentif Lain :</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" class="form-control numericOnly currency-rp" name="couple_other_salary" maxlength="16" value="{{$eformData['customer']['financial']['other_salary_couple']}}">
                            @if ($errors->has('couple_other_salary')) <p class="help-block">{{ $errors->first('couple_other_salary') }}</p> @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>