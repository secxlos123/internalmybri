<section>
    <div class="row">
        <div class="col-md-12">
            <!-- <h4 class="m-t-0 header-title"><b>Selesai</b></h4> -->
            <p class="text-muted m-b-30 font-13">
                Pilih produk pembiayaan
            </p>
            <input type="hidden" name="product_type" value="kpr" id="product_type">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills m-b-30">
                        <li id="li_kpr" class="active">
                            <a href="#kpr" data-toggle="tab" aria-expanded="true">KPR</a>
                        </li>
                        <!-- <li id="li_kkb" class="disabled">
                            <a href="#kkb" data-toggle="tab" aria-expanded="false">KKB</a>
                        </li>
                        <li id="li_briguna" class="disabled">
                            <a href="#briguna" data-toggle="tab" aria-expanded="false">BRIGUNA</a>
                        </li>
                        <li id="li_britama" class="disabled">
                            <a href="#britama" data-toggle="tab" aria-expanded="false">BRITAMA</a>
                        </li>
                        <li id="li_kur" class="disabled">
                            <a href="#kur" data-toggle="tab" aria-expanded="false">KUR/KUPEDES</a>
                        </li>
                        <li id="li_kartu" class="disabled">
                            <a href="#kartu" data-toggle="tab" aria-expanded="false">KARTU KREDIT</a>
                        </li> -->
                    </ul>
                    <div class="tab-content br-n pn">
                        <div id="kpr" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-horizontal" role="form">
                                            <div class="form-group status_property {!! $errors->has('status') ? 'has-error' : '' !!}" hidden="" >
                                                <label class="control-label col-md-4">Status Properti *:</label>
                                                <div class="col-md-6">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="new" value="new" name="status_property" checked="">
                                                        <label for="new"> Baru </label>
                                                    </div>
                                                    <!-- <div class="radio radio-pink radio-inline">
                                                        <input type="radio" id="second" value="second" name="status_property" disabled="">
                                                        <label for="second"> Bekas </label>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group" id="developer">
                                            <label class="control-label col-md-4">Developer *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('developer', 
                                                    [old('developer') => old('developer_name')], (old('developer')), 
                                                    ['class' => 'select2 developers ',
                                                     'data-placeholder' => 'Pilih Developer',
                                                     'data-bri' => ''
                                                    ]) 
                                                !!}
                                            </div>
                                            <input type="hidden" name="developer_name" id="new_developer_name">
                                        </div>
                                        
                                        <div class="form-group kpr_type {!! $errors->has('kpr_type') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Jenis KPR *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control " name="kpr_type" id="kpr_type">
                                                    @if(old('kpr_type'))
                                                    <option value="{{old('kpr_type')}}" selected=""> {{old('kpr_type_name')}} </option>
                                                    @else
                                                    <option value="0" selected=""> Pilih </option>
                                                    @endif
                                                    <option value="1"> Baru </option>
                                                    <option value="2"> Secondary </option>
                                                    <option value="3"> Refinancing </option>
                                                    <option value="4"> Renovasi </option>
                                                    <option value="5"> Top Up </option>
                                                    <option value="6"> Take Over </option>
                                                    <option value="7"> Take Over Top Up </option>
                                                </select>
                                                @if ($errors->has('kpr_type')) <p class="help-block">{{ $errors->first('kpr_type') }}</p> @endif
                                            </div>
                                            <input type="hidden" name="kpr_type_name" id="kpr_type_name">
                                        </div>
                                        
                                        <div class="form-group kpr_type_property {!! $errors->has('kpr_type_property') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Jenis Properti *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control " name="kpr_type_property" id="kpr_type_property">
                                                    @if(old('kpr_type_property'))
                                                    <option value="{{old('kpr_type_property')}}" selected=""> {{old('kpr_type_property_name')}} </option>
                                                    @else
                                                    <option value="0" selected=""> Pilih </option>
                                                    @endif
                                                    <option value="1"> Rumah Tapak </option>
                                                    <option value="2"> Rumah Susun/Apartment </option>
                                                    <option value="3"> Rumah Toko </option>
                                                </select>
                                                @if ($errors->has('kpr_type_property')) <p class="help-block">{{ $errors->first('kpr_type_property') }}</p> @endif
                                            </div>
                                            <input type="hidden" name="kpr_type_property_name" id="kpr_type_property_name">
                                        </div>
                                        
                                        <div class="form-group {!! $errors->has('property_name') ? 'has-error' : '' !!}" id="property_name">
                                            <label class="control-label col-md-4">Nama Proyek *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('property', [old('property') => old('property_name')], old('property'), [
                                                    'class' => 'select2 property_name',
                                                    'data-placeholder' => 'Pilih Nama Proyek',
                                                ]) !!}
                                            </div>
                                            <input type="hidden" name="property_name" id="new_property_name">
                                        </div>
                                        <hr>

                                        <div class="form-group price {!! $errors->has('price') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Harga Rumah *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp " id="price" name="price" value="{{old('price')}}" maxlength="16" id="price" readonly="">
                                                    <!-- <span class="input-group-addon">,00</span> -->
                                                    @if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group building_area {!! $errors->has('building_area') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Luas Bangunan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly " name="building_area" value="{{old('building_area')}}" maxlength="3" placeholder="0" id="building_area" readonly="">
                                                    <span class="input-group-addon">m<sup>2</sup></span>
                                                    @if ($errors->has('building_area')) <p class="help-block">{{ $errors->first('building_area') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group home_location {!! $errors->has('home_location') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Lokasi Rumah *:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control required" rows="3" maxlength="255" name="home_location" placeholder="Lokasi Rumah" id="home_location" readonly="">{{old('home_location')}}</textarea>
                                                @if ($errors->has('home_location')) <p class="help-block">{{ $errors->first('home_location') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group {!! $errors->has('property_type') ? 'has-error' : '' !!}" id="property_type">
                                            <label class="control-label col-md-4">Tipe Properti *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('property_type', [old('property_type') => old('property_type_name')], (old('property_type')), [
                                                    'class' => 'select2 property_type',
                                                    'data-placeholder' => 'Pilih Nama Properti',
                                                ]) !!}
                                            </div>
                                            <input type="hidden" name="property_type_name" id="new_property_type_name">
                                        </div>
                                        <div class="form-group {!! $errors->has('property_item') ? 'has-error' : '' !!}" id="property_unit">
                                            <label class="control-label col-md-4">Unit Properti *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('property_item', [old('property_item') => old('property_item_name')], old('property_item'), [
                                                    'class' => 'select2 property_item',
                                                    'data-placeholder' => 'Pilih Nama Properti',
                                                ]) !!}
                                            </div>
                                            <input type="hidden" name="property_item_name" id="new_property_item_name">
                                        </div>
                                        <hr id="line">

                                        <div class="form-group year {!! $errors->has('year') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Jangka Waktu *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly required " name="year" value="{{old('year')}}" maxlength="3" placeholder="0" id="year" min="12">
                                                    <span class="input-group-addon">Bulan</span>
                                                    @if ($errors->has('year')) <p class="help-block">{{ $errors->first('year') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group active_kpr {!! $errors->has('active_kpr') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">KPR Aktif ke *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control " name="active_kpr" id="active_kpr">
                                                    @if(old('active_kpr'))
                                                    <option value="{{old('active_kpr')}}" selected=""> {{old('active_kpr_name')}} </option>
                                                    @else
                                                    <option value="0" selected=""> Pilih </option>
                                                    @endif
                                                    <option value="1"> 1 </option>
                                                    <option value="2"> 2 </option>
                                                    <option value="3"> > 2 </option>
                                                </select>
                                                @if ($errors->has('active_kpr')) <p class="help-block">{{ $errors->first('active_kpr') }}</p> @endif
                                            </div>
                                            <input type="hidden" name="active_kpr_name" id="active_kpr_name">
                                        </div>

                                        <div class="form-group down_payment {!! $errors->has('down_payment') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Uang Muka *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly lovely-input" name="dp" value="{{old('dp')}}" maxlength="2" max="90" placeholder="0" id="dp" >
                                                    <span class="input-group-addon">%</span>
                                                    @if ($errors->has('dp')) <p class="help-block">{{ $errors->first('dp') }}</p> @endif
                                                </div><br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp" name="down_payment" value="{{old('down_payment')}}" maxlength="16" id="down_payment" readonly="">
                                                    <!-- <span class="input-group-addon">,00</span> -->
                                                    @if ($errors->has('down_payment')) <p class="help-block">{{ $errors->first('down_payment') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group request_amount {!! $errors->has('request_amount') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Jumlah Permohonan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp" name="request_amount" value="{{old('request_amount')}}" maxlength="16" id="request_amount" readonly="">
                                                    <!-- <span class="input-group-addon">,00</span> -->
                                                    @if ($errors->has('request_amount')) <p class="help-block">{{ $errors->first('request_amount') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- <div class="form-group">
                                            <label class="control-label col-md-4">Catatan :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <p class="control-label" >1. Jika KPR aktif ke-1, maka minimal uang muka 0 %</p><br>
                                                </div>
                                                <div class="input-group">
                                                    <p class="control-label" >2. Jika KPR aktif ke-2, maka minimal uang muka 10 %</p><br>
                                                </div>
                                                <div class="input-group">
                                                    <p class="control-label">Kondisi Luas Bangunan</p>
                                                </div>
                                            </div>
                                        </div>
                                         -->
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