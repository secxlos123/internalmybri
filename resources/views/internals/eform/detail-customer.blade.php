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
                                    <p class="form-control-static" id="cust_nik">@if(!empty($dataCustomer['nik'])){{$dataCustomer['nik']}}@endif</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Lengkap :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">{{$dataCustomer['first_name']}} {{$dataCustomer['last_name']}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tempat Lahir :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['birth_place'])){{$dataCustomer['birth_place']}}@endif</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tanggal Lahir :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['birth_date'])){{$dataCustomer['birth_date']}}@endif</p>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-4 control-label">Alamat :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        @if(!empty($dataCustomer['address'])){{$dataCustomer['address']}}@endif
                                    </p>
                                </div>
                            </div> -->
                             <div class="form-group">
                                <label class="col-md-4 control-label">Jenis Kelamin :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['gender'])){{$dataCustomer['gender']}}@endif</p>
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
                                        {{($dataCustomer['status'] == 1) ? 'Belum Menikah' : ''}}
                                        {{($dataCustomer['status'] == 2) ? 'Menikah' : ''}}
                                        {{($dataCustomer['status'] == 3) ? 'Janda/Duda' : ''}}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['email']))
                                    {{$dataCustomer['email']}}@endif</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Gadis Ibu Kandung :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['mother_name'])){{$dataCustomer['mother_name']}}@endif</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">No. Handphone :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['mobile_phone'])){{$dataCustomer['mobile_phone']}}@endif</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(!empty($dataCustomer['status']) &&($dataCustomer['status'] == 2))
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
                                    <p class="form-control-static">@if(!empty($dataCustomer['couple_nik'])){{$dataCustomer['couple_nik']}}@endif</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Lengkap :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['couple_name'])){{$dataCustomer['couple_name']}}@endif</p>
                                </div>
                            </div>      
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tempat Lahir :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['couple_birth_place'])){{$dataCustomer['couple_birth_place']}}@endif</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tanggal Lahir :</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">@if(!empty($dataCustomer['couple_birth_date'])){{$dataCustomer['couple_birth_date']}}@endif</p>
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
                            <img src="@if(!empty($dataCustomer['identity'])){{$dataCustomer['identity']}}@endif" class="img-responsive">
                            <p>Foto KTP</p>
                        </div>
                    </div>
                    @if(!empty($dataCustomer['status']) &&($dataCustomer['status'] == 2))
                    <div class="col-md-6" align="center">
                        <div class="card-box">
                            <img src="@if(!empty($dataCustomer['couple_identity'])){{$dataCustomer['couple_identity']}}@endif" class="img-responsive">
                            <p>Foto KTP Pasangan</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
