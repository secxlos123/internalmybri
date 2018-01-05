<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 2 Identifikasi Tanah Berdasarkan Surat Tanah</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Jenis Surat Tanah * :</label>
                            <div class="col-md-8">
                                {!! Form::select('letter[type]', array("" => "", 
                                    "Sertifikat" => "Sertifikat", 
                                    "SKPT" => "SKPT", 
                                    "Model A" => "Model A",
                                    "Petok D" => "Petok D", 
                                    "Surat Sewa" => "Surat Sewa"), 
                                    old('letter[type]'), [
                                    'class' => 'select2 letter_type',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Hak Atas Tanah * :</label>
                            <div class="col-md-8">
                                {!! Form::select('letter[authorization_land]', array("" => "", 
                                    "Sertifikat Hak Milik" => "Sertifikat Hak Milik", 
                                    "Sertifikat Hak Guna Bangunan" => "Sertifikat Hak Guna Bangunan", 
                                    "Sertifikat Hak Guna Usaha" => "Sertifikat Hak Guna Usaha",
                                    "Sertifikat Hak Pakai" => "Sertifikat Hak Pakai"), 
                                    old('letter[authorization_land]'), [
                                    'class' => 'select2 letter_authorization',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecocokan Data Dengan Kantor Anggaran/BPN * :</label>
                            <div class="col-md-8">
                                {!! Form::select('letter[match_bpn]', array("" => "", 
                                    "Cocok" => "Cocok", 
                                    "Tidak" => "Tidak"), 
                                    old('letter[match_bpn]'), [
                                    'class' => 'select2 letter_match_bpn ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecocokan Pemeriksaan Lokasi Tanah Dilapangan * :</label>
                            <div class="col-md-8">
                                {!! Form::select('letter[match_area]', array("" => "", 
                                    "Cocok" => "Cocok", 
                                    "Tidak" => "Tidak"), 
                                    old('letter[match_area]'), [
                                    'class' => 'select2 letter_match_area ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecocokan Batas Tanah Dilapangan * :</label>
                            <div class="col-md-8">
                                {!! Form::select('letter[match_limit_in_area]', array("" => "", 
                                    "Cocok" => "Cocok", 
                                    "Tidak" => "Tidak"), 
                                    old('letter[match_limit_in_area]'), [
                                    'class' => 'select2 letter_match_limit_in_area ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Luas Tanah Berdasarkan Surat Tanah * :</label>
                            <div class="col-md-8">
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" class="form-control numericOnly" name="letter[surface_area_by_letter]" maxlength="5" value="{{old('letter[surface_area_by_letter]')}}" id="surface_area_by_letter">
                                    <span class="input-group-addon has-ket-input">M<sup>2</sup></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">No Surat Tanah * :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="letter[number]" maxlength="25" value="{{old('letter[number]')}}" id="letter_number">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Tanggal Surat Tanah * :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="letter[date]" value="{{old('letter[date]')}}" id="letter_date">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Atas Nama * :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="letter[on_behalf_of]" maxlength="25" value="{{old('letter[on_behalf_of]')}}" id="letter_on_behalf_on">
                        </div>
                    </div>
                    <!-- <div class="form-group clearfix"> -->
                        <!-- <label class="col-md-4 control-label">Masa Hak tanah * :</label> -->
                        <!-- <div class="col-md-8"> -->
                            <!-- <div class="input-group"> -->
                                <input type="hidden" class="form-control datepicker-autoclose" name="letter[duration_land_authorization]" value="-" id="letter_duration">
                                <!-- <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                    <!-- <div class="form-group clearfix"> -->
                        <!-- <label class="col-md-4 control-label">Nama Kantor Anggaran/BPN * :</label> -->
                        <!-- <div class="col-md-8"> -->
                            <input type="hidden" class="form-control" name="letter[bpn_name]" maxlength="50" value="-" id="letter_bpn_name">
                        <!-- </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</section>