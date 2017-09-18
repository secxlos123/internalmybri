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
                                    <p class="form-control-static" id="cust_nik">@if(!empty($dataCustomer['personal']['nik'])){{$dataCustomer['personal']['nik']}}@endif</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" id="cust_name">Nama Lengkap :</label>
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
                             <div class="form-group">
                                <label class="col-md-4 control-label">Jenis Kelamin :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['personal']['gender'])){{$dataCustomer['personal']['gender']}}@endif</p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form class="form-horizontal" role="form">
                           
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status Pernikahan :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                    {{($dataCustomer['personal']['status'] == "0") ? 'Tidak Menikah' : ''}}
                                    {{($dataCustomer['personal']['status'] == "1") ? 'Menikah' : ''}}
                                    {{($dataCustomer['personal']['status'] == "2") ? 'Duda' : ''}}
                                    {{($dataCustomer['personal']['status'] == "3") ? 'Janda' : ''}}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['personal']['email']))
                                    {{$dataCustomer['personal']['email']}}@endif</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Gadis Ibu Kandung :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['personal']['mother_name'])){{$dataCustomer['personal']['mother_name']}}@endif</p>
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
                </div>
            </div>
        </div>
    </div>
</div>

@if($dataCustomer)
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Data Pasangan</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-md-4 control-label">NIK :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{$dataCustomer['personal']['nik']}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Lengkap :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{$dataCustomer['personal']['name']}}</p>
                                </div>
                            </div>      
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tempat Lahir :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{$dataCustomer['personal']['birth_place']}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tanggal Lahir :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{$dataCustomer['personal']['birth_date']}}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row foto-nasabah">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            <img src="@if(!empty($dataCustomer['other']['identity'])){{$dataCustomer['other']['identity']}}@endif" class="img-responsive">
                            <p>Foto KTP</p>
                        </div>
                    </div>
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            <img src="@if(!empty($dataCustomer['other']['npwp'])){{$dataCustomer['other']['npwp']}}@endif" class="img-responsive">
                            <p>Foto KTP Pasangan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
