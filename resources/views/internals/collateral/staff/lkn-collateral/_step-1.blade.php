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
                        <label class="control-label">Lokasi *</label>
                        <textarea name="area[location]" id="location" class="form-control" name="ground_location" rows="3"></textarea>
                    </div>
                    @if ($errors->has('area[location]')) <p class="help-block">{{ $errors->first('area[location]') }}</p> @endif
                    <div class="col-md-3">
                        <!-- <label class="control-label">Latitude</label> -->
                        <input type="hidden" name="area[latitude]" id="lat" class="form-control" readonly="" name="ground_lat" value="-6.3026755">
                    </div>
                    @if ($errors->has('area[latitude]')) <p class="help-block">{{ $errors->first('area[latitude]') }}</p> @endif
                    <div class="col-md-3">
                        <!-- <label class="control-label">Longitude</label> -->
                        <input type="hidden" name="area[longtitude]" id="lng" class="form-control" readonly="" name="ground_long" value="106.82168409999997">
                    </div>
                    @if ($errors->has('area[longtitude]')) <p class="help-block">{{ $errors->first('area[longtitude]') }}</p> @endif
                </div>
            </div>
        <!-- </div> -->
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Tipe KPR *:</label>
                            <div class="col-md-8">
                                <!-- {!! Form::select('area[collateral_type]', array("" => "", "Independent" => "Independent", "Proyek" => "Proyek"), old('area[collateral_type]'), [
                                    'class' => 'select2 area[collateral_type] ',
                                    'data-placeholder' => '-- Pilih Tipe --',
                                    'id' => 'collateral_type'
                                ]) !!} -->
                                {!! Form::select('collateral_type', array("" => "", "1" => "Baru", "2" => "Secondary", "3" => "Refinancing", "4" => "Renovasi", "5" => "Top Up", "6" => "Take Over", "7" => "Take Over Top Up", "8" => "Take Over Account In House (Cash Bertahap)"), old('area[collateral_type]'), [
                                    'class' => 'select2 collateral_type ',
                                    'data-placeholder' => '-- Pilih Jenis KPR --',
                                    'id' => 'collateral_type'
                                ]) !!}

                                <input type="hidden" name="area[collateral_type]" id="area_collateral_type" class="form-control">
                            </div>
                            @if ($errors->has('area[collateral_type]')) <p class="help-block">{{ $errors->first('area[collateral_type]') }}</p> @endif
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kota/Kabupaten *:</label>
                            <div class="col-md-8">
                                {!! Form::select('area[city_id]', ['' => ''], old('cities'), [
                                    'class' => 'select2 cities',
                                    'data-placeholder' => '-- Pilih Kota --',
                                    'id' => 'district'
                                ]) !!}
                            </div>
                            @if ($errors->has('area[city_id]')) <p class="help-block">{{ $errors->first('area[city_id]') }}</p> @endif
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecamatan *:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="area[district]" maxlength="30" value="{{old('area[district]')}}" id="sub_district">
                            </div>
                            @if ($errors->has('area[district]')) <p class="help-block">{{ $errors->first('area[district]') }}</p> @endif
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kelurahan/Desa *:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="area[sub_district]" maxlength="30" value="{{old('area.sub_district')}}">
                            </div>
                            @if ($errors->has('area[sub_district]')) <p class="help-block">{{ $errors->first('area[sub_district]') }}</p> @endif
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">RT/ RW *:</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control numericOnly" placeholder="RT" name="area[rt]" maxlength="3" value="{{old('area.rt')}}" id="rt">
                            </div>
                            @if ($errors->has('area[rt]')) <p class="help-block">{{ $errors->first('area[rt]') }}</p> @endif
                            <div class="col-md-2">
                                <input type="text" class="form-control numericOnly" placeholder="RW" name="area[rw]" maxlength="3" value="{{old('area.rw')}}" id="rw">
                            </div>
                            @if ($errors->has('area[rw]')) <p class="help-block">{{ $errors->first('area[rw]') }}</p> @endif
                            <div class="col-md-4">
                                <input type="text" class="form-control numericOnly" placeholder="Kode Pos" name="area[zip_code]" maxlength="6" value="{{old('area.zip_code')}}" id="zip_code">
                            </div>
                            @if ($errors->has('area[zip_code]')) <p class="help-block">{{ $errors->first('area[zip_code]') }}</p> @endif
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Jarak *:</label>
                            <div class="col-md-8">
                                <div class="bottom10">
                                    <input type="text" class="form-control numericOnly" name="area[distance]" maxlength="5" value="{{old('area[distance]')}}" id="distance">
                                </div>
                                @if ($errors->has('area[distance]')) <p class="help-block">{{ $errors->first('area[distance]') }}</p> @endif
                                <div class="row">
                                    <div class="col-md-5">
                                        {!! Form::select('area[unit_type]', array("" => "", "1" => "Kilometer", "2" => "Meter"), old('area[unit_type]'), [
                                            'class' => 'select2 unit_type ',
                                            'data-placeholder' => '-- Satuan --'
                                        ]) !!}
                                    </div>
                                    @if ($errors->has('area[unit_type]')) <p class="help-block">{{ $errors->first('area[unit_type]') }}</p> @endif

                                    <div class="col-md-2">
                                        <label class="control-label">Dari *</label>
                                    </div>

                                    <div class="col-md-5">
                                        {!! Form::select('area[distance_from]', array("" => "", "Pusat Kota" => "Pusat Kota", "Pusat Desa" => "Pusat Desa"), old('area[distance_from]'), [
                                            'class' => 'select2 distance_from ',
                                            'data-placeholder' => '-- Lokasi --'
                                        ]) !!}
                                    </div>
                                    @if ($errors->has('area[distance_from]')) <p class="help-block">{{ $errors->first('area[distance_from]') }}</p> @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Posisi Terhadap Jalan *:</label>
                            <div class="col-md-8">
                                {!! Form::select('area[position_from_road]', array("" => "", 
                                    "Langsung Menghadap Jalan" => "Langsung Menghadap Jalan", 
                                    "Tidak Menghadap ke jalan tetapi mempunyai jalan masuk" => "Tidak Menghadap ke jalan tetapi mempunyai jalan masuk", 
                                    "Untuk mencapai tanah tersebut harus melewati orang lain" => "Untuk mencapai tanah tersebut harus melewati orang lain"), 
                                    old('area[position_from_road]'), [
                                    'class' => 'select2 position_from_road',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Bentuk Tanah *:</label>
                            <div class="col-md-8">
                                {!! Form::select('area[ground_type]', array("" => "", 
                                    "Segi Tiga" => "Segi Tiga", 
                                    "Segi Empat" => "Segi Empat", 
                                    "Trapesium" => "Trapesium",
                                    "Tidak Beraturan" => "Tidak Beraturan"), 
                                    old('area[ground_type]'), [
                                    'class' => 'select2 ground_type ',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Jarak Posisi Terhadap Jalan *:</label>
                        <div class="col-md-7">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control numericOnly" maxlength="4" name="area[distance_of_position]" value="{{old('area[distance_of_position]')}}" id="distance_of_position">
                                <span class="input-group-addon has-ket-input">M</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Batas Utara *:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="area[north_limit]" maxlength="50" value="{{old('area[north_limit]')}}" id="north_limit">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Batas Timur *:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="area[east_limit]" maxlength="50" value="{{old('area[east_limit]')}}" id="east_limit">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Batas Selatan *:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="area[south_limit]" maxlength="50" value="{{old('area[south_limit]')}}" id="south_limit">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Batas Barat *:</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="area[west_limit]" maxlength="50" value="{{old('area[west_limit]')}}" id="west_limit">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Keterangan Lain *:</label>
                        <div class="col-md-7">
                            <textarea class="form-control" rows="3" name="area[another_information]" maxlength="250" id="another_information">{{old('area[another_information]')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Permukaan Tanah *:</label>
                        <div class="col-md-7">
                            {!! Form::select('area[ground_level]', array("" => "", 
                                "Tanah Rata" => "Tanah Rata", 
                                "Bergelombang" => "Bergelombang", 
                                "Landai" => "Landai"), 
                                old('area[ground_level]'), [
                                'class' => 'select2 ground_level',
                                'data-placeholder' => '-- Pilih --'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Luas Tanah Sesuai Lapang *:</label>
                        <div class="col-md-7">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control numericOnly" maxlength="4" name="area[surface_area]" value="{{old('area[surface_area]')}}" id="surface_area">
                                <span class="input-group-addon has-ket-input">M<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>