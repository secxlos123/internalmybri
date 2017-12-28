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
                                    old('ten[paripasu]'), [
                                    'class' => 'select2 paripasu ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Nilai Paripasu Agunan Bank * :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="ten[paripasu_bank]" maxlength="50" value="{{old('ten[paripasu_bank]')}}" id="paripasu_bank">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Flag Asuransi * :</label>
                            <div class="col-md-8">
                                {!! Form::select('ten[insurance]', array("" => "", 
                                    "Ya" => "Ya", 
                                    "Tidak" => "Tidak"), 
                                    old('ten[insurance]'), [
                                    'class' => 'select2 insurance ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Nama Perusahaan Asuransi * :</label>
                        <div class="col-md-8">
                            {!! Form::select('ten[insurance_company]', array("" => "", 
                                "Menggunakan Servis CLAS" => "Menggunakan Servis CLAS", 
                                "Untuk Listing Data" => "Untuk Listing Data"), 
                                old('ten[insurance_company]'), [
                                'class' => 'select2 insurance_company ',
                                'data-placeholder' => '-- Pilih --'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Nilai Asuransi * :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ten[insurance_value]" maxlength="50" value="{{old('ten[insurance_value]')}}" id="insurance_value">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Eligibility * :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                {!! Form::select('ten[eligibility]', array("" => "", 
                                    "Eligible" => "Eligible", 
                                    "Not Eligible" => "Not Eligible"), 
                                    old('ten[eligibility]'), [
                                    'class' => 'select2 eligibility ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>