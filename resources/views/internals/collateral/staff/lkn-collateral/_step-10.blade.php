<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 10 Paripasu</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Paripasu * :</label>
                            <div class="col-md-8">
                                {!! Form::select('ten[paripasu]', array("" => "", 
                                    "Ya" => "Ya", 
                                    "Tidak" => "Tidak"), 
                                    old('ten.paripasu'), [
                                    'class' => 'select2 paripasu ',
                                    'data-placeholder' => '-- Pilih --',
                                    'id'=>'paripasu_flag'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix" id="bank_paripasu" hidden="">
                            <label class="col-md-4 control-label">Nilai Paripasu Agunan Bank * :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon b-0">Rp</i></span>
                                    <input type="text" class="form-control currency-rp numericOnly" name="ten[paripasu_bank]" maxlength="50" value="{{old('ten.paripasu_bank')}}" id="paripasu_bank">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Flag Asuransi * :</label>
                            <div class="col-md-8">
                                {!! Form::select('ten[insurance]', array("" => "", 
                                    "Ya" => "Ya", 
                                    "Tidak" => "Tidak"), 
                                    old('ten.insurance'), [
                                    'class' => 'select2 insurance_flag ',
                                    'data-placeholder' => '-- Pilih --',
                                    'id'=>'asuransi_flag'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix" id="company_insurance" hidden="">
                        <label class="col-md-4 control-label">Nama Perusahaan Asuransi * :</label>
                        <div class="col-md-8">
                            {!! Form::select('ten[insurance_company]', ['' => ''], old('ten.insurance_company'), [
                                'class' => 'select2 insurance',
                                'data-placeholder' => 'Pilih Nama Perusahaan'
                            ]) !!}
                        </div>
                        <input type="hidden" name="ten[insurance_company_name]" id="insurance_company_name">
                    </div>
                    <div class="form-group clearfix" id="value_insurance" hidden="">
                        <label class="col-md-4 control-label">Nilai Asuransi * :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon b-0">Rp</i></span>
                                <input type="text" class="form-control currency-rp numericOnly" name="ten[insurance_value]" maxlength="50" value="{{old('ten.insurance_value')}}" id="insurance_value">
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Eligibility * :</label>
                        <div class="col-md-8">
                            {!! Form::select('ten[eligibility]', array("" => "", 
                                "Eligible" => "Eligible", 
                                "Not Eligible" => "Not Eligible"), 
                                old('ten.eligibility'), [
                                'class' => 'select2 eligibility ',
                                'data-placeholder' => '-- Pilih --'
                            ]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>