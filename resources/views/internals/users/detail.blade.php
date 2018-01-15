@section('title','MyBRI - Detail User')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Detail User "{{$dataUser['fullname']}}" </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('users.index')}}">Manajemen User</a>
                                        </li>
                                        <li class="active">
                                            Detail User
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data User</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">NIP :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static">{{$dataUser['nip']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Nama Lengkap :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static">{{$dataUser['fullname']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Tempat Lahir :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static">Jakarta</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Tanggal Lahir :</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <p class="form-control-static">12 Februari 1985</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Alamat :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static">
                                                                Jl. Buah Batu No. 15 <br>
                                                                Kelurahan Cijagra, Kecamatan Lengkong <br>
                                                                Bandung 40264
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Kelamin :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$dataUser['gender']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$dataUser['email']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Telepon :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$dataUser['phone']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Handphone :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$dataUser['mobile_phone']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Role :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{$dataUser['role_name']}}</p>
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
                                                        <label class="col-md-3 control-label">Jabatan :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static">{{$dataUser['position']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Kantor Cabang :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static">{{$dataUser['office_name']}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Alamat Kantor :</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static">
                                                                Jl. Titimplik No. 15 <br>
                                                                Kelurahan Cijagra, Kecamatan Lengkong <br>
                                                                Tangerang 40345
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

                    </div>
                </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')    