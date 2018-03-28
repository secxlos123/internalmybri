<div class="row">
    <div class="col-md-12">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Data Pengajuan</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-horizontal" role="form">
                            <input type="hidden" name="eform_id" value="{{$dataCustomer['kpr']['id']}}">
                            @php ( $className = ($dataCustomer['kpr']['status_property'] == "1" && $dataCustomer['kpr']['developer_id'] != ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                            @php ( $classNameType = ($dataCustomer['kpr']['status_property'] != "1" || $dataCustomer['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                            @php ( $classKPRType = ($dataCustomer['kpr']['status_property'] != "1" && $dataCustomer['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                            @php ( $classNameDeveloper = ($dataCustomer['kpr']['status_property'] == "1") ? '' : 'hide' )
                            <div class="form-group {!! $errors->has('status_property') ? 'has-error' : '' !!}" id="status_property">
                                <label class="control-label col-md-3">Jenis KPR * :</label>
                                <div class="col-md-9">
                                    @if ($type != 'preview')
                                    {!! Form::select('status_property', array("" => "", "1" => "Baru", "2" => "Secondary", "3" => "Refinancing", "4" => "Renovasi", "5" => "Top Up", "6" => "Take Over", "7" => "Take Over Top Up", "8" => "Take Over Account In House (Cash Bertahap)"), !empty($dataCustomer) ? $dataCustomer['kpr']['status_property'] : old('status_property'), [
                                        'class' => 'select2 status_property ',
                                        'data-placeholder' => 'Pilih Jenis KPR',
                                        'data-bri' => ''
                                    ]) !!}
                                    @else
                                        <p>@if($dataCustomer['kpr']['status_property'] == 1) Baru
                                        @elseif($dataCustomer['kpr']['status_property'] == 2)Secondary
                                        @elseif($dataCustomer['kpr']['status_property'] == 3)Refinancing
                                        @elseif($dataCustomer['kpr']['status_property'] == 4)Renovasi
                                        @elseif($dataCustomer['kpr']['status_property'] == 5)Top Up
                                        @elseif($dataCustomer['kpr']['status_property'] == 6)Take Over
                                        @elseif($dataCustomer['kpr']['status_property'] == 7)Take Over Top Up
                                        @elseif($dataCustomer['kpr']['status_property'] == 8)Take Over Account In House (Cash Bertahap)
                                        @endif</p>
                                    @endif
                                </div>
                            </div>

                            

                            <div class="form-group {{ $classNameDeveloper }} {!! $errors->has('developer') ? 'has-error' : '' !!}" id="developer">
                                <label class="control-label col-md-3">Developer * :</label>
                                <div class="col-md-9">
                                    @if ($type != 'preview')
                                    {!! Form::select('developer', array($dataCustomer['kpr']['developer_id'] => $dataCustomer['kpr']['developer_name']), !empty($dataCustomer) ? $dataCustomer['kpr']['developer_id'] : old('developer'), [
                                        'class' => 'select2 developers ',
                                        'data-placeholder' => 'Pilih Developer',
                                        'data-bri' => ''
                                    ]) !!}
                                    @else
                                    <p>{{$dataCustomer['kpr']['developer_name']}}</p>
                                    @endif
                                </div>
                                <input type="hidden" name="developer_name" id="new_developer_name" value="{{$dataCustomer['kpr']['developer_name']}}">
                            </div>
                            
                            <div class="form-group {{ $classNameType }} {!! $errors->has('kpr_type_property') ? 'has-error' : '' !!}" id="kpr_type_property">
                                <label class="control-label col-md-3">Jenis Properti * :</label>
                                <div class="col-md-9">
                                    @if ($type != 'preview')
                                    {!! Form::select('kpr_type_property', array("" => "", "1" => "Rumah Tapak", "2" => "Rumah Susun/Apartment", "3" => "Rumah Toko"), !empty($dataCustomer) ? $dataCustomer['kpr']['kpr_type_property'] : old('kpr_type_property'), [
                                        'class' => 'select2 kpr_type_properties ',
                                        'data-placeholder' => 'Pilih Jenis Properti',
                                        'data-bri' => ''
                                    ]) !!}
                                    @else
                                        <p>@if($dataCustomer['kpr']['kpr_type_property'] == 1) Rumah Tapak
                                        @elseif($dataCustomer['kpr']['kpr_type_property'] == 2)Rumah Susun/Apartment
                                        @elseif($dataCustomer['kpr']['kpr_type_property'] == 3)Rumah Toko
                                        @endif</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $className }} {!! $errors->has('property_name') ? 'has-error' : '' !!}" id="property_name">
                                <label class="control-label col-md-3">Nama Proyek * :</label>
                                <div class="col-md-9">
                                    @if ($type != 'preview')
                                    {!! Form::select('property', [$dataCustomer['kpr']['property_id'] => $dataCustomer['kpr']['property_name']], old('property'), [
                                        'class' => 'select2 property_name',
                                        'data-placeholder' => 'Pilih Nama Proyek',
                                    ]) !!}
                                    @else
                                    <p>{{$dataCustomer['kpr']['property_name']}}</p>
                                    @endif
                                </div>
                                    <input type="hidden" name="property_name" id="new_property_name" value="{{$dataCustomer['kpr']['property_name']}}">
                            </div>

                            <div class="form-group {{ $className }} {!! $errors->has('property_type') ? 'has-error' : '' !!}" id="property_type">
                                <label class="control-label col-md-3">Tipe Properti * :</label>
                                <div class="col-md-9">
                                    @if ($type != 'preview')
                                    {!! Form::select('property_type', [$dataCustomer['kpr']['property_type'] => $dataCustomer['kpr']['property_type_name']], !empty($dataCustomer) ? $dataCustomer['kpr']['property_type'] : old('property_type'), [
                                        'class' => 'select2 property_type',
                                        'data-placeholder' => 'Pilih Nama Properti',
                                    ]) !!}
                                    <input type="hidden" name="property_type_name" id="new_property_type_name" value="{{$dataCustomer['kpr']['property_type_name']}}">
                                    @else
                                    <p>{{$dataCustomer['kpr']['property_type_name']}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $className }} {!! $errors->has('property_item') ? 'has-error' : '' !!}" id="property_unit">
                                <label class="control-label col-md-3">Unit Properti * :</label>
                                <div class="col-md-9">
                                    @if ($type != 'preview')
                                    {!! Form::select('property_item', [$dataCustomer['kpr']['property_item'] => $dataCustomer['kpr']['property_item_name']], !empty($dataCustomer) ? $dataCustomer['kpr']['property_item'] : old('property_item'), [
                                        'class' => 'select2 property_item',
                                        'data-placeholder' => 'Pilih Nama Properti',
                                    ]) !!}
                                    <input type="hidden" name="property_item_name" value="{{$dataCustomer['kpr']['property_item_name']}}">
                                    @else
                                    <p>{{$dataCustomer['kpr']['property_item_name']}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-horizontal" role="form">
                            <div class="form-group price {!! $errors->has('price') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-4">Harga Rumah * :</label>
                                <div class="col-md-8">
                                    @if ($type != 'preview')
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control numericOnly currency-rp " id="price" name="price" value="{{$dataCustomer['kpr']['price']}}" maxlength="16" readonly="">
                                        @if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
                                    </div>
                                    @else
                                    <p id="price">Rp {{number_format($dataCustomer['kpr']['price'], 2, ",", ".")}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group building_area {!! $errors->has('building_area') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-4">Luas Bangunan * :</label>
                                <div class="col-md-8">
                                    @if ($type != 'preview')
                                    <div class="input-group">
                                        <input type="text" class="form-control numericOnly " name="building_area" value="{{$dataCustomer['kpr']['building_area']}}" maxlength="4" placeholder="0" id="building_area" readonly="">
                                        <span class="input-group-addon">m<sup>2</sup></span>
                                        @if ($errors->has('building_area')) <p class="help-block">{{ $errors->first('building_area') }}</p> @endif
                                    </div>
                                    @else
                                    <p>{{$dataCustomer['kpr']['building_area']}} m<sup>2</sup></p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group home_location {!! $errors->has('home_location') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-4">Lokasi Rumah * :</label>
                                <div class="col-md-8">
                                    @if ($type != 'preview')
                                    <textarea class="form-control required" rows="3" maxlength="255" name="home_location" placeholder="Lokasi Rumah" id="home_location" readonly="">{{$dataCustomer['kpr']['home_location']}}</textarea>
                                    @else
                                    <p>{{$dataCustomer['kpr']['home_location']}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group year {!! $errors->has('year') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-4">Jangka Waktu * :</label>
                                <div class="col-md-8">
                                    @if ($type != 'preview')
                                    <div class="input-group">
                                        <input type="text" class="form-control numericOnly required " name="year" value="{{$dataCustomer['kpr']['year']}}" maxlength="3" placeholder="0" id="year" min="12">
                                        <span class="input-group-addon">Bulan</span>
                                        @if ($errors->has('year')) <p class="help-block">{{ $errors->first('year') }}</p> @endif
                                    </div>
                                    @else
                                    <p>{{$dataCustomer['kpr']['year']}} Bulan</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group active_kpr {!! $errors->has('active_kpr') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-4">KPR Aktif ke * :</label>
                                <div class="col-md-8">
                                    @if ($type != 'preview')
                                    {!! Form::select('active_kpr', array("" => "", "1" => "1", "2" => "2", "3" => "> 2"), $dataCustomer['kpr']['active_kpr'], [
                                        'class' => 'select2 active_kpr ',
                                        'id' => 'active_kpr',
                                        'data-placeholder' => 'Pilih KPR Aktif',
                                        'data-bri' => ''
                                    ]) !!}
                                    @else
                                    <p>@if($dataCustomer['kpr']['active_kpr'] == 1) 1
                                        @elseif($dataCustomer['kpr']['active_kpr'] == 2) 2
                                        @elseif($dataCustomer['kpr']['active_kpr'] == 3) > 2
                                        @endif</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group down_payment {!! $errors->has('down_payment') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-4">Uang Muka * :</label>
                                <div class="col-md-8">
                                    @if ($type != 'preview')
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control numericOnly currency-rp" value="{{($dataCustomer['kpr']['dp'] / 100) * $dataCustomer['kpr']['price']}}" maxlength="16" id="down_payment">
                                    </div><br>
                                    @else
                                        <p>Rp {{number_format(($dataCustomer['kpr']['dp'] / 100) * $dataCustomer['kpr']['price'], 2, ",", ".")}}</p>
                                    @endif

                                    @if ($type != 'preview')
                                    <div class="input-group">
                                        <input type="text" class="form-control numericOnly" name="dp" value="{{$dataCustomer['kpr']['dp']}}" maxlength="2" max="90" placeholder="0" id="dp" >
                                        <span class="input-group-addon">%</span>
                                    </div>
                                    @else
                                        <p>{{$dataCustomer['kpr']['dp']}} %</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group request_amount {!! $errors->has('request_amount') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-4">Jumlah Permohonan * :</label>
                                <div class="col-md-8">
                                    @if ($type != 'preview')
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control numericOnly currency-rp" name="request_amount" value="{{$dataCustomer['kpr']['request_amount']}}" maxlength="16" id="request_amount" readonly="">
                                        @if ($errors->has('request_amount')) <p class="help-block">{{ $errors->first('request_amount') }}</p> @endif
                                    </div>
                                    @else
                                        <p>Rp {{number_format($dataCustomer['kpr']['request_amount'], 2, ",", ".")}}</p>
                                    @endif
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--End-->