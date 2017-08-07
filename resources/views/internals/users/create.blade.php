@section('title','Dashboard')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tambah User </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/users')}}">Manajemen User</a>
                                        </li>
                                        <li class="active">
                                            Tambah User
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Nama Depan :</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="first_name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Nama Belakang :</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="last_name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Email :</label>
                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Password :</label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" name="password" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Ulangi Password :</label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" name="password" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Role :</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="role">
                                                            <option value="0" selected="" disabled="">--Pilih Role--</option>
                                                            <option value="1">Administrator</option>
                                                            <option value="2">AO</option>
                                                            <option value="3">Manager Pemasaran</option>
                                                            <option value="4">Pinca</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-default waves-light waves-effect w-md">Kembali</a>
                                                <a href="#" class="btn btn-success waves-light waves-effect w-md" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Simpan</a>
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