@php ( $className = ($dataCustomer['kpr']['status_property'] == "1" && $dataCustomer['kpr']['developer_id'] != ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
@php ( $classNameType = ($dataCustomer['kpr']['status_property'] != "1" || $dataCustomer['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
@php ( $classKPRType = ($dataCustomer['kpr']['status_property'] != "1" && $dataCustomer['kpr']['developer_id'] == ENV('DEVELOPER_KEY', 1)) ? '' : 'hide' )
@php ( $classNameDeveloper = ($dataCustomer['kpr']['status_property'] == "1") ? '' : 'hide' )
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
                            <div class="form-group">
                                <label class="col-md-5 control-label">No. Referensi Pengajuan :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">{{$dataCustomer['ref_number']}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Jumlah Permohonan :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">Rp. {{ number_format($dataCustomer['nominal'], 2, ",", ".") }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Nama Produk :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">{{strtoupper($dataCustomer['product_type'])}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Jenis KPR :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">@if($dataCustomer['kpr']['status_property'] == 1) Baru
                                        @elseif($dataCustomer['kpr']['status_property'] == 2)Secondary
                                        @elseif($dataCustomer['kpr']['status_property'] == 3)Refinancing
                                        @elseif($dataCustomer['kpr']['status_property'] == 4)Renovasi
                                        @elseif($dataCustomer['kpr']['status_property'] == 5)Top Up
                                        @elseif($dataCustomer['kpr']['status_property'] == 6)Take Over
                                        @elseif($dataCustomer['kpr']['status_property'] == 7)Take Over Top Up
                                        @elseif($dataCustomer['kpr']['status_property'] == 8)Take Over Account In House (Cash Bertahap)
                                    @endif</p>
                                </div>
                            </div>
                            <div class="form-group {{ $classNameDeveloper }} {!! $errors->has('developer') ? 'has-error' : '' !!}" id="developer">
                                <label class="control-label col-md-5">Developer :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">{{$dataCustomer['kpr']['developer_name']}}</p>
                                </div>
                            </div>

                            <div class="form-group {{ $classNameType }} {!! $errors->has('kpr_type_property') ? 'has-error' : '' !!}" id="kpr_type_property">
                                <label class="control-label col-md-5">Jenis Properti :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">@if($dataCustomer['kpr']['kpr_type_property'] == 1) Rumah Tapak
                                        @elseif($dataCustomer['kpr']['kpr_type_property'] == 2)Rumah Susun/Apartment
                                        @elseif($dataCustomer['kpr']['kpr_type_property'] == 3)Rumah Toko
                                    @endif </p>
                                </div>
                            </div>

                            <div class="form-group {{ $className }} {!! $errors->has('property_name') ? 'has-error' : '' !!}" id="property_name">
                                <label class="control-label col-md-5">Nama Proyek :</label>
                                <div class="col-md-7">
                                   <p class="form-control-static">{{$dataCustomer['kpr']['property_name']}} </p>
                               </div>
                           </div>

                            <div class="form-group {{ $className }} {!! $errors->has('property_type') ? 'has-error' : '' !!}" id="property_type">
                            <label class="control-label col-md-5">Tipe Properti :</label>
                            <div class="col-md-7">
                                <p class="form-control-static">{{$dataCustomer['kpr']['property_type_name']}} </p>
                            </div>
                            </div>
                            <div class="form-group {{ $className }} {!! $errors->has('property_item') ? 'has-error' : '' !!}" id="property_unit">
                                <label class="control-label col-md-5">Unit Properti :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">{{$dataCustomer['kpr']['property_item_name']}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-md-5 control-label">Pengaju :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">{{$dataCustomer['ao_name']}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Kantor Cabang :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">{{ isset($dataCustomer['branch']) ? $dataCustomer['branch'] : '' }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Tanggal Pertemuan :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">{{$dataCustomer['appointment_date']}}</p>
                                </div>
                            </div>
                            <div class="form-group price {!! $errors->has('price') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-5">Harga Rumah :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">Rp {{number_format($dataCustomer['kpr']['price'], 2, ",", ".")}}</p>
                                </div>
                            </div>
                            <div class="form-group building_area {!! $errors->has('building_area') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-5">Luas Bangunan :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">{{$dataCustomer['kpr']['building_area']}} M<sup>2</sup></p>
                                </div>
                            </div>

                            <div class="form-group home_location {!! $errors->has('home_location') ? 'has-error' : '' !!}">
                                <label class="control-label col-md-5">Lokasi Rumah :</label>
                                <div class="col-md-7">
                                    <p class="form-control-static">{{$dataCustomer['kpr']['home_location']}}</p>
                                </div>
                                <div class="form-group year {!! $errors->has('year') ? 'has-error' : '' !!}">
                                    <label class="control-label col-md-5">Jangka Waktu :</label>
                                    <div class="col-md-7">
                                        <p class="form-control-static">{{$dataCustomer['kpr']['year']}} Bulan</p>
                                    </div>
                                </div>
                                <div class="form-group active_kpr {!! $errors->has('active_kpr') ? 'has-error' : '' !!}">
                                    <label class="control-label col-md-5">KPR Aktif ke :</label>
                                    <div class="col-md-7">
                                        <p class="form-control-static">@if($dataCustomer['kpr']['active_kpr'] == 1) 1
                                            @elseif($dataCustomer['kpr']['active_kpr'] == 2) 2
                                            @elseif($dataCustomer['kpr']['active_kpr'] == 3) > 2
                                        @endif</p>
                                    </div>
                                </div>
                                <div class="form-group down_payment {!! $errors->has('down_payment') ? 'has-error' : '' !!}">
                                    <label class="control-label col-md-5">Uang Muka :</label>
                                    <div class="col-md-7">
                                        <p class="form-control-static">Rp {{number_format(($dataCustomer['kpr']['dp'] / 100) * $dataCustomer['kpr']['price'], 2, ",", ".")}}</p>
                                    </div>
                                </div>

                                <div class="form-group request_amount {!! $errors->has('request_amount') ? 'has-error' : '' !!}">
                                    <label class="control-label col-md-5">Jumlah Permohonan :</label>
                                    <div class="col-md-7">
                                        <p class="form-control-static">Rp {{number_format($dataCustomer['kpr']['request_amount'], 2, ",", ".")}}</p>
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