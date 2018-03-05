<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-horizontal" role="form">
                <div class="form-group {!! $errors->has('status_property') ? 'has-error' : '' !!}" id="status_property">
                    @php ( $className = ($eformData['kpr']['status_property'] == "1" && $eformData['kpr']['developer_id'] != ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                    @php ( $classNameType = ($eformData['kpr']['status_property'] != "1" || $eformData['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                    @php ( $classKPRType = ($eformData['kpr']['status_property'] != "1" && $eformData['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                    @php ( $classNameDeveloper = ($eformData['kpr']['status_property'] == "1") ? '' : 'hide' )
                    @if($eformData['kpr']['status_property'] == "1" && $eformData['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1))
                     <input type="hidden" name="status_property" id="status_property" value="1">
                    @elseif($eformData['kpr']['status_property'] == 2)
                     <input type="hidden" name="status_property" id="status_property" value="2">
                    @else
                     <input type="hidden" name="status_property" id="status_property" value="3">
                    @endif

                    <label class="control-label col-md-4">Jenis KPR *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="@if($eformData['kpr']['status_property'] == 1) Baru
                        @elseif($eformData['kpr']['status_property'] == 2)Secondary
                        @elseif($eformData['kpr']['status_property'] == 3)Refinancing
                        @elseif($eformData['kpr']['status_property'] == 4)Renovasi
                        @elseif($eformData['kpr']['status_property'] == 5)Top Up
                        @elseif($eformData['kpr']['status_property'] == 6)Take Over
                        @elseif($eformData['kpr']['status_property'] == 7)Take Over Top Up
                        @elseif($eformData['kpr']['status_property'] == 8)Take Over Account In House (Cash Bertahap)
                        @endif" maxlength="16" readonly="">
                    </div>
                </div>

                <div class="form-group {{ $classNameDeveloper }} {!! $errors->has('developer') ? 'has-error' : '' !!}" id="developer">
                    <label class="control-label col-md-4">Developer *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{$eformData['kpr']['developer_name']}}" maxlength="16" readonly="">
                    </div>
                </div>

                <div class="form-group {{ $classNameType }} {!! $errors->has('kpr_type_property') ? 'has-error' : '' !!}" id="kpr_type_property">
                    <label class="control-label col-md-4">Jenis Properti *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="@if($eformData['kpr']['kpr_type_property'] == 1) Rumah Tapak
                        @elseif($eformData['kpr']['kpr_type_property'] == 2)Rumah Susun/Apartment
                        @elseif($eformData['kpr']['kpr_type_property'] == 3)Rumah Toko
                        @endif" maxlength="16" readonly="">
                    </div>
                </div>

                <div class="form-group {{ $className }} {!! $errors->has('property_name') ? 'has-error' : '' !!}" id="property_name">
                    <label class="control-label col-md-4">Nama Proyek *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{$eformData['kpr']['property_name']}}" maxlength="16" readonly="">
                    </div>
                </div>

                <div class="form-group {{ $className }} {!! $errors->has('property_type') ? 'has-error' : '' !!}" id="property_type">
                    <label class="control-label col-md-4">Tipe Properti *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $eformData['kpr']['property_type_name'] }}" maxlength="16" readonly="">
                    </div>
                </div>
                <div class="form-group {{ $className }} {!! $errors->has('property_item') ? 'has-error' : '' !!}" id="property_unit">
                    <label class="control-label col-md-4">Unit Properti *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $eformData['kpr']['property_item_name'] }}" maxlength="16" readonly="">
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
                            <input type="text" class="form-control currency-rp" value="{{$eformData['kpr']['price']}}" maxlength="16" readonly="">
                        </div>
                    </div>
                </div>
                <div class="form-group building_area {!! $errors->has('building_area') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Luas Bangunan *:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{$eformData['kpr']['building_area']}}" maxlength="16" readonly="">
                            <span class="input-group-addon">M<sup>2</sup></span>
                        </div>
                    </div>
                </div>

                <div class="form-group home_location {!! $errors->has('home_location') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Lokasi Rumah *:</label>
                    <div class="col-md-8">
                        <textarea class="form-control required" rows="3" maxlength="255" placeholder="Lokasi Rumah" id="home_location" readonly="">{{$eformData['kpr']['home_location']}}</textarea>
                    </div>
                </div>
                <div class="form-group year {!! $errors->has('year') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Jangka Waktu *:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{$eformData['kpr']['year']}}" maxlength="16" readonly="">
                            <span class="input-group-addon">Bulan</span>
                        </div>
                    </div>
                </div>
                <div class="form-group active_kpr {!! $errors->has('active_kpr') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">KPR Aktif ke *:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="@if($eformData['kpr']['active_kpr'] == 1) 1
                        @elseif($eformData['kpr']['active_kpr'] == 2) 2
                        @elseif($eformData['kpr']['active_kpr'] == 3) > 2
                        @endif" maxlength="16" readonly="">
                    </div>
                </div>
                <div class="form-group down_payment {!! $errors->has('down_payment') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Uang Muka *:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" class="form-control numericOnly currency-rp" value="{{($eformData['kpr']['dp'] / 100) * $eformData['kpr']['price']}}" maxlength="16" id="down_payment" readonly="">
                            <!-- <span class="input-group-addon">,00</span> -->
                        </div><br>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{$eformData['kpr']['dp']}}" maxlength="16" readonly="">
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div>

                <div class="form-group request_amount {!! $errors->has('request_amount') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Jumlah Permohonan *:</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" class="form-control currency-rp" value="{{$eformData['kpr']['request_amount']}}" maxlength="16" readonly="">
                        </div>
                    </div>
                </div>
                <br>           
            </div>
        </div>
    </div>
</div>