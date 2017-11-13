@section('title','My BRI - Detail Debitur')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Debitur "{{$dataCustomer['personal']['name']}}" </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('debitur.index')}}">Debitur</a>
                            </li>
                            <li class="active">
                                Detail Debitur
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#contact-info" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                                    <span class="hidden-xs">Contact Info</span>
                                </a>
                            </li>
                            <fieldset hidden>
                                <li class="">
                                    <a href="#schedule" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-user"></i></span>
                                        <span class="hidden-xs">Schedule</span>
                                    </a>
                                </li>
                            </fieldset>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="contact-info">
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
                                                                        @if($dataCustomer['personal']['status'] == 0) Belum Menikah @elseif($dataCustomer['personal']['status'] == 1) Menikah @elseif ($dataCustomer['personal']['status'] == 2) Janda @elseif($dataCustomer['personal']['status'] == 3) Duda @endif
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
    @include('internals.layouts.footer')
    @include('internals.layouts.foot')    