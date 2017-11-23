<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 4 Identifikasi Data Lingkungan</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Peruntukan Tanah :</label>
                            <div class="col-md-8">
                                <select class="form-control" name="environment[designated_land]">
                                    <option>-- Pilih --</option>
                                    <option>Bangunan Industri</option>
                                    <option>Bangunan Perdagangan</option>
                                    <option>Bangunan Perkantoran</option>
                                    <option>Bangunan Perumahan Penduduk</option>
                                    <option>Lain-Lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fasilitas Umum Yang Ada :</label>
                            <div class="col-md-8">
                                <div class="radio radio-primary">
                                    <input type="radio" id="tujuan1" value="tujuan1" name="environment[designated]">
                                    <label for="tujuan1"> PLN </label>
                                </div>
                                <div class="radio radio-primary">
                                    <input type="radio" id="tujuan2" value="tujuan2" name="environment[designated]">
                                    <label for="tujuan2"> Telepon </label>
                                </div>
                                <div class="radio radio-primary">
                                    <input type="radio" id="tujuan3" value="tujuan3" name="environment[designated]">
                                    <label for="tujuan3"> PAM </label>
                                </div>
                                <div class="radio radio-primary">
                                    <input type="radio" id="tujuan4" value="tujuan4" name="environment[designated]">
                                    <label for="tujuan4"> Telex </label>
                                </div>
                                <div id="other-input" style="display: none;">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Fasilitas Umum Lain :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="environment[other_designated]" maxlength="50">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Lingkungan Terdekat Dari Lokasi Sebagian Besar :</label>
                        <div class="col-md-8">
                            <select class="form-control" name="environment[nearest_location]">
                                <option>-- Pilih --</option>
                                <option>Bangunan Industri</option>
                                <option>Bangunan Perdagangan</option>
                                <option>Bangunan Perkantoran</option>
                                <option>Bangunan Perumahan Penduduk</option>
                                <option>Lain-Lain</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Petunjuk Lain :</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" name="environment[other_guide]" maxlength="250"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group clearfix text-center horizontal-input">
        <label class="control-label">Sarana Transportasi :</label>
        <div class="is-input">
            <div class="input-group" style="width:100%">
                <input type="text" class="form-control" name="environment[transportation]" maxlength="30">
            </div>
        </div>
        <label class="control-label">Jarak Dari Lokasi</label>
        <div class="is-input">
            <div class="input-group">
                <input type="text" class="form-control numericOnly" name="environment[distance_from_transportation]" maxlength="4">
                <span class="input-group-addon has-ket-input">Meter</span>
            </div>
        </div>
    </div>
</section>