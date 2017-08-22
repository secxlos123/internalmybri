@section('title','My BRI - Form Verifikasi Data Nasabah')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Verifikasi Data Nasabah</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="{{route('indexAO')}}">Pengajuan</a>
                                        </li>
                                        <li class="active">
                                            Verifikasi
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box m-t-30">
                                    <div class="add-button">
                                        <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Cari Data</a>
                                    </div>
                                    <div id="filter" class="collapse m-b-15">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="card-box">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Cari No. CIF :</label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control" type="" name="">
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <a href="#" class="btn btn-success waves-light waves-effect w-md">Cari</a>
                                                        </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Cari NIK :</label>
                                                                <div class="col-sm-4">
                                                                    <input class="form-control" type="" name="">
                                                                </div>
                                                                <div class="col-sm-3">
                                                            <a href="#" class="btn btn-success waves-light waves-effect w-md">Cari</a>
                                                        </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title"><b>Data Pribadi</b></h4>
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="bg-inverse">Field</th>
                                                <th>Data Nasabah</th>
                                                <th>Data CIF</th>
                                                <th>Data Kemendagri</th>
                                                <th class="m-w-210">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle bg-primary">NIK</td>
                                                <td class="align-middle">0987654321</td>
                                                <td class="align-middle">0987654321</td>
                                                <td class="align-middle">0987654321</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default" data-toggle="modal" data-target="#update">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Lengkap</td>
                                                <td class="align-middle">Nasabah 1</td>
                                                <td class="align-middle">Nasabah 1</td>
                                                <td class="align-middle">Nasabah 1</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Tempat Lahir</td>
                                                <td class="align-middle">Cianjur</td>
                                                <td class="align-middle">Bandung</td>
                                                <td class="align-middle">Bandung</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Tanggal Lahir</td>
                                                <td class="align-middle">17 Agustus 1987</td>
                                                <td class="align-middle">17 Agustus 1989</td>
                                                <td class="align-middle">17 Agustus 1989</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Alamat</td>
                                                <td class="align-middle">Jl. Soekarno Hatta No. 12 Bandung 40912</td>
                                                <td class="align-middle">Jl. Soekarno Hatta No. 12 Bandung 40913</td>
                                                <td class="align-middle">Jl. Soekarno Hatta No. 12 Bandung 40913</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jenis Kelamin</td>
                                                <td class="align-middle">Laki-laki</td>
                                                <td class="align-middle">Laki-laki</td>
                                                <td class="align-middle">Laki-laki</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Kewarganegaraan</td>
                                                <td class="align-middle">WNI</td>
                                                <td class="align-middle">WNI</td>
                                                <td class="align-middle">WNI</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Status Pernikahan</td>
                                                <td class="align-middle">Menikah</td>
                                                <td class="align-middle">Menikah</td>
                                                <td class="align-middle">Menikah</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Status Tempat Tinggal</td>
                                                <td class="align-middle">Permanen</td>
                                                <td class="align-middle">Permanen</td>
                                                <td class="align-middle">Permanen</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Email</td>
                                                <td class="align-middle">nasabah1@gmail.com</td>
                                                <td class="align-middle">nasabah1@yahoo.com</td>
                                                <td class="align-middle">nasabah1@yahoo.com</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Gadis Ibu Kandung</td>
                                                <td class="align-middle">Nia</td>
                                                <td class="align-middle">Ani</td>
                                                <td class="align-middle">Ani</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box m-t-20">
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title"><b>Data Pekerjaan</b></h4>
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="bg-inverse">Field</th>
                                                <th>Data Nasabah</th>
                                                <th>Data CIF</th>
                                                <th>Data Kemendagri</th>
                                                <th class="m-w-210">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle bg-primary">Jenis Pekerjaan</td>
                                                <td class="align-middle">Pegawai Swasta</td>
                                                <td class="align-middle">Pegawai Swasta</td>
                                                <td class="align-middle">Pegawai Swasta</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Pekerjaan</td>
                                                <td class="align-middle">Desainer</td>
                                                <td class="align-middle">Web Developer</td>
                                                <td class="align-middle">Web Developer</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Perusahaan</td>
                                                <td class="align-middle">Jaya Abadi</td>
                                                <td class="align-middle">Jaya Abadi</td>
                                                <td class="align-middle">Jaya Abadi</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Bidang Pekerjaan</td>
                                                <td class="align-middle">Teknologi</td>
                                                <td class="align-middle">Teknologi</td>
                                                <td class="align-middle">Teknologi</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jabatan</td>
                                                <td class="align-middle">Admin</td>
                                                <td class="align-middle">Admin</td>
                                                <td class="align-middle">Admin</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Lama Kerja</td>
                                                <td class="align-middle">5 Tahun</td>
                                                <td class="align-middle">4 Tahun</td>
                                                <td class="align-middle">4 Tahun</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Alamat Kantor</td>
                                                <td class="align-middle">Jl. Soekarno-Hatta No. 52 Kel. Turangga Kec. Turangga Bandung</td>
                                                <td class="align-middle">Jl. Soekarno-Hatta No. 52 Kel. Turangga Kec. Turangga Bandung</td>
                                                <td class="align-middle">Jl. Soekarno-Hatta No. 52 Kel. Turangga Kec. Turangga Bandung</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box m-t-20">
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title"><b>Data Finansial</b></h4>
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="bg-inverse">Field</th>
                                                <th>Data Nasabah</th>
                                                <th>Data CIF</th>
                                                <th>Data Kemendagri</th>
                                                <th class="m-w-210">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle bg-primary">Gaji/Pendapatan</td>
                                                <td class="align-middle">Rp3.000.000,00</td>
                                                <td class="align-middle">Rp3.000.000,00</td>
                                                <td class="align-middle">Rp3.000.000,00</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Pendapatan Lain</td>
                                                <td class="align-middle">Tidak ada</td>
                                                <td class="align-middle">Tidak ada</td>
                                                <td class="align-middle">Tidak ada</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Angsuran Pinjaman</td>
                                                <td class="align-middle">Rp1.000.000,00</td>
                                                <td class="align-middle">Rp1.000.000,00</td>
                                                <td class="align-middle">Rp1.000.000,00</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jumlah Tanggungan</td>
                                                <td class="align-middle">2</td>
                                                <td class="align-middle">1</td>
                                                <td class="align-middle">1</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box m-t-20">
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title"><b>Data Contact Person</b></h4>
                                    <table class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th class="bg-inverse">Field</th>
                                                <th>Data Nasabah</th>
                                                <th>Data CIF</th>
                                                <th>Data Kemendagri</th>
                                                <th class="m-w-210">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Telepon</td>
                                                <td class="align-middle">012345678</td>
                                                <td class="align-middle">012345678</td>
                                                <td class="align-middle">012345678</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Handphone</td>
                                                <td class="align-middle">09876543321</td>
                                                <td class="align-middle">09876543321</td>
                                                <td class="align-middle">09876543321</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Emergency Contact</td>
                                                <td class="align-middle">08876543351</td>
                                                <td class="align-middle">081234353678</td>
                                                <td class="align-middle">081234353678</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Hubungan</td>
                                                <td class="align-middle">Kakak Kandung</td>
                                                <td class="align-middle">Kakak Kandung</td>
                                                <td class="align-middle">Kakak Kandung</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>

        <!-- Modals update -->
        <div id="update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <h3>Pilih Data</h3>
                            <div class="col-md-12 text-center">
                                <select class="form-control" name="data-source" id="data-source">
                                    <option selected="" disabled="">-- Pilih --</option>
                                    <option value="cif">Data CIF</option>
                                    <option value="kemendagri">Data Kemendagri</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <button type="button" id="btnSave" class="btn btn-success waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot') 
<script type="text/javascript">
    $(document).ready(function() {
       $('#btnSave').on('click', function(e) {
            // $("#formLKN").submit();
            console.log($('#data-source').val());
            $('#update').modal('hide');
       });
   });
</script>