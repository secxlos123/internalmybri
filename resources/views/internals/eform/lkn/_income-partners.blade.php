<div class="panel-body">
    <div class="row">
        <div class="col-md-9">
            <div class="form-horizontal" role="form">
                <!-- <div class="form-group separated_property_status {!! $errors->has('separated_property_status') ? 'has-error' : '' !!}">
                    <label class="col-md-4 control-label">Status Pisah Harta *:</label>
                    <div class="col-md-8">
                        <select class="form-control" name="separated_property_status" id="separated_property_status">
                            <option selected="" disabled="">-- Pilih --</option>
                            <option value="separatedproperty">Pisah Harta</option>
                            <option value="nonseparatedproperty">Gabung Harta</option>
                        </select>
                        @if ($errors->has('separated_property_status')) <p class="help-block">{{ $errors->first('separated_property_status') }}</p> @endif
                    </div>
                </div> -->
                <div class="form-group source_income {!! $errors->has('source_income') ? 'has-error' : '' !!}">
                    <label class="col-md-4 control-label">Sumber *:</label>
                    <div class="col-md-8">
                        <!-- <select class="form-control" name="source_income" id="source_income">
                            <option selected="" disabled="">-- Pilih --</option>
                            <option value="single">Single Income</option>
                            <option value="nonsingle">Join Income</option>
                        </select>
                        @if ($errors->has('source_income')) <p class="help-block">{{ $errors->first('source_income') }}</p> @endif -->
                        <div class="input-group">
                            <!-- <span class="input-group-addon">Rp</span> -->
                            <input type="text" class="form-control" name="source_income" maxlength="24" value="Joint Income" readonly="">
                            <!-- <span class="input-group-addon">,00</span> -->
                            @if ($errors->has('income_partner')) <p class="help-block">{{ $errors->first('income_partner') }}</p> @endif
                        </div>
                    </div>
                </div>
                <div class="form-group income_partner {!! $errors->has('income_partner') ? 'has-error' : '' !!}" id="income_partner">
                    <label class="col-md-4 control-label">Penghasilan per-Bulan *:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" class="form-control numericOnly currency-rp" name="income_partner" maxlength="24" value="" readonly="">
                            <!-- <span class="input-group-addon">,00</span> -->
                            @if ($errors->has('income_partner')) <p class="help-block">{{ $errors->first('income_partner') }}</p> @endif
                        </div>
                    </div>
                </div>
                <div class="form-group income_other {!! $errors->has('income_other') ? 'has-error' : '' !!}" id="income_other">
                    <label class="col-md-4 control-label">Tunjangan / Insentif Lain :</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" class="form-control numericOnly currency-rp" name="income_other" maxlength="24" value="" readonly="">
                            @if ($errors->has('income_other')) <p class="help-block">{{ $errors->first('income_other') }}</p> @endif
                            <!-- <span class="input-group-addon">,00</span> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>