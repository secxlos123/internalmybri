<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title bottom20"><b>Step 2 Identifikasi Tanah Berdasarkan Surat Tanah</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-horizontal" role="form">
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Jenis Surat Tanah :</label>
                            <div class="col-md-8">
                                <select class="form-control" name="letter[type]">
                                    <option>-- Pilih --</option>
                                    <option>Sertifikat</option>
                                    <option>SKPT</option>
                                    <option>Model A</option>
                                    <option>Petok D</option>
                                    <option>Surat Sewa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Hak Atas Tanah :</label>
                            <div class="col-md-8">
                                <select class="form-control" name="letter[authorization_land]">
                                    <option>-- Pilih --</option>
                                    <option>Milik</option>
                                    <option>Guna Bangunan</option>
                                    <option>Guna Usaha</option>
                                    <option>Sewa</option>
                                    <option>Pakai</option>  
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecocokan Data Dengan Kantor Anggara/BPN :</label>
                            <div class="col-md-8">
                                <select class="form-control" name="letter[match_bpn]">
                                    <option>-- Pilih --</option>
                                    <option>Cocok</option>
                                    <option>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecocokan Pemeriksaan Lokasi Tanah Dilapangan :</label>
                            <div class="col-md-8">
                                <select class="form-control" name="letter[match_area]">
                                    <option>-- Pilih --</option>
                                    <option>Cocok</option>
                                    <option>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecocokan Batas Tanah Dilapangan :</label>
                            <div class="col-md-8">
                                <select class="form-control" name="letter[match_limit_in_area]">
                                    <option>-- Pilih --</option>
                                    <option>Cocok</option>
                                    <option>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Luas Tanah Berdasarkan Surat Tanah :</label>
                            <div class="col-md-8">
                                <div class="input-group" style="width: 100%;">
                                    <input type="text" class="form-control numericOnly" placeholder="8" name="letter[surface_area_by_letter]" maxlength="5" value="{{old('letter[surface_area_by_letter]')}}">
                                    <span class="input-group-addon has-ket-input">M<sup>2</sup></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">No Surat Tanah :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="letter[number]" maxlength="25" value="{{old('letter[number]')}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Tanggal Surat Tanah :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="letter[date]" value="{{old('letter[date]')}}">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Atas Nama :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="letter[on_behalf_of]" maxlength="25" value="{{old('letter[on_behalf_of]')}}">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Masa Hak tanah :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker-autoclose" name="letter[duration_land_authorization]" value="{{old('letter[duration_land_authorization]')}}">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Nama Kantor Anggaran/BPN :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="letter[bpn_name]" maxlength="50" value="{{old('letter[bpn_name]')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>