<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 1 Identifikasi Tanah di Lapangan</b></h4>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title"><b>Lokasi Tanah</b></h4>
                    <p class="text-muted m-b-30 font-13">Tentukan lokasi tanah</p>
                    <input id="searchInput" class="input-controls" type="text" placeholder="Masukkan nama tempat atau nama jalan untuk lokasi pertemuan">
                </div>
                <div class="map" id="map" style="width: 100%; height: 400px;"></div>
                <div class="form-group m-t-20">
                    <div class="col-md-6">
                        <label class="control-label">Lokasi</label>
                        <textarea name="location" id="location" class="form-control" readonly="" name="ground_location" rows="3"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Latitude</label>
                        <input type="text" name="lat" id="lat" class="form-control" readonly="" name="ground_lat">
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Longitude</label>
                        <input type="text" name="lng" id="lng" class="form-control" readonly="" name="ground_long">
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-horizontal" role="form">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Tipe Anggunan :</label>
                        <div class="col-md-8">
                            <select class="form-control" name="collateral_type">
                                <option>-- Pilih Tipe --</option>
                                <option>Independent</option>
                                <option>Proyek</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Kota/Kabupaten :</label>
                        <div class="col-md-8">
                            <select class="form-control" name="city">
                                <option>-- Pilih Kota --</option>
                                <option>Kota 1</option>
                                <option>Kota 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Kecamatan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="district" maxlength="30">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Kelurahan/Desa :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="village" maxlength="30">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">RT/ RW :</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control numericOnly" placeholder="RT" name="rt" maxlength="2">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control numericOnly" placeholder="RW" name="rw" maxlength="2">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control numericOnly" placeholder="Kode Pos" name="zip_code" maxlength="6">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Jarak :</label>
                        <div class="col-md-8">
                            <div class="bottom10">
                                <input type="text" class="form-control" placeholder="1800" name="distance" maxlength="5">
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <select class="form-control" name="meter_units">
                                        <option>-- Satuan --</option>
                                        <option>Kilometer</option>
                                        <option>Meter</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="control-label">Dari</label>
                                </div>

                                <div class="col-md-5">
                                    <select class="form-control" name="from_location">
                                        <option>-- Lokasi --</option>
                                        <option>Pusat Kota</option>
                                        <option>Pusat Desa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Posisi Terhadap Jalan :</label>
                        <div class="col-md-8">
                            <select class="form-control" name="position_from_road">
                                <option>-- Pilih Tipe --</option>
                                <option>Langsung Menghadap Jalan</option>
                                <option>Tidak Menghadap ke jalan tetapi mempunyai jalan masuk</option>
                                <option>Untuk mencapai tanah tersebut harus melewati orang lain</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Bentuk Tanah :</label>
                        <div class="col-md-8">
                            <select class="form-control" name="ground_type">
                                <option>-- Pilih --</option>
                                <option>Segi Tiga</option>
                                <option>Segi Empa</option>
                                <option>Trapesium</option>
                                <option>Tidak Beraturan</option>
                            </select>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Jarak Posisi Terhadap Jalan :</label>
                        <div class="col-md-8">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control numericOnly" maxlength="4" placeholder="8" name="distance_of_position">
                                <span class="input-group-addon has-ket-input">M</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Batas Utara :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="northern_boundary" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Batas Timur :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="eastern_boundary" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Batas Selatan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="southern_boundary" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Batas Barat :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="western_boundary" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Keterangan Lain :</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" name="remarks" maxlength="250"></textarea>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Permukaan Tanah :</label>
                        <div class="col-md-8">
                            <select class="form-control" name="ground_level">
                                <option>-- Pilih --</option>
                                <option>Tanah Rata</option>
                                <option>Bergelombang</option>
                                <option>Landai</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Luas Tanah Sesuai Lapang :</label>
                        <div class="col-md-8">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control numericOnly" maxlength="4" placeholder="8" name="surface_area">
                                <span class="input-group-addon has-ket-input">M<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>