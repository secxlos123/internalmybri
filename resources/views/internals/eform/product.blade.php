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
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group {!! $errors->has('status_property') ? 'has-error' : '' !!}" id="status_property">
                                            <label class="control-label col-md-4">Jenis KPR *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('status_property', array("" => "", "1" => "Baru", "2" => "Secondary", "3" => "Refinancing", "4" => "Renovasi", "5" => "Top Up", "6" => "Take Over", "7" => "Take Over Top Up", "8" => "Take Over Account In House (Cash Bertahap)"), old('status_property'), [
                                                    'class' => 'select2 status_property ',
                                                    'data-placeholder' => 'Pilih Jenis KPR',
                                                    'data-bri' => ''
                                                ]) !!}
                                                {{-- <input type="hidden" name="status_property" value="new"> --}}
                                                @if ($errors->has('status_property')) <p class="help-block">{{ $errors->first('status_property') }}</p> 
                                                @endif
                                            </div>
                                        </div>
                                        
                                        @php ( $className = (old('status_property') == "1" && old('developer') != ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                                        @php ( $classNameType = (old('status_property') != "1" || old('developer') == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                                        @php ( $classNameDeveloper = old('developer') ? '' : 'hide' )
                                        
                                        <div class="form-group {{ $classNameDeveloper }} {!! $errors->has('developer') ? 'has-error' : '' !!}" id="developer">
                                            <label class="control-label col-md-4">Developer *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('developer', ['' => ''], old('developer'), [
                                                    'class' => 'select2 developers ',
                                                    'data-placeholder' => 'Pilih Developer',
                                                    'data-bri' => ''
                                                ]) !!}
                                            </div>
                                            <input type="hidden" name="developer_name" id="new_developer_name">
                                        </div>
                                        
                                        <div class="form-group {{ $classNameType }} {!! $errors->has('kpr_type_property') ? 'has-error' : '' !!}" id="kpr_type_property">
                                            <label class="control-label col-md-4">Jenis Properti *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('kpr_type_property', array("" => "", "1" => "Rumah Tapak", "2" => "Rumah Susun/Apartment", "3" => "Rumah Toko"), old('kpr_type_property'), [
                                                    'class' => 'select2 kpr_type_properties ',
                                                    'data-placeholder' => 'Pilih Jenis Properti',
                                                    'data-bri' => ''
                                                ]) !!}
                                                @if ($errors->has('kpr_type_property'))
                                                 <p class="help-block">{{ $errors->first('kpr_type_property') }}</p> 
                                                @endif
                                            </div>
                                                <input type="hidden" name="kpr_type_property_name" id="kpr_type_property_name">
                                        </div>
                                        
                                        <div class="form-group {{ $className }} {!! $errors->has('property_name') ? 'has-error' : '' !!}" id="property_name">
                                            <label class="control-label col-md-4">Nama Proyek *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('property', [old('property') => old('property_name')], old('property'), [
                                                    'class' => 'select2 property_name',
                                                    'data-placeholder' => 'Pilih Nama Proyek',
                                                ]) !!}
                                                @if ($errors->has('property'))
                                                 <p class="help-block">{{ $errors->first('property') }}</p> 
                                                @endif
                                            </div>
                                                <input type="hidden" name="property_name" id="new_property_name">
                                        </div>

                                        <div class="form-group {{ $className }} {!! $errors->has('property_type') ? 'has-error' : '' !!}" id="property_type">
                                            <label class="control-label col-md-4">Tipe Properti *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('property_type', [old('property_type') => old('property_type_name')], (old('property_type')), [
                                                    'class' => 'select2 property_type',
                                                    'data-placeholder' => 'Pilih Nama Properti',
                                                ]) !!}
                                                <input type="hidden" name="property_type_name" id="new_property_type_name">
                                            </div>
                                        </div>
                                        <div class="form-group {{ $className }} {!! $errors->has('property_item') ? 'has-error' : '' !!}" id="property_unit">
                                            <label class="control-label col-md-4">Unit Properti *:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('property_item', [old('property_item') => old('property_item_name')], old('property_item'), [
                                                    'class' => 'select2 property_item',
                                                    'data-placeholder' => 'Pilih Nama Properti',
                                                ]) !!}
                                                @if ($errors->has('property_item'))
                                                 <p class="help-block">{{ $errors->first('property_item') }}</p> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
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
                                            <input type="hidden" name="property_item_name" id="new_property_item_name">
                                            </div>
                                        </div>

                                        <div class="form-group home_location {!! $errors->has('home_location') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Lokasi Rumah *:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control required" rows="3" maxlength="255" name="home_location" placeholder="Lokasi Rumah" id="home_location" readonly="">{{old('home_location')}}</textarea>
                                                @if ($errors->has('home_location')) <p class="help-block">{{ $errors->first('home_location') }}</p> @endif
                                            </div>
                                        </div>
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
                                                {!! Form::select('active_kpr', array("" => "", "1" => "1", "2" => "2", "3" => "> 2"), old('active_kpr'), [
                                                    'class' => 'select2 active_kpr ',
                                                    'id' => 'active_kpr',
                                                    'data-placeholder' => 'Pilih KPR Aktif',
                                                    'data-bri' => ''
                                                ]) !!}
                                                @if ($errors->has('active_kpr')) <p class="help-block">{{ $errors->first('active_kpr') }}</p> @endif
                                            </div>
                                            <input type="hidden" name="active_kpr_name" id="active_kpr_name">
                                        </div>
                                        <div class="form-group down_payment {!! $errors->has('down_payment') ? 'has-error' : '' !!}">
                                            <label class="control-label col-md-4">Uang Muka *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly" name="dp" value="{{old('dp')}}" maxlength="2" max="90" placeholder="0" id="dp" >
                                                    <span class="input-group-addon">%</span>
                                                    @if ($errors->has('dp')) <p class="help-block">{{ $errors->first('dp') }}</p> @endif
                                                </div><br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp" name="down_payment" value="{{old('down_payment')}}" maxlength="16" id="down_payment">
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
                                                    <input type="text" class="form-control numericOnly currency-rp" name="request_amount" value="{{ old('request_amount') }}" maxlength="16" id="request_amount" readonly="">
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