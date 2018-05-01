<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 8 Nilai Likuiditas saat Realisasi</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Nilai Likuiditas saat Realisasi * :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon b-0">Rp</i></span>
                                    <input type="text" class="form-control numericOnly currency-rp" name="eight[liquidation_realization]" maxlength="50" value="{{ $collateral['ots_eight']['liquidation_realization'] ? $collateral['ots_eight']['liquidation_realization'] : old('eight.liquidation_realization')}}" id="liquidation_realization">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Nilai Pasar Wajar * :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon b-0">Rp</i></span>
                                    <input type="text" class="form-control numericOnly currency-rp" name="eight[fair_market]" maxlength="50" value="{{ $collateral['ots_eight']['fair_market'] ? $collateral['ots_eight']['fair_market'] : old('eight.fair_market')}}" id="fair_market">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Nilai Likuidasi * :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon b-0">Rp</i></span>
                                    <input type="text" class="form-control numericOnly currency-rp" name="eight[liquidation]" maxlength="50" value="{{ $collateral['ots_eight']['liquidation'] ? $collateral['ots_eight']['liquidation'] : old('eight.liquidation')}}" id="liquidation">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Proyeksi Nilai Pasar Wajar * :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon b-0">Rp</i></span>
                                    <input type="text" class="form-control numericOnly currency-rp" name="eight[fair_market_projection]" maxlength="50" value="{{ $collateral['ots_eight']['fair_market_projection'] ? $collateral['ots_eight']['fair_market_projection'] : old('eight.fair_market_projection')}}" id="fair_market_projection">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Proyeksi Nilai Likuidasi * :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon b-0">Rp</i></span>
                                    <input type="text" class="form-control numericOnly currency-rp" name="eight[liquidation_projection]" maxlength="50" value="{{ $collateral['ots_eight']['liquidation_projection'] ? $collateral['ots_eight']['liquidation_projection'] : old('eight.liquidation_projection')}}" id="liquidation_projection">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Nilai Jual Objek Pajak (NJOP) * :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon b-0">Rp</i></span>
                                    <input type="text" class="form-control numericOnly currency-rp" name="eight[njop]" maxlength="50" value="{{ $collateral['ots_eight']['njop'] ? $collateral['ots_eight']['njop'] : old('eight.njop')}}" id="njop">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Penilaian Dilakukan Oleh * :</label>
                            <div class="col-md-8">
                                {!! Form::select('eight[appraisal_by]', array($collateral['ots_eight']['appraisal_by'] ? $collateral['ots_eight']['appraisal_by'] : "" => $collateral['ots_eight']['appraisal_by'] ? $collateral['ots_eight']['appraisal_by'] : "", 
                                    "bank" => "Bank", 
                                    "independent" => "Lembaga Penilai"), 
                                    old('eight.appraisal_by'), [
                                    'class' => 'select2 appraisal_by ',
                                    'data-placeholder' => '-- Pilih --',
                                    'id' => 'appraisal_by'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix" id="independent" hidden="">
                            <label class="col-md-4 control-label">Penilai Independent * :</label>
                            <div class="col-md-8">
                                {!! Form::select('eight[independent_appraiser]', [$collateral['ots_eight']['independent_appraiser'] ? $collateral['ots_eight']['independent_appraiser'] : '' => $collateral['ots_eight']['independent_appraiser_name'] ? $collateral['ots_eight']['independent_appraiser_name'] : ''], old('eight.independent_appraiser'), [
                                    'class' => 'select2 appraiser',
                                    'data-placeholder' => 'Pilih Nama Penilai'
                                ]) !!}
                            </div>
                            <input type="hidden" name="eight[independent_appraiser_name]" value="{{ $collateral['ots_eight']['independent_appraiser_name'] ? $collateral['ots_eight']['independent_appraiser_name'] : old(eight.independent_appraiser_name) }}" id="independent_appraiser_name">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Tanggal Penilaian Terakhir * :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="eight[date_assessment]" value="{{ $collateral['ots_eight']['date_assessment'] ? $collateral['ots_eight']['date_assessment'] : old('eight.date_assessment')}}" id="date_assessment">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Jenis Pengikatan * :</label>
                        <div class="col-md-8">
                            {!! Form::select('eight[type_binding]', array($collateral['ots_eight']['type_binding'] ? $collateral['ots_eight']['type_binding'] : "" => $collateral['ots_eight']['type_binding'] ? $collateral['ots_eight']['type_binding'] : "", 
                                "01" => "Hak Tanggungan", 
                                "02" => "Gadai",
                                "03" => "Feduciare Elgendom Overdracht",
                                "04" => "SKMHT (Surat Kuasa Memberikan Hak Tanggungan)",
                                "05" => "Cessie",
                                "06" => "Belum Diikat",
                                "09" => "Lain-lain",
                                "10" => "Fidusia Dengan UU",
                                "11" => "Fidusia Dengan PJ.08"), 
                                old('eight.type_binding'), [
                                'class' => 'select2 type_binding ',
                                'data-placeholder' => '-- Pilih --'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">No. Bukti Pengikatan * :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control numericOnly" name="eight[binding_number]" value="{{ $collateral['ots_eight']['binding_number'] ? $collateral['ots_eight']['binding_number'] : old('eight.binding_number')}}" id="binding_number" maxlength="50" placeholder="No. Bukti Pengikatan">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Nilai Pengikatan * :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon b-0">Rp</i></span>
                                <input type="text" class="form-control numericOnly currency-rp" name="eight[binding_value]" maxlength="50" value="{{ $collateral['ots_eight']['binding_value'] ? $collateral['ots_eight']['binding_value'] : old('eight.binding_value')}}" id="binding_value" placeholder="Nilai Pengikatan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>