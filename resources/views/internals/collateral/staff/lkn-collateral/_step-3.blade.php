<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 3 Uraian Bangunan</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-6 control-label">No Izin Mendirikan Bangunan * :</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="building[permit_number]" maxlength="25" value="{{ $collateral['ots_building']['permit_number'] ? $collateral['ots_building']['permit_number'] : old('building.permit_number')}}" id="building_permit_number">
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-md-6 control-label">Tanggal Izin Mendirikan Bangunan * :</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-autoclose" name="building[permit_date]" value="{{$collateral['ots_building']['permit_date'] ? $collateral['ots_building']['permit_date'] : old('building.permit_date')}}" id="building_permit_date">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-md-6 control-label">Atas Nama Izin Mendirikan Bangunan * :</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="building[on_behalf_of]" value="{{$collateral['ots_building']['on_behalf_of'] ? $collateral['ots_building']['on_behalf_of'] : old('building.on_behalf_of')}}" id="building_on_behalf_of" maxlength="50">
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-md-6 control-label">Jenis Bangunan * :</label>
                            <div class="col-md-6">
                                {!! Form::select('building[type]', array($collateral['ots_building']['type'] ? $collateral['ots_building']['type'] : "" => $collateral['ots_building']['type_name'] ? $collateral['ots_building']['type_name'] : "", 
                                    "3" => "Tanah Dan Rumah Tinggal", 
                                    "4" => "Properti Komersial"
                                    ), 
                                    old('building.type'), [
                                    'class' => 'select2 building_type',
                                    'data-placeholder' => '-- Pilih --'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Jumlah Bangunan * :</label>
                        <div class="col-md-7">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control numericOnly" name="building[count]" maxlength="4" value="{{ $collateral['ots_building']['count'] ? $collateral['ots_building']['count'] : old('building.count')}}" id="building_count">
                                <span class="input-group-addon has-ket-input">Buah</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Luas Bangunan * :</label>
                        <div class="col-md-7">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control numericOnly" name="building[spacious]" maxlength="5" value="{{ $type == 'nonindex' ? $collateral['building_area'] : old('building.spacious')}}" id="building_spacious">
                                <span class="input-group-addon has-ket-input">M<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Tahun Mendirikan Bangunan * :</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control numericOnly" name="building[year]" maxlength="4" value="{{$collateral['ots_building']['year'] ? $collateral['ots_building']['year'] : old('building.year')}}" id="building_year">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-5 control-label">Uraian Bangunan * :</label>
                        <div class="col-md-7">
                            <textarea class="form-control" rows="3" name="building[description]" maxlength="250" id="building_description">{{$collateral['ots_building']['description'] ? $collateral['ots_building']['description'] : old('building.description')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
        <div class="form-group clearfix text-center horizontal-input">
            <label class="control-label">Batas Utara * :</label>
            <div class="is-input">
                <div class="input-group">
                    <input type="text" class="form-control numericOnly" maxlength="4" name="building[north_limit]" value="{{$collateral['ots_building']['north_limit'] ? substr($collateral['ots_building']['north_limit'], 0, -3) : old('building.north_limit')}}" id="building_north_limit">
                    <span class="input-group-addon has-ket-input">Meter</span>
                </div>
            </div>
            <label class="control-label">Dari Bangunan * :</label>
            <div class="is-input">
                <div class="input-group" style="width: 100%">
                    <input type="text" class="form-control"  name="building[north_limit_from]" maxlength="50" value="{{$collateral['ots_building']['north_limit_from'] ? $collateral['ots_building']['north_limit_from'] : old('building.north_limit_from')}}" id="building_north_limit_from">
                </div>
            </div>
        </div>
    <hr>
        <div class="form-group clearfix text-center horizontal-input">
            <label class="control-label">Batas Timur * :</label>
            <div class="is-input">
                <div class="input-group">
                    <input type="text" class="form-control numericOnly" maxlength="4" name="building[east_limit]" value="{{$collateral['ots_building']['east_limit'] ? substr($collateral['ots_building']['east_limit'], 0,-3) : old('building.east_limit')}}" id="building_east_limit">
                    <span class="input-group-addon has-ket-input">Meter</span>
                </div>
            </div>
            <label class="control-label">Dari Bangunan * :</label>
            <div class="is-input">
                <div class="input-group" style="width: 100%">
                    <input type="text" class="form-control" name="building[east_limit_from]" maxlength="50" value="{{$collateral['ots_building']['east_limit_from'] ? $collateral['ots_building']['east_limit_from'] : old('building.east_limit_from')}}" id="building_east_limit_from">
                </div>
            </div>
        </div>
    <hr>
        <div class="form-group clearfix text-center horizontal-input">
            <label class="control-label">Batas Selatan * :</label>
            <div class="is-input">
                <div class="input-group">
                    <input type="text" class="form-control numericOnly" maxlength="4" name="building[south_limit]" value="{{$collateral['ots_building']['south_limit'] ? substr($collateral['ots_building']['south_limit'], 0,-3) : old('building.south_limit')}}" id="building_south_limit">
                    <span class="input-group-addon has-ket-input">Meter</span>
                </div>
            </div>
            <label class="control-label">Dari Bangunan * :</label>
            <div class="is-input">
                <div class="input-group" style="width: 100%">
                    <input type="text" class="form-control" name="building[south_limit_from]" maxlength="50" value="{{$collateral['ots_building']['south_limit_from'] ? $collateral['ots_building']['south_limit_from'] : old('building.south_limit_from')}}" id="building_south_limit_from">
                </div>
            </div>
        </div>
    <hr>
        <div class="form-group clearfix text-center horizontal-input">
            <label class="control-label">Batas Barat * :</label>
            <div class="is-input">
                <div class="input-group">
                    <input type="text" class="form-control numericOnly" maxlength="4" name="building[west_limit]" value="{{$collateral['ots_building']['west_limit'] ? substr($collateral['ots_building']['west_limit'], 0,-3) : old('building.west_limit')}}" id="building_west_limit">
                    <span class="input-group-addon has-ket-input">Meter</span>
                </div>
            </div>
            <label class="control-label">Dari Bangunan * :</label>
            <div class="is-input">
                <div class="input-group" style="width: 100%">
                    <input type="text" class="form-control" name="building[west_limit_from]" maxlength="50" value="{{$collateral['ots_building']['west_limit_from'] ? $collateral['ots_building']['west_limit_from'] : old('building.west_limit_from')}}" id="building_west_limit_from">
                </div>
            </div>
        </div>
</section>
