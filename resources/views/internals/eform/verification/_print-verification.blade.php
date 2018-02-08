@section('title','MyBRI - Form Verify Data Nasabah')
@include('internals.layouts.head')
<style type="text/css">
    /*body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }*/
    @page {
        size: A4;
        margin: 0;
    }
    /*@media print {
        html, body {
            width: 210mm;
            height: 1000mm;
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
        .no-print, .no-print *
        {
            display: none !important;
        }
    }*/
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Verify Data Nasabah</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Home MyBRI</a>
                            </li>
                            <li>
                                <a href="{{route('indexAO')}}">Pengajuan</a>
                            </li>
                            <li class="active">
                                Verifikasi
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <form @if(!empty($dataCustomer)) action="{{route('verifyData', $dataCustomer['customer']['id'])}}" @endif method="POST" enctype="multipart/form-data" id="form1">
                    <!--Bundle of data eform-->
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
                                                    <label class="control-label col-md-4">Jenis KPR *:</label>
                                                    <div class="col-md-8">
                                                        <p>@if($dataCustomer['kpr']['status_property'] == 1) Baru
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
                                                    <label class="control-label col-md-4">Developer *:</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['kpr']['developer_name']}}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $classNameType }} {!! $errors->has('kpr_type_property') ? 'has-error' : '' !!}" id="kpr_type_property">
                                                    <label class="control-label col-md-4">Jenis Properti *:</label>
                                                    <div class="col-md-8">
                                                        <p>@if($dataCustomer['kpr']['kpr_type_property'] == 1) Rumah Tapak
                                                        @elseif($dataCustomer['kpr']['kpr_type_property'] == 2)Rumah Susun/Apartment
                                                        @elseif($dataCustomer['kpr']['kpr_type_property'] == 3)Rumah Toko
                                                        @endif</p>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $className }} {!! $errors->has('property_name') ? 'has-error' : '' !!}" id="property_name">
                                                    <label class="control-label col-md-4">Nama Proyek *:</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['kpr']['property_name']}}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $className }} {!! $errors->has('property_type') ? 'has-error' : '' !!}" id="property_type">
                                                    <label class="control-label col-md-4">Tipe Properti *:</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['kpr']['property_type_name']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group {{ $className }} {!! $errors->has('property_item') ? 'has-error' : '' !!}" id="property_unit">
                                                    <label class="control-label col-md-4">Unit Properti *:</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['kpr']['property_item_name']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group price {!! $errors->has('price') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Harga Rumah *:</label>
                                                    <div class="col-md-8">
                                                        <p>Rp {{number_format($dataCustomer['kpr']['price'], 2, ",", ".")}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group building_area {!! $errors->has('building_area') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Luas Bangunan *:</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['kpr']['building_area']}} m<sup>2</sup></p>
                                                    </div>
                                                </div>

                                                <div class="form-group home_location {!! $errors->has('home_location') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Lokasi Rumah *:</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['kpr']['home_location']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group year {!! $errors->has('year') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Jangka Waktu *:</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['kpr']['year']}} Bulan</p>
                                                    </div>
                                                </div>
                                                <div class="form-group active_kpr {!! $errors->has('active_kpr') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">KPR Aktif ke *:</label>
                                                    <div class="col-md-8">
                                                        <p>@if($dataCustomer['kpr']['active_kpr'] == 1) 1
                                                        @elseif($dataCustomer['kpr']['active_kpr'] == 2) 2
                                                        @elseif($dataCustomer['kpr']['active_kpr'] == 3) > 2
                                                        @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group down_payment {!! $errors->has('down_payment') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Uang Muka *:</label>
                                                    <div class="col-md-8">
                                                        <p>Rp {{number_format(($dataCustomer['kpr']['dp'] / 100) * $dataCustomer['kpr']['price'], 2, ",", ".")}}</p>
                                                        <p>{{$dataCustomer['kpr']['dp']}} %</p>
                                                    </div>
                                                </div>

                                                <div class="form-group request_amount {!! $errors->has('request_amount') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Jumlah Permohonan *:</label>
                                                    <div class="col-md-8">
                                                        <p>Rp {{number_format($dataCustomer['kpr']['request_amount'], 2, ",", ".")}}</p>
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
                    <!--Bundle of data pribadi-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pribadi</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="bg-inverse">Field</th>
                                                    <th>Data Nasabah</th>
                                                    <th>Data CIF {{$dataCustomer['cif']['cif_number']}}</th>
                                                    <th>Data Kemendagri</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php ( $arrayField = array("name" => "Nama Lengkap", "address" => "Alamat", "phone" => "No. Telepon", "mobile_phone" => "No. Handphone", "mother_name" => "Nama Gadis Ibu Kandung") )

                                                @foreach ($arrayField as $field => $label)
                                                    <tr>
                                                        <td class="align-middle bg-primary">{{ $label }}</td>
                                                        <td class="align-middle" id="{{ $field }}DF">{{ !empty($dataCustomer) ? $dataCustomer['customer'][$field] : (in_array(array('phone', 'mobile_phone'), $field) ? 0 : '' ) }}</td>
                                                        <td class="align-middle" id="{{ $field }}CIF">{{ !empty($dataCustomer) ? $dataCustomer['cif'][$field] : (in_array(array('phone', 'mobile_phone'), $field) ? 0 : '' ) }}</td>
                                                        <td class="align-middle" id="{{ $field }}KM">{{ !empty($dataCustomer) ? $dataCustomer['kemendagri'][$field] : (in_array(array('phone', 'mobile_phone'), $field) ? 0 : '' ) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Bundle of text field data pribadi-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <input type="hidden" name="cif_number" value="{{ $dataCustomer['cif']['cif_number'] }}">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">NIK * :</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <p>{{$dataCustomer['customer']['nik']}}</p>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Tempat Lahir * :</label>
                                                    <div class="col-md-9">
                                                        <p>{{$dataCustomer['customer']['birth_place']}}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group birth_date {!! $errors->has('birth_date') ? 'has-error' : '' !!}">
                                                    <label class="col-md-3 control-label">Tanggal Lahir * :</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <p>{{ $dataCustomer['customer']['birth_date'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Kota * :</label>
                                                    <div class="col-md-9">
                                                        <p>{{$dataCustomer['customer']['city']}}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Kode Pos * :</label>
                                                    <div class="col-md-9">
                                                        <p>{{$dataCustomer['customer']['zip_code']}}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-9">
                                                        <img id="preview" src="{{ $dataCustomer['customer']['identity'] }}" width="300">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Jenis Kelamin * :</label>
                                                    <div class="col-md-7">
                                                        <p>{{ isset($dataCustomer['customer']['gender']) &&($dataCustomer['customer']['gender'] == 'L') ? 'Laki-laki' : 'Perempuan'}}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group status {!! $errors->has('status') ? 'has-error' : '' !!}">
                                                    <label class="col-md-5 control-label">Status Pernikahan * :</label>
                                                    <div class="col-md-7">
                                                        <p>@if($dataCustomer['customer']['status'] == 1) Belum Menikah
                                                        @elseif($dataCustomer['customer']['status'] == 2)Menikah
                                                        @elseif($dataCustomer['customer']['status'] == 3)Janda / Duda
                                                        @endif</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Status Tempat Tinggal * :</label>
                                                    <div class="col-md-7">
                                                        <p>@if($dataCustomer['customer']['address_status'] == 0) Milik Sendiri
                                                        @elseif($dataCustomer['customer']['address_status'] == 1)Orang Tua / Mertua / Rumah Dinas
                                                        @elseif($dataCustomer['customer']['address_status'] == 3)Rumah Kontrakan
                                                        @endif</p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Kewarganegaraan * :</label>
                                                    <div class="col-md-7">
                                                        <p>{{ $dataCustomer['customer']['citizenship_name']}}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group email {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                    <label class="col-md-5 control-label">Email * :</label>
                                                    <div class="col-md-7">
                                                        <p>{{$dataCustomer['customer']['email']}}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group current_address {!! $errors->has('current_address') ? 'has-error' : '' !!}">
                                                    <label class="col-md-5 control-label">Alamat Domisili * :</label>
                                                    <div class="col-md-7">
                                                        <p>{{$dataCustomer['customer']['current_address']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!--End-->
                    </div>
                    <!--Bundle of data pasangan-->
                    <div class="row" id="couple_data" @if(($dataCustomer['customer']['couple_salary']) > 0 && ($dataCustomer['customer']['status']) == 2)) style="display:block;" @else style="display:none;" @endif >
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pasangan</h3>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" >
                                                <div class="form-group couple_nik ">
                                                    <label class="col-md-3 control-label">NIK Pasangan * :</label>
                                                    <div class="col-md-9">
                                                        <p>{{$dataCustomer['customer']['couple_nik']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label class="col-md-3 control-label">Nama Lengkap * :</label>
                                                    <div class="col-md-9">
                                                        <p>{{$dataCustomer['customer']['couple_name']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"></label>
                                                    <div class="col-md-9">
                                                        <img id="couple_preview" @if(!empty($dataCustomer['customer']['couple_identity'])) src="{{$dataCustomer['customer']['couple_identity']}}" @else src="{{ old('couple_identity') }}" @endif alt="KTP Pasangan" width="300">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group couple_birth_place_id {!! $errors->has('couple_birth_place_id') ? 'has-error' : '' !!}">
                                                    <label class="col-md-5 control-label">Tempat Lahir * :</label>
                                                    <div class="col-md-7">
                                                        <p>{{$dataCustomer['customer']['couple_birth_place']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group couple_birth_date {!! $errors->has('couple_birth_date') ? 'has-error' : '' !!}">
                                                    <label class="col-md-5 control-label">Tanggal Lahir * :</label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <p>{{$dataCustomer['customer']['couple_birth_date']}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--End-->
                    <!--Bundle of data pekerjaan-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pekerjaan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Bidang Pekerjaan * :</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['customer']['job_field_name']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Jenis Pekerjaan * :</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['customer']['job_type_name']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Pekerjaan * :</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['customer']['job_name']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Nama Perusahaan * :</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['customer']['company_name']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Jabatan * :</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['customer']['position_name']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group work_duration {!! $errors->has('work_duration') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Lama Kerja * :</label>
                                                    <div class="col-md-8">
                                                        <div class="col-md-4">
                                                            <p>{{$dataCustomer['customer']['work_duration']}}</p>
                                                        </div>
                                                        <label class="col-md-2 control-label">Tahun</label>
                                                        <div class="col-md-4">
                                                            <p>{{@$dataCustomer['customer']['work_duration_month']}}</p>
                                                        </div>
                                                        <label class="col-md-1 control-label">Bulan</label>
                                                    </div>
                                                </div>
                                                <div class="form-group office_address {!! $errors->has('office_address') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Alamat Kantor * :</label>
                                                    <div class="col-md-8">
                                                        <p>{{$dataCustomer['customer']['office_address']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--End-->
                    <!--Bundle of data finansial-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Keuangan</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-box m-t-30">
                                        <h4 class="m-t-min30 m-b-30 header-title custom-title">Nasabah</h4>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label title ="Take Home Pay Per Bulan" class="col-md-4 control-label">Gaji/Pendapatan * :</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <p>Rp {{ number_format($dataCustomer['customer']['salary'], 2, ",", ".") }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label title ="Rata-Rata Per Bulan" class="col-md-4 control-label">Pendapatan Lain :</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <p>Rp {{ number_format($dataCustomer['customer']['other_salary'], 2, ",", ".") }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label class="col-md-5 control-label">Angsuran Pinjaman Lain * :</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <p>Rp {{ number_format($dataCustomer['customer']['loan_installment'], 2, ",", ".")}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label title ="Anak Dalam Tanggungan" class="col-md-5 control-label">Jumlah Tanggungan :</label>
                                                            <div class="col-md-7">
                                                                <p>{{$dataCustomer['customer']['dependent_amount']}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Pasangan-->
                                <div class="col-md-12" id="couple_financial"@if(($dataCustomer['customer']['couple_salary']) > 0 && ($dataCustomer['customer']['source_income']) == 'joint')) style="display:block;" @else style="display:none;" @endif >
                                    <div class="card-box m-t-30">
                                        <h4 class="m-t-min30 m-b-30 header-title custom-title">Pasangan</h4>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <label title ="Take Home Pay Per Bulan" class="col-md-4 control-label">Gaji/Pendapatan * :</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <p>Rp {{number_format($dataCustomer['customer']['couple_salary'], 2, ",", ".")}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label title ="Rata-Rata Per Bulan" class="col-md-4 control-label">Pendapatan Lain :</label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <p>Rp {{number_format($dataCustomer['customer']['couple_other_salary'], 2, ",", ".")}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-horizontal">
                                                        <div class="form-group ">
                                                            <label class="col-md-5 control-label">Angsuran Permohonan :</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <p>Rp {{number_format($dataCustomer['customer']['couple_loan_installment'], 2, ",", ".")}}</p>
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
                    </div><!--End-->
                    <!--Bundle of data Emergency contact-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Keluarga/Kerabat Terdekat</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal">
                                                <div class="form-group ">
                                                    <label class="col-md-4 control-label">Nama * :</label>
                                                    <div class="col-md-8">
                                                        <p>{{ $dataCustomer['customer']['emergency_name'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">No. Handphone * :</label>
                                                    <div class="col-md-8">
                                                        <p>{{ $dataCustomer['customer']['emergency_contact'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal">

                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Hubungan * :</label>
                                                    <div class="col-md-8">
                                                        <p>{{ $dataCustomer['customer']['emergency_relation'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--End-->
                </form>
            </div>
        </div>
    </div>

    <!-- Script -->
    @include('internals.layouts.footer')