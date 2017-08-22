<section>
    <div class="row">
        <div class="col-md-12">
            <h4 class="m-t-0 header-title"><b>Selesai</b></h4>
            <p class="text-muted m-b-30 font-13">
                Pilih produk pembiayaan dan selesai
            </p>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills m-b-30">
                        <li class="active">
                            <a href="#kpr" data-toggle="tab" aria-expanded="true">KPR</a>
                        </li>
                        <li class="">
                            <a href="#kkb" data-toggle="tab" aria-expanded="false">KKB</a>
                        </li>
                        <li class="">
                            <a href="#briguna" data-toggle="tab" aria-expanded="false">BRIGUNA</a>
                        </li>
                        <li class="">
                            <a href="#britama" data-toggle="tab" aria-expanded="false">BRITAMA</a>
                        </li>
                        <li class="">
                            <a href="#kur" data-toggle="tab" aria-expanded="false">KUR/KUPEDES</a>
                        </li>
                        <li class="">
                            <a href="#kartu" data-toggle="tab" aria-expanded="false">KARTU KREDIT</a>
                        </li>
                    </ul>
                    <div class="tab-content br-n pn">
                        <div id="kpr" class="tab-pane active">
                            <input type="hidden" name="product_type" value="kpr">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jumlah Permohonan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="request_amount" value="{{old('request_amount')}}" maxlength="12">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jangka Waktu *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly" name="year" value="{{old('year')}}" maxlength="2">
                                                    <span class="input-group-addon">Tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Lokasi Rumah *:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" rows="3" maxlength="255" name="home_location">{{old('home_location')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">KPR Aktif ke *:</label>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control numericOnly" name="active_kpr" value="{{old('active_kpr')}}" value="1" maxlength="2" min="0">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Harga Rumah *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="price" value="{{old('price')}}" maxlength="12">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Uang Muka *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="down_payment" value="{{old('down_payment')}}" maxlength="12">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Luas Bangunan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly" name="building_area" value="{{old('building_area')}}" maxlength="5">
                                                    <span class="input-group-addon">m<sup>2</sup></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p class="text-muted m-b-30 font-13">
                                Unggah foto dokumen asli
                            </p>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Dokumen Legal Agunan *:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="image[collateral_document]" accept="image/png,image/jpg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Slip Gaji *:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="image[salary_slip]" accept="image/png,image/jpg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Bank Statement *:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="image[bank_statement]" accept="image/png,image/jpg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Kartu Keluarga *:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="image[family_card]" accept="image/png,image/jpg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Akta Nikah/Akta Cerai *:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="image[marriage_certificate]" accept="image/png,image/jpg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Dokumen Legal Usaha / Izin Praktek *:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="image[bussiness_document]" accept="image/png,image/jpg">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Akta Pisah Harta *:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="image[deed]" accept="image/png,image/jpg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="kkb" class="tab-pane">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jumlah Permohonan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jangka Waktu *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">Tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Kondisi Kendaraan *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>Baru</option>
                                                    <option>Bekas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Merk Kendaraan *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>Toyota</option>
                                                    <option>Honda</option>
                                                    <option>Suzuki</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Harga Kendaraan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Uang Muka *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jenis Kendaraan *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>Minibus</option>
                                                    <option>Truk</option>
                                                    <option>Pick Up</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Tahun Pembuatan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="datepicker-year">
                                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p class="text-muted m-b-30 font-13">
                                Unggah foto dokumen asli
                            </p>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Dokumen Legal Agunan *:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Slip Gaji *:</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Bank Statement :</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Kartu Keluarga :</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Akta Nikah/Akta Cerai :</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Dokumen Legal Usaha / Izin Praktek :</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">Akta Pisah Harta :</label>
                                            <div class="col-md-6">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="briguna" class="tab-pane">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jumlah Permohonan :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Status Peminjam :</label>
                                            <div class="col-md-8">
                                                <select class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>Kawin</option>
                                                    <option>Tidak Kawin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jangka Waktu :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">Tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p class="text-muted m-b-30 font-13">
                                Unggah foto dokumen asli
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Slip Gaji :</label>
                                            <div class="col-md-8">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Bank Statement :</label>
                                            <div class="col-md-8">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Kartu Keluarga :</label>
                                            <div class="col-md-8">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="britama" class="tab-pane">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jumlah Setoran :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Fasilitas E-Banking :</label>
                                            <div class="col-md-8">
                                                <select class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>Fasilitas 1</option>
                                                    <option>Fasilitas 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Tujuan Penggunaan :</label>
                                            <div class="col-md-8">
                                                <select class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>Tujuan 1</option>
                                                    <option>Tujuan 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="kur" class="tab-pane">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jumlah Permohonan :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Jangka Waktu :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">Tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p class="text-muted m-b-30 font-13">
                                Unggah foto dokumen asli
                            </p>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Kartu Keluarga :</label>
                                            <div class="col-md-7">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Dokumen Legal Usaha / Ijin Praktek :</label>
                                            <div class="col-md-7">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="kartu" class="tab-pane">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Tipe Kartu yg Diinginkan :</label>
                                            <div class="col-md-8">
                                                <select class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option>Visa Touch untuk gaya hidup modern</option>
                                                    <option>MasterCard Easy Card untuk keluarga modern</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>