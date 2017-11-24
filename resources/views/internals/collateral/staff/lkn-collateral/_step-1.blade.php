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
                        <textarea name="area[location]" id="location" class="form-control" readonly="" name="ground_location" rows="3"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Latitude</label>
                        <input type="text" name="area[latitude]" id="lat" class="form-control" readonly="" name="ground_lat" value="-6.3026755">
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Longitude</label>
                        <input type="text" name="area[longtitude]" id="lng" class="form-control" readonly="" name="ground_long" value="106.82168409999997">
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
                                <select class="form-control" name="area[collateral_type]">
                                    <option>-- Pilih Tipe --</option>
                                    <option>Independent</option>
                                    <option>Proyek</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kota/Kabupaten :</label>
                            <div class="col-md-8">
                                {!! Form::select('area[city_id]', ['' => ''], old('cities'), [
                                    'class' => 'select2 cities',
                                    'data-placeholder' => '-- Pilih Kota --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecamatan :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="area[district]" maxlength="30">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kelurahan/Desa :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="area[sub_district]" maxlength="30">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">RT/ RW :</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control numericOnly" placeholder="RT" name="area[rt]" maxlength="2">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control numericOnly" placeholder="RW" name="area[rw]" maxlength="2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control numericOnly" placeholder="Kode Pos" name="area[zip_code]" maxlength="6">
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Jarak :</label>
                            <div class="col-md-8">
                                <div class="bottom10">
                                    <input type="text" class="form-control" placeholder="1800" name="area[distance]" maxlength="5">
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <select class="form-control" name="area[unit_type]">
                                            <option>-- Satuan --</option>
                                            <option value="1">Kilometer</option>
                                            <option value="2">Meter</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="control-label">Dari</label>
                                    </div>

                                    <div class="col-md-5">
                                        <select class="form-control" name="area[distance_from]">
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
                                <select class="form-control" name="area[position_from_road]">
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
                                <select class="form-control" name="area[ground_type]">
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
                                <input type="text" class="form-control numericOnly" maxlength="4" placeholder="8" name="area[distance_of_position]">
                                <span class="input-group-addon has-ket-input">M</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Batas Utara :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="area[north_limit]" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Batas Timur :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="area[east_limit]" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Batas Selatan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="area[south_limit]" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Batas Barat :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="area[west_limit]" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Keterangan Lain :</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" name="area[another_information]" maxlength="250"></textarea>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Permukaan Tanah :</label>
                        <div class="col-md-8">
                            <select class="form-control" name="area[ground_level]">
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
                                <input type="text" class="form-control numericOnly" maxlength="4" placeholder="8" name="area[surface_area]">
                                <span class="input-group-addon has-ket-input">M<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>