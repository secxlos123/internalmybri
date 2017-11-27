<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 3 Uraian Bangunan</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">No Izin Mendirikan Bangunan :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="building[permit_number]" maxlength="25" value="{{old('building[permit_number]')}}">
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Tanggal Izin Mendirikan Bangunan :</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker-autoclose" name="building[permit_date]" value="{{old('building[permit_date]')}}">
                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Atas Nama Izin Mendirikan Bangunan :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="building[on_behalf_of]" value="{{old('building[on_behalf_of]')}}">
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Jenis Bangunan :</label>
                            <div class="col-md-8">
                                <select class="form-control" name="building[type]">
                                    <option>-- Pilih --</option>
                                    <option>Rumah Tinggal</option>
                                    <option>Apartemen/Rusun</option>
                                    <option>Kondotel</option>
                                    <option>Villa</option>
                                    <option>Kavling Siap Bangun</option>
                                    <option>Gedung</option>
                                    <option>GUdang</option>
                                    <option>Ruko/Rukan</option>
                                    <option>Hotel</option>
                                    <option>Office</option> 
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Jumlah Bangunan :</label>
                        <div class="col-md-8">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control numericOnly" placeholder="8" name="building[count]" maxlength="4" value="{{old('building[count]')}}">
                                <span class="input-group-addon has-ket-input">Buah</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Luas Bangunan :</label>
                        <div class="col-md-8">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control numericOnly" placeholder="8" name="building[spacious]" maxlength="5" value="{{old('building[spacious]')}}">
                                <span class="input-group-addon has-ket-input">M<sup>2</sup></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Tahun Mendirikan Bangunan :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control numericOnly" name="building[year]" maxlength="4" value="{{old('building[year]')}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Uraian Bangunan :</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" name="building[description]" maxlength="250">{{old('building[description]')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
        <div class="form-group clearfix text-center horizontal-input">
            <label class="control-label">Batas Utara :</label>
            <div class="is-input">
                <div class="input-group">
                    <input type="text" class="form-control numericOnly" maxlength="4" placeholder="8" name="building[north_limit]" value="{{old('building[north_limit]')}}">
                    <span class="input-group-addon has-ket-input">Meter</span>
                </div>
            </div>
            <label class="control-label">Dari Bangunan</label>
            <div class="is-input">
                <div class="input-group" style="width: 100%">
                    <input type="text" class="form-control"  name="building[north_limit_from]" maxlength="50" value="{{old('building[north_limit_from]')}}">
                </div>
            </div>
        </div>
    <hr>
        <div class="form-group clearfix text-center horizontal-input">
            <label class="control-label">Batas Timur :</label>
            <div class="is-input">
                <div class="input-group">
                    <input type="text" class="form-control numericOnly" maxlength="4" placeholder="8" name="building[east_limit]" value="{{old('building[east_limit]')}}">
                    <span class="input-group-addon has-ket-input">Meter</span>
                </div>
            </div>
            <label class="control-label">Dari Bangunan</label>
            <div class="is-input">
                <div class="input-group" style="width: 100%">
                    <input type="text" class="form-control" name="building[east_limit_from]" maxlength="50" value="{{old('building[east_limit_from]')}}">
                </div>
            </div>
        </div>
    <hr>
        <div class="form-group clearfix text-center horizontal-input">
            <label class="control-label">Batas Selatan :</label>
            <div class="is-input">
                <div class="input-group">
                    <input type="text" class="form-control numericOnly" placeholder="8" maxlength="4" name="building[south_limit]" value="{{old('building[south_limit]')}}">
                    <span class="input-group-addon has-ket-input">Meter</span>
                </div>
            </div>
            <label class="control-label">Dari Bangunan</label>
            <div class="is-input">
                <div class="input-group" style="width: 100%">
                    <input type="text" class="form-control" name="building[south_limit_from]" maxlength="50" value="{{old('building[south_limit_from]')}}">
                </div>
            </div>
        </div>
    <hr>
        <div class="form-group clearfix text-center horizontal-input">
            <label class="control-label">Batas Barat :</label>
            <div class="is-input">
                <div class="input-group">
                    <input type="text" class="form-control numericOnly" placeholder="8" maxlength="4" name="building[west_limit]" value="{{old('building[west_limit]')}}">
                    <span class="input-group-addon has-ket-input">Meter</span>
                </div>
            </div>
            <label class="control-label">Dari Bangunan</label>
            <div class="is-input">
                <div class="input-group" style="width: 100%">
                    <input type="text" class="form-control" name="building[west_limit_from]" maxlength="50" value="{{old('building[west_limit_from]')}}">
                </div>
            </div>
        </div>
</section>
