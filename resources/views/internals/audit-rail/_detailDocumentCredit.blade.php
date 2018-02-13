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
                <li class="">
                    <a href="#eform" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                        <span class="hidden-xs">Data Pengajuan</span>
                    </a>
                </li>
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

                <div class="tab-pane" id="eform">
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

                <div class="tab-pane" id="visit_report">
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
            </div>
        </div>
    </div>
</div>
