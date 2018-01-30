<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-horizontal" role="form">
                <div class="form-group {!! $errors->has('status_property') ? 'has-error' : '' !!}" id="status_property">
                    @php ( $className = ($eformData['kpr']['status_property'] == "1" && $eformData['kpr']['developer_id'] != ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                    @php ( $classNameType = ($eformData['kpr']['status_property'] != "1" || $eformData['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                    @php ( $classKPRType = ($eformData['kpr']['status_property'] != "1" && $eformData['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
                    @php ( $classNameDeveloper = ($eformData['kpr']['status_property'] == "1") ? '' : 'hide' )

                    <label class="control-label col-md-4">Jenis KPR :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['kpr']['status_property_name'] }}</p>
                    </div>
                </div>

                <div class="form-group {{ $classNameDeveloper }} {!! $errors->has('developer') ? 'has-error' : '' !!}" id="developer">
                    <label class="control-label col-md-4">Developer :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['kpr']['developer_name'] }}</p>
                    </div>
                </div>

                <div class="form-group {{ $classNameType }} {!! $errors->has('kpr_type_property') ? 'has-error' : '' !!}" id="kpr_type_property">
                    <label class="control-label col-md-4">Jenis Properti :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['kpr']['kpr_type_property_name'] }}</p>
                    </div>
                </div>

                <div class="form-group {{ $className }} {!! $errors->has('property_name') ? 'has-error' : '' !!}" id="property_name">
                    <label class="control-label col-md-4">Nama Proyek :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['kpr']['property_name'] }}</p>
                    </div>
                </div>

                <div class="form-group {{ $className }} {!! $errors->has('property_type') ? 'has-error' : '' !!}" id="property_type">
                    <label class="control-label col-md-4">Tipe Properti :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['kpr']['property_type_name'] }}</p>
                    </div>
                </div>
                <div class="form-group {{ $className }} {!! $errors->has('property_item') ? 'has-error' : '' !!}" id="property_unit">
                    <label class="control-label col-md-4">Unit Properti :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['kpr']['property_item_name'] }}</p>
                    </div>
                </div>
                <div class="form-group building_area {!! $errors->has('building_area') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Luas Bangunan :</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <p class="form-control-static">{{$eformData['kpr']['building_area']}} M<sup>2</sup></p>
                        </div>
                    </div>
                </div>

                <div class="form-group home_location {!! $errors->has('home_location') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Lokasi Rumah :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{$eformData['kpr']['home_location'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-horizontal" role="form">
                <div class="form-group price {!! $errors->has('price') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Harga Rumah :</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <p class="form-control-static">Rp. {{number_format($eformData['kpr']['price'],2,',','.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group year {!! $errors->has('year') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Jangka Waktu :</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <p class="form-control-static">{{$eformData['kpr']['year'] }} Bulan</p>
                        </div>
                    </div>
                </div>
                <div class="form-group active_kpr {!! $errors->has('active_kpr') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">KPR Aktif ke :</label>
                    <div class="col-md-8">
                        <p class="form-control-static">{{($eformData['kpr']['active_kpr'] > 2 ) ? '>2' : $eformData['kpr']['active_kpr'] }}</p>
                    </div>
                </div>
                <div class="form-group down_payment {!! $errors->has('down_payment') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Uang Muka :</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <p class="form-control-static">Rp. {{number_format($eformData['kpr']['down_payment'], 2, ',','.')}}</p>
                        </div><br>
                        <div class="input-group">
                            <p class="form-control-static"> {{($eformData['kpr']['dp'])}} %</p>
                        </div>
                    </div>
                </div>

                <div class="form-group request_amount {!! $errors->has('request_amount') ? 'has-error' : '' !!}">
                    <label class="control-label col-md-4">Jumlah Permohonan :</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <p class="form-control-static">Rp. {{number_format($eformData['kpr']['request_amount'], 2, ',','.')}}</p>
                        </div>
                    </div>
                </div>
                <br>           
            </div>
        </div>
    </div>
</div>