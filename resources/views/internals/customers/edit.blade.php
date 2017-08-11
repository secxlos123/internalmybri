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
                                    <h4 class="page-title">Tambah Nasabah</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('customers.index')}}">Nasabah</a>
                                        </li>
                                        <li class="active">
                                            Tambah Nasabah
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
                                        <h3 class="panel-title">Data Pribadi</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">NIK :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Nama Lengkap :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Tempat Lahir :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Tanggal Lahir :</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="datepicker-autoclose">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Alamat :</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jenis Kelamin :</label>
                                                        <div class="col-md-7">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" id="laki" value="laki" name="radioInline">
                                                                <label for="laki"> Laki-laki </label>
                                                            </div>
                                                            <div class="radio radio-pink radio-inline">
                                                                <input type="radio" id="perempuan" value="perempuan" name="radioInline">
                                                                <label for="perempuan"> Perempuan </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Kewarganegaraan :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control">
                                                                <option>-- Pilih --</option>
                                                                <option>WNI</option>
                                                                <option>WNA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Status Pernikahan :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control">
                                                                <option>-- Pilih --</option>
                                                                <option>Tidak Menikah</option>
                                                                <option>Menikah</option>
                                                                <option>Janda</option>
                                                                <option>Duda</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Status Tempat Tinggal :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control">
                                                                <option>-- Pilih --</option>
                                                                <option>Permanen</option>
                                                                <option>Sementara</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Email :</label>
                                                        <div class="col-md-7">
                                                            <input type="email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Gadis Ibu Kandung :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control">
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
                                                            <select class="form-control">
                                                                <option>-- Pilih --</option>
                                                                <option>Pegawai Swasta</option>
                                                                <option>Pegawai Negeri</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Perusahaan :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Bidang Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jabatan :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lama Kerja :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat Kantor :</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" rows="3"></textarea>
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
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pendapatan Lain :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Angsuran Pinjaman :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jumlah Tanggungan :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control">
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
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Handphone :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Emergency Contact :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Hubungan :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control">
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
                                        <h3 class="panel-title">Data Pendukung</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto KTP :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto NPWP :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto Nasabah :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
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
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                                    <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Ubah</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')    