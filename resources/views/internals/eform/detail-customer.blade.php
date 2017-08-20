<div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-color panel-primary">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Data Pribadi</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">NIK :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">@if(!empty($dataCustomer['personal']['nik'])){{$dataCustomer['personal']['nik']}}@endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Nama Lengkap :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">@if(!empty($dataCustomer['personal']['name'])){{$dataCustomer['personal']['name']}}@endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Tempat Lahir :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">@if(!empty($dataCustomer['personal']['birth_place'])){{$dataCustomer['personal']['birth_place']}}@endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Tanggal Lahir :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">@if(!empty($dataCustomer['personal']['birth_date'])){{$dataCustomer['personal']['birth_date']}}@endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Alamat :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">
                                                                                    @if(!empty($dataCustomer['personal']['address'])){{$dataCustomer['personal']['address']}}@endif
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Jenis Kelamin :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">@if(!empty($dataCustomer['personal']['gender'])){{$dataCustomer['personal']['gender']}}@endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Kewarganegaraan :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">@if(!empty($dataCustomer['personal']['citizenship'])){{$dataCustomer['personal']['citizenship']}}@endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Status Pernikahan :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">
                                                                            @if(!empty($dataCustomer['personal']['status']))
                                                                                @if($dataCustomer['personal']['status'] == 0) Tidak Menikah @elseif($dataCustomer['personal']['status'] == 1) Menikah @elseif ($dataCustomer['personal']['status'] == 2) Janda @elseif($dataCustomer['personal']['status'] == 3) Duda @endif
                                                                            @endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Status Tempat Tinggal :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">
                                                                        @if(!empty($dataCustomer['personal']['address_status']))
                                                                            @if($dataCustomer['personal']['address_status'] == 'menetap') Permanen @else Sementara @endif
                                                                        @endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Email :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">@if(!empty($dataCustomer['personal']['email']))
                                                                                {{$dataCustomer['personal']['email']}}@endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Nama Gadis Ibu Kandung :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">@if(!empty($dataCustomer['personal']['mother_name'])){{$dataCustomer['personal']['mother_name']}}@endif</p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-color panel-primary">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Data Pekerjaan</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Jenis Pekerjaan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">@if($dataCustomer['work']['type'] == 'swasta') Pegawai Swasta @else Pegawai Negeri @endif</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Pekerjaan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">{{$dataCustomer['work']['work']}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Nama Perusahaan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">{{$dataCustomer['work']['company_name']}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Bidang Pekerjaan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">{{$dataCustomer['work']['work_field']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Jabatan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">{{$dataCustomer['work']['position']}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Lama Kerja :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">{{$dataCustomer['work']['work_duration']}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Alamat Kantor :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">
                                                                                    {{$dataCustomer['work']['office_address']}}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-color panel-primary">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Data Finansial</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Gaji/Pendapatan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">Rp{{number_format($dataCustomer['financial']['salary'],2,',','.')}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Pendapatan Lain :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">Rp{{number_format($dataCustomer['financial']['other_salary'],2,',','.')}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Angsuran Pinjaman :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">Rp{{number_format($dataCustomer['financial']['loan_installment'],2,',','.')}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Jumlah Tanggungan :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">{{$dataCustomer['financial']['dependent_amount']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-color panel-primary">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Data Contact Person</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">No. Telepon :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">{{$dataCustomer['contact']['phone']}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">No. Handphone :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">{{$dataCustomer['contact']['mobile_phone']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Emergency Contact :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">{{$dataCustomer['contact']['emergency_contact']}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Hubungan :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">{{$dataCustomer['contact']['emergency_relation']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row foto-nasabah">
                                                <div class="col-md-12">
                                                    <div class="panel panel-color panel-primary">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Data Pendukung</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4" align="center">
                                                                    <div class="card-box">
                                                                        <img src="@if(!empty($dataCustomer['other']['identity'])){{$dataCustomer['other']['identity']}}@endif" class="img-responsive">
                                                                        <p>Foto KTP</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" align="center">
                                                                    <div class="card-box">
                                                                        <img src="@if(!empty($dataCustomer['other']['npwp'])){{$dataCustomer['other']['npwp']}}@endif" class="img-responsive">
                                                                        <p>Foto NPWP</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" align="center">
                                                                    <div class="card-box">
                                                                        <img src="{{$dataCustomer['other']['image']}}" class="img-responsive">
                                                                        <p>Foto Nasabah</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>