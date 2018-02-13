<div class="row">
    <div class="col-md-12">
        <div class="">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#personal" data-toggle="tab" aria-expanded="true">
                        <span class="visible-xs"><i class="fa fa-info"></i></span>
                        <span class="hidden-xs">Data Pribadi</span>
                    </a>
                </li>
                <li class="">
                    <a href="#work" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-phone"></i></span>
                        <span class="hidden-xs">Data Pekerjaan</span>
                    </a>
                </li>
                <li class="">
                    <a href="#finance" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                        <span class="hidden-xs">Data Keuangan</span>
                    </a>
                </li>
                <li class="">
                    <a href="#family" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                        <span class="hidden-xs">Data Keluarga</span>
                    </a>
                </li>
                <li class="">
                    <a href="#other" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                        <span class="hidden-xs">Lain-lain</span>
                    </a>
                </li>
                <!-- <li class="">
                    <a href="#eform" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                        <span class="hidden-xs">Data Pengajuan</span>
                    </a>
                </li> -->
                <li class="">
                    <a href="#visit_report" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                        <span class="hidden-xs">Dokumen Kunjungan</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="personal">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pribadi</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">NIK :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static" id="cust_nik">@if(!empty($dataCustomer['customer']['personal']['nik'])){{$dataCustomer['customer']['personal']['nik']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Lengkap :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">{{$dataCustomer['customer']['personal']['first_name']}} {{$dataCustomer['customer']['personal']['last_name']}}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Tempat Lahir :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['birth_place'])){{$dataCustomer['customer']['personal']['birth_place']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Tanggal Lahir :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['birth_date'])){{$dataCustomer['customer']['personal']['birth_date']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Alamat :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">
                                                            @if(!empty($dataCustomer['customer']['personal']['address'])){{$dataCustomer['customer']['personal']['address']}}@else - @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jenis Kelamin :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['gender'])){{$dataCustomer['customer']['personal']['gender']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Status Pernikahan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">
                                                            @if(!empty($dataCustomer['customer']['personal']['status'])){{$dataCustomer['customer']['personal']['status']}}@else - @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Email :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['email']))
                                                        {{$dataCustomer['customer']['personal']['email']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Gadis Ibu Kandung :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['mother_name'])){{$dataCustomer['customer']['personal']['mother_name']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">No. Handphone :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['mobile_phone'])){{$dataCustomer['customer']['personal']['mobile_phone']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty($dataCustomer['customer']['personal']['status_id']) &&($dataCustomer['customer']['personal']['status_id'] == 2))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pasangan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">NIK :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['couple_nik'])){{$dataCustomer['customer']['personal']['couple_nik']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Lengkap :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['couple_name'])){{$dataCustomer['customer']['personal']['couple_name']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Tempat Lahir :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['couple_birth_place'])){{$dataCustomer['customer']['personal']['couple_birth_place']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Tanggal Lahir :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['personal']['couple_birth_date'])){{$dataCustomer['customer']['personal']['couple_birth_date']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="tab-pane" id="work">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pekerjaan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Bidang Pekerjaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static" id="cust_nik">@if(!empty($dataCustomer['customer']['work']['work_field'])){{$dataCustomer['customer']['work']['work_field']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jenis Pekerjaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['type'])){{$dataCustomer['customer']['work']['type']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Pekerjaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['customer']['work'])){{$dataCustomer['customer']['work']['customer']['work']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Perusahaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['company_name'])){{$dataCustomer['customer']['work']['company_name']}}@else - @endif</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">

                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jabatan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">
                                                            @if(!empty($dataCustomer['customer']['work']['position'])){{$dataCustomer['customer']['work']['position']}}@else - @endif
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Lama Kerja :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['work_duration'])){{$dataCustomer['customer']['work']['work_duration']}} Tahun {{$dataCustomer['customer']['work']['work_duration_month']}} Bulan @else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Alamat Kantor :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['office_address'])){{$dataCustomer['customer']['work']['office_address']}}@else - @endif</p>
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

                <div class="tab-pane" id="finance">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Keuangan</h3>
                                </div>
                                <div class="card-box m-t-30">
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Customer</h4>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Gaji/Pendapatan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['customer']['financial']['salary'])){{$dataCustomer['customer']['financial']['salary']}}@else - @endif</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Pendapatan Lain :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['customer']['financial']['other_salary'])){{$dataCustomer['customer']['financial']['other_salary']}}@else - @endif</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">

                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Angsuran Permohonan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">
                                                                @if(!empty($dataCustomer['customer']['financial']['loan_installment'])){{$dataCustomer['customer']['financial']['loan_installment']}}@else - @endif
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Jumlah Tanggungan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['customer']['financial']['dependent_amount'])){{$dataCustomer['customer']['financial']['dependent_amount']}}@else - @endif</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($dataCustomer['customer']['financial']['status_finance'] == "Join Income"))
                                <div class="card-box m-t-30">
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Pasangan</h4>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Gaji/Pendapatan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['customer']['financial']['salary_couple'])){{$dataCustomer['customer']['financial']['salary_couple']}}@else - @endif</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Pendapatan Lain :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['customer']['financial']['other_salary_couple'])){{$dataCustomer['customer']['financial']['other_salary_couple']}}@else - @endif</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">

                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Angsuran Permohonan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">
                                                                @if(!empty($dataCustomer['customer']['financial']['loan_installment_couple'])){{$dataCustomer['customer']['financial']['loan_installment_couple']}}@else - @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="family">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Keluarga</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['contact']['emergency_name'])){{$dataCustomer['customer']['contact']['emergency_name']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nomor Handphone :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['contact']['emergency_contact'])){{$dataCustomer['customer']['contact']['emergency_contact']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Hubungan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['contact']['emergency_relation'])){{$dataCustomer['customer']['contact']['emergency_relation']}}@else - @endif
                                                        </p>
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

                <div class="tab-pane" id="other">
                    <div class="row foto-nasabah">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Lain-lain</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6" align="center">
                                            <div class="card-box">
                                                @if((pathinfo(strtolower($dataCustomer['customer']['other']['identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['customer']['other']['identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['customer']['other']['identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                    @if(strpos($dataCustomer['customer']['other']['identity'], 'noimage.jpg'))
                                                    <p>Foto KTP Kosong</p>
                                                    @else
                                                    <img src="@if(!empty($dataCustomer['customer']['other']['identity'])){{$dataCustomer['customer']['other']['identity']}}@endif" class="img-responsive">
                                                    <p>Foto KTP</p>
                                                    @endif
                                                @else
                                                    <a href="@if(!empty($dataCustomer['customer']['other']['identity'])){{$dataCustomer['customer']['other']['identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                    <p>Klik Untuk Lihat Foto KTP</p>
                                                @endif
                                            </div>
                                        </div>
                                        @if(!empty($dataCustomer['customer']['personal']['status_id'])&&($dataCustomer['customer']['personal']['status_id'] == 2))
                                        <div class="col-md-6" align="center">
                                            <div class="card-box">
                                                @if((pathinfo(strtolower($dataCustomer['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['customer']['personal']['couple_identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                    @if(strpos($dataCustomer['customer']['personal']['couple_identity'], 'noimage.jpg'))
                                                    <p>Foto KTP Pasangan Kosong</p>
                                                    @else
                                                    <img src="@if(!empty($dataCustomer['customer']['personal']['couple_identity'])){{$dataCustomer['customer']['personal']['couple_identity']}}@endif" class="img-responsive">
                                                    <p>Foto KTP Pasangan</p>
                                                    @endif
                                                @else
                                                    <a href="@if(!empty($dataCustomer['customer']['personal']['couple_identity'])){{$dataCustomer['customer']['personal']['couple_identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                    <p>Klik Untuk Lihat Foto KTP Pasangan</p>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="tab-pane" id="eform">
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
                                                    <label class="col-md-6 control-label">Bidang Pekerjaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static" id="cust_nik">@if(!empty($dataCustomer['customer']['work']['work_field'])){{$dataCustomer['customer']['work']['work_field']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jenis Pekerjaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['type'])){{$dataCustomer['customer']['work']['type']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Pekerjaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['customer']['work'])){{$dataCustomer['customer']['work']['customer']['work']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Perusahaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['company_name'])){{$dataCustomer['customer']['work']['company_name']}}@else - @endif</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">

                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jabatan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">
                                                            @if(!empty($dataCustomer['customer']['work']['position'])){{$dataCustomer['customer']['work']['position']}}@else - @endif
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Lama Kerja :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['work_duration'])){{$dataCustomer['customer']['work']['work_duration']}} Tahun {{$dataCustomer['customer']['work']['work_duration_month']}} Bulan @else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Alamat Kantor :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['customer']['work']['office_address'])){{$dataCustomer['customer']['work']['office_address']}}@else - @endif</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="tab-pane" id="visit_report">
                    <div class="row">
                        <div class="col-md-12">
                            @if(!empty($dataCustomer['visit_report']))
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Dokumen Kunjungan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-horizontal" role="form">
                                                <div class="row">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">Dokumen Pendukung</h4>
                                                    </div>
                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['npwp']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['npwp']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['npwp'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['npwp'], 'noimage.jpg'))
                                                                <p>Foto NPWP Kosong</p>
                                                                <img class="img-responsive" id="zoom">
                                                                @else
                                                                <img src="{{$dataCustomer['visit_report']['npwp']}}" class="img-responsive" id="zoom">
                                                                <p>Foto NPWP</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['npwp'])){{$dataCustomer['visit_report']['npwp']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Foto NPWP</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @if($dataCustomer['visit_report']['source'] == 'fixed')
                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['salary_slip']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['salary_slip']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['salary_slip'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['salary_slip'], 'noimage.jpg'))
                                                                <p>Slip Gaji Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['salary_slip'])){{$dataCustomer['visit_report']['salary_slip']}}@endif" class="img-responsive">
                                                                <p>Slip Gaji</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['salary_slip'])){{$dataCustomer['visit_report']['salary_slip']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Slip Gaji</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            <img src="@if(!empty($dataCustomer['visit_report']['license_of_practice'])){{$dataCustomer['visit_report']['license_of_practice']}}@endif" class="img-responsive">
                                                            <p>Izin Praktek</p>
                                                        </div>
                                                    </div> -->

                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['work_letter']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['work_letter']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['work_letter'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['work_letter'], 'noimage.jpg'))
                                                                <p>Surat Keterangan Kerja Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['work_letter'])){{$dataCustomer['visit_report']['work_letter']}}@endif" class="img-responsive">
                                                                <p>Surat Keterangan Kerja</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['work_letter'])){{$dataCustomer['visit_report']['work_letter']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Surat Keterangan Kerja</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                @if($dataCustomer['visit_report']['source'] == 'nonfixed')
                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['legal_bussiness_document']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['legal_bussiness_document'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['legal_bussiness_document'], 'noimage.jpg'))
                                                                <p>Dokumen Legal Usaha Kosong</p>
                                                                @else
                                                                <img src="{{$dataCustomer['visit_report']['legal_bussiness_document']}}" class="img-responsive">
                                                                <p>Klik Untuk Lihat Dokumen Legal Usaha</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['legal_bussiness_document'])){{$dataCustomer['visit_report']['legal_bussiness_document']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Dokumen Legal Usaha</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['family_card']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['family_card']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['family_card'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['family_card'], 'noimage.jpg'))
                                                                <p>Kartu Keluarga Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['family_card'])){{$dataCustomer['visit_report']['family_card']}}@endif" class="img-responsive">
                                                                <p>Kartu Keluarga</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['family_card'])){{$dataCustomer['visit_report']['family_card']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Kartu Keluarga</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @if(!empty($dataCustomer['customer']['personal']['status_id'] > 1))
                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['marrital_certificate']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['marrital_certificate']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['marrital_certificate'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['marrital_certificate'], 'noimage.jpg'))
                                                                <p>Akta Nikah/Cerai Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['marrital_certificate'])){{$dataCustomer['visit_report']['marrital_certificate']}}@endif" class="img-responsive">
                                                                <p>Akta Nikah/Cerai</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['marrital_certificate'])){{$dataCustomer['visit_report']['marrital_certificate']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Akta Nikah/Cerai</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(($dataCustomer['customer']['financial']['status_finance'] != "Join Income") && ($dataCustomer['customer']['personal']['status_id'] == 2 ))
                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['divorce_certificate']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['divorce_certificate']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['divorce_certificate'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['divorce_certificate'], 'noimage.jpg'))
                                                                <p>Akta Pisah Harta Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['divorce_certificate'])){{$dataCustomer['visit_report']['divorce_certificate']}}@endif" class="img-responsive">
                                                                <p>Akta Pisah Harta</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['divorce_certificate'])){{$dataCustomer['visit_report']['divorce_certificate']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Akta Pisah Harta</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            <img src="@if(!empty($dataCustomer['visit_report']['photo_with_customer'])){{$dataCustomer['visit_report']['photo_with_customer']}}@endif" class="img-responsive">
                                                            <p>Foto Debitur</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['offering_letter']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['offering_letter'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                 @if(strpos($dataCustomer['visit_report']['offering_letter'], 'noimage.jpg'))
                                                                <p>Surat Penawaran Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['offering_letter'])){{$dataCustomer['visit_report']['offering_letter']}}@endif" class="img-responsive">
                                                                <p>Surat Penawaran</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['offering_letter'])){{$dataCustomer['visit_report']['offering_letter']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Surat Penawaran</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['down_payment']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['down_payment']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['down_payment'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['down_payment'], 'noimage.jpg'))
                                                                <p>Bukti DP Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['down_payment'])){{$dataCustomer['visit_report']['down_payment']}}@endif" class="img-responsive">
                                                                <p>Bukti DP</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['down_payment'])){{$dataCustomer['visit_report']['down_payment']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Bukti DP</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if(($dataCustomer['visit_report']['use_reason'] == 2)||($dataCustomer['visit_report']['use_reason'] == 18))
                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['proprietary']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['proprietary']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['proprietary'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['proprietary'], 'noimage.jpg'))
                                                                <p>Surat Hak Milik Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['proprietary'])){{$dataCustomer['visit_report']['proprietary']}}@endif" class="img-responsive">
                                                                <p>Surat Hak Milik</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['proprietary'])){{$dataCustomer['visit_report']['proprietary']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Surat Hak Milik</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['building_permit']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['building_permit']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['building_permit'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['building_permit'], 'noimage.jpg'))
                                                                <p>Izin Mendirikan Bangunan Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['building_permit'])){{$dataCustomer['visit_report']['building_permit']}}@endif" class="img-responsive">
                                                                <p>Izin Mendirikan Bangunan</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['building_permit'])){{$dataCustomer['visit_report']['building_permit']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Izin Mendirikan Bangunan</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @endif

                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['building_tax']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['building_tax']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['building_tax'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['building_tax'], 'noimage.jpg'))
                                                                <p>PBB Terakhir Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['building_tax'])){{$dataCustomer['visit_report']['building_tax']}}@endif" class="img-responsive">
                                                                <p>PBB Terakhir</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['building_tax'])){{$dataCustomer['visit_report']['building_tax']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat PBB Terakhir</p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" align="center">
                                                        <div class="card-box">
                                                            @if((pathinfo(strtolower($dataCustomer['visit_report']['other_document']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['visit_report']['other_document']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['visit_report']['other_document'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                                @if(strpos($dataCustomer['visit_report']['other_document'], 'noimage.jpg'))
                                                                <p>Dokumen Lainnya Kosong</p>
                                                                @else
                                                                <img src="@if(!empty($dataCustomer['visit_report']['other_document'])){{$dataCustomer['visit_report']['other_document']}}@endif" class="img-responsive">
                                                                <p>Dokumen Lainnya</p>
                                                                @endif
                                                            @else
                                                                <a href="@if(!empty($dataCustomer['visit_report']['other_document'])){{$dataCustomer['visit_report']['other_document']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                                <p>Klik Untuk Lihat Dokumen Lainnya</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
