@section('title','My BRI - Detail Pihak ke-3')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Pihak ke-3 "{{$datas['name']}}" </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('third-party.index')}}">Pihak ke-3</a>
                            </li>
                            <li class="active">
                                Detail Pihak ke-3
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
                                <a href="#developer-info" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-info"></i></span>
                                    <span class="hidden-xs">Pihak ke-3 Info</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="developer-info">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <hr class="w-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Nama Pihak Ke-3 :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$datas['name']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Alamat Kantor :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$datas['address']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Kota :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$datas['city_name']}}</p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Alamat Email :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$datas['email']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">No. Telepon :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$datas['phone_number']}}</p>
                                                            </div>
                                                        </div>
                                                    </form>
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