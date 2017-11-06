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
                                <select class="form-control" name="type_of_land_letter">
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
                                <select class="form-control" name="land_rights">
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
                                <select class="form-control" name="match_data_with_bpn">
                                    <option>-- Pilih --</option>
                                    <option>Cocok</option>
                                    <option>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecocokan Pemeriksaan Lokasi Tanah Dilapangan :</label>
                            <div class="col-md-8">
                                <select class="form-control" name="match_data_with_location">
                                    <option>-- Pilih --</option>
                                    <option>Cocok</option>
                                    <option>Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-4 control-label">Kecocokan Batas Tanah Dilapangan :</label>
                            <div class="col-md-8">
                                <select class="form-control" name="match_data_with_land_boundaries">
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
                                    <input type="text" class="form-control numericOnly" placeholder="8" name="area_in_land_letter" maxlength="5">
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
                            <input type="text" class="form-control" name="land_letter_number" maxlength="25">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Tanggal Surat Tanah :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker-autoclose" name="land_letter_date">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Atas Nama :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="on_behalf_of" maxlength="25">
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Masa Hak tanah :</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker-autoclose" name="land_rights_duration">
                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label class="col-md-4 control-label">Nama Kantor Anggaran/BPN :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="bpn_name" maxlength="50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>