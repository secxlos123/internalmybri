<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 4 Identifikasi Data Lingkungan</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Peruntukan Tanah * :</label>
                            <div class="col-md-8">
                                {!! Form::select('environment[designated_land]', array("" => "", 
                                    "Bangunan Industri" => "Bangunan Industri", 
                                    "Bangunan Perdagangan" => "Bangunan Perdagangan", 
                                    "Bangunan Perkantoran" => "Bangunan Perkantoran",
                                    "Bangunan Perumahan Penduduk" => "Bangunan Perumahan Penduduk", 
                                    "Lain-Lain" => "Lain-Lain"), 
                                    old('environment[designated_land]'), [
                                    'class' => 'select2  designated_land',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fasilitas Umum Yang Ada * :</label>
                            <div class="col-md-8">
                                <div class="checkbox checkbox-primary">
                                    <input type="checkbox" value="1" name="environment[designated_pln]">
                                    <label for="pln"> PLN </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input type="checkbox" value="1" name="environment[designated_phone]">
                                    <label for="telepon"> Telepon </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input type="checkbox" value="1" name="environment[designated_pam]">
                                    <label for="pam"> PAM </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input type="checkbox" value="1" name="environment[designated_telex]">
                                    <label for="telex"> Telex </label>
                                </div>
                                <div id="other-input" style="display: none;">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Fasilitas Umum Lain * :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="environment[other_designated]" maxlength="50" value="{{old('environment[other_designated]')}}" id="other_designated">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Lingkungan Terdekat Dari Lokasi Sebagian Besar * :</label>
                        <div class="col-md-8">
                            {!! Form::select('environment[nearest_location]', array("" => "", 
                                "Bangunan Industri" => "Bangunan Industri", 
                                "Bangunan Perdagangan" => "Bangunan Perdagangan", 
                                "Bangunan Perkantoran" => "Bangunan Perkantoran",
                                "Bangunan Perumahan Penduduk" => "Bangunan Perumahan Penduduk", 
                                "Lain-Lain" => "Lain-Lain"), 
                                old('environment[nearest_location]'), [
                                'class' => 'select2  nearest_location ',
                                'data-placeholder' => '-- Pilih --'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Petunjuk Lain * :</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" name="environment[other_guide]" maxlength="250" id="other_guide">{{old('environment[other_guide]')}}</textarea>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Sarana Transportasi * :</label>
                        <div class="col-md-8">
                            <div class="input-group" style="width:100%">
                                <input type="text" class="form-control" name="environment[transportation]" maxlength="30" value="{{old('environment[transportation]')}}" id="transportation">
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                    <label class="col-md-4 control-label">Jarak Dari Lokasi * :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                            <input type="text" class="form-control numericOnly" name="environment[distance_from_transportation]" maxlength="4" value="{{old('environment[distance_from_transportation]')}}" id="distance_from_transportation">
                            <span class="input-group-addon has-ket-input">Meter</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>