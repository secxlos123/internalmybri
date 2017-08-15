@section('title','My BRI - Tambah Pengajuan')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Tambah Pengajuan</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('eform.index')}}">E-Form</a>
                            </li>
                            <li class="active">
                                Tambah Pengajuan
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <form id="basic-form" action="#">
                            <div>
                                <h3>Nasabah</h3>
                                <section>
                                    <h4 class="m-t-0 header-title"><b>Nasabah</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Cari NIK nasabah atau tambah nasabah baru
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form role="form">
                                                <div class="form-group">
                                                    <label class="control-label"">Cari NIK Nasabah</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="NIK">
                                                        <span class="input-group-btn">
                                                        <a href="#" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i> Cari</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="form-inline m-t-27" role="form">
                                                <div class="form-group">
                                                    Atau
                                                </div>
                                                <a href="tambah-nasabah.html" class="btn btn-primary waves-effect waves-light m-l-10 btn-md"><i class="fa fa-plus-circle"></i> Tambah Nasabah Baru</a>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <div class="">
                                                <h4 class="m-t-0 header-title"><b>Data Nasabah</b></h4>
                                                <table class="table table-bordered">
                                                    <thead class="bg-primary">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIK</th>
                                                            <th>Nama Nasabah</th>
                                                            <th>Email</th>
                                                            <th>Kota</th>
                                                            <th>Handphone</th>
                                                            <th>Jenis Kelamin</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle">1</td>
                                                            <td class="align-middle">123455667</td>
                                                            <td class="align-middle">Nasabah 1</td>
                                                            <td class="align-middle">xx@xx.com</td>
                                                            <td class="align-middle">Kota 1</td>
                                                            <td class="align-middle">21213212</td>
                                                            <td class="align-middle">Laki-laki</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle">2</td>
                                                            <td class="align-middle">123455668</td>
                                                            <td class="align-middle">Nasabah 2</td>
                                                            <td class="align-middle">xx@xx.com</td>
                                                            <td class="align-middle">Kota 2</td>
                                                            <td class="align-middle">21213212</td>
                                                            <td class="align-middle">Laki-laki</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h3>Lokasi</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="m-t-0 header-title"><b>Lokasi</b></h4>
                                            <p class="text-muted m-b-30 font-13">
                                                Pilih lokasi pengajuan pembiayaan
                                            </p>
                                            <form role="form">
                                                <div class="form-group">
                                                    <label class="control-label">Kota</label>
                                                    <select class="form-control">
                                                        <option>-- Pilih --</option>
                                                        <option>Jakarta</option>
                                                        <option>Bandung</option>
                                                        <option>Semarang</option>
                                                        <option>Surabaya</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Kantor Cabang BRI</label>
                                                    <select class="form-control">
                                                        <option>-- Pilih --</option>
                                                        <option>BSD</option>
                                                        <option>Ragunan</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                                <h3>Produk</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="m-t-0 header-title"><b>Produk</b></h4>
                                            <p class="text-muted m-b-30 font-13">
                                                Pilih produk pembiayaan
                                            </p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="nav nav-pills m-b-30">
                                                        <li class="active">
                                                            <a href="#kpr" data-toggle="tab" aria-expanded="true">KPR</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#kkb" data-toggle="tab" aria-expanded="false">KKB</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#briguna" data-toggle="tab" aria-expanded="false">BRIGUNA</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#britama" data-toggle="tab" aria-expanded="false">BRITAMA</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#kur" data-toggle="tab" aria-expanded="false">KUR/KUPEDES</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="#kartu" data-toggle="tab" aria-expanded="false">KARTU KREDIT</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content br-n pn">
                                                        <div id="kpr" class="tab-pane active">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jumlah Permohonan :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp</span>
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">,00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jangka Waktu :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">Tahun</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Lokasi Rumah :</label>
                                                                            <div class="col-md-8">
                                                                                <textarea class="form-control" rows="3"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">KPR Aktif ke :</label>
                                                                            <div class="col-md-8">
                                                                                <input type="number" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Harga Rumah :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp</span>
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">,00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Uang Muka :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp</span>
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">,00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Luas Bangunan :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">m<sup>2</sup></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <p class="text-muted m-b-30 font-13">
                                                                Unggah foto dokumen asli
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Dokumen Legal Agunan :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Slip Gaji :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Bank Statement :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Kartu Keluarga :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Akta Nikah/Akta Cerai :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Dokumen Legal Usaha / Izin Praktek :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Akta Pisah Harta :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="kkb" class="tab-pane">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jumlah Permohonan :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp</span>
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">,00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jangka Waktu :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">Tahun</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Kondisi Kendaraan :</label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control">
                                                                                    <option>-- Pilih --</option>
                                                                                    <option>Baru</option>
                                                                                    <option>Bekas</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Merk Kendaraan :</label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control">
                                                                                    <option>-- Pilih --</option>
                                                                                    <option>Toyota</option>
                                                                                    <option>Honda</option>
                                                                                    <option>Suzuki</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Harga Kendaraan :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp</span>
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">,00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Uang Muka :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp</span>
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">,00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jenis Kendaraan :</label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control">
                                                                                    <option>-- Pilih --</option>
                                                                                    <option>Minibus</option>
                                                                                    <option>Truk</option>
                                                                                    <option>Pick Up</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Tahun Pembuatan :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" id="datepicker-year">
                                                                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <p class="text-muted m-b-30 font-13">
                                                                Unggah foto dokumen asli
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Dokumen Legal Agunan :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Slip Gaji :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Bank Statement :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Kartu Keluarga :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Akta Nikah/Akta Cerai :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Dokumen Legal Usaha / Izin Praktek :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-6 control-label">Akta Pisah Harta :</label>
                                                                            <div class="col-md-6">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="briguna" class="tab-pane">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jumlah Permohonan :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp</span>
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">,00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Status Peminjam :</label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control">
                                                                                    <option>-- Pilih --</option>
                                                                                    <option>Kawin</option>
                                                                                    <option>Tidak Kawin</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jangka Waktu :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">Tahun</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <p class="text-muted m-b-30 font-13">
                                                                Unggah foto dokumen asli
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Slip Gaji :</label>
                                                                            <div class="col-md-8">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Bank Statement :</label>
                                                                            <div class="col-md-8">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Kartu Keluarga :</label>
                                                                            <div class="col-md-8">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="britama" class="tab-pane">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jumlah Setoran :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp</span>
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">,00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Fasilitas E-Banking :</label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control">
                                                                                    <option>-- Pilih --</option>
                                                                                    <option>Fasilitas 1</option>
                                                                                    <option>Fasilitas 2</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Tujuan Penggunaan :</label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control">
                                                                                    <option>-- Pilih --</option>
                                                                                    <option>Tujuan 1</option>
                                                                                    <option>Tujuan 2</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="kur" class="tab-pane">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jumlah Permohonan :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">Rp</span>
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">,00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Jangka Waktu :</label>
                                                                            <div class="col-md-8">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control">
                                                                                    <span class="input-group-addon">Tahun</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <p class="text-muted m-b-30 font-13">
                                                                Unggah foto dokumen asli
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Kartu Keluarga :</label>
                                                                            <div class="col-md-7">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Dokumen Legal Usaha / Ijin Praktek :</label>
                                                                            <div class="col-md-7">
                                                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file">
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="kartu" class="tab-pane">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Tipe Kartu yg Diinginkan :</label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control">
                                                                                    <option>-- Pilih --</option>
                                                                                    <option>Visa Touch untuk gaya hidup modern</option>
                                                                                    <option>MasterCard Easy Card untuk keluarga modern</option>
                                                                                </select>
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
                                </section>
                                <h3>Selesai</h3>
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="m-t-0 header-title"><b>Waktu</b></h4>
                                            <p class="text-muted m-b-30 font-13">
                                                Tentukan waktu perjanjian dan selesai
                                            </p>
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Tanggal :</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="datepicker-autoclose">
                                                            <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Pukul :</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="timepicker2">
                                                            <span class="input-group-addon b-0"><i class="mdi mdi-clock"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkbox checkbox-primary">
                                                <input id="terms" type="checkbox">
                                                <label for="terms">
                                                    Saya setuju dengan Syarat dan Ketentuan yang berlaku.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot') 