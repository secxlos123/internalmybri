@section('title','My BRI - Detail Nasabah')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Detail Nasabah "John" </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('customers.index')}}">Nasabah</a>
                                        </li>
                                        <li class="active">
                                            Detail Nasabah
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
                                        <li class="">
                                            <a href="#schedule" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                <span class="hidden-xs">Schedule</span>
                                            </a>
                                        </li>
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
                                                                                <p class="form-control-static">12345678</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Nama Lengkap :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">John Doe</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Tempat Lahir :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">Bandung</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Tanggal Lahir :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">24 Februari 1987</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Alamat :</label>
                                                                            <div class="col-md-8">
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
                                                                            <label class="col-md-5 control-label">Jenis Kelamin :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">Laki-laki</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Kewarganegaraan :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">WNA</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Status Pernikahan :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">Menikah</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Status Tempat Tinggal :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">Permanen</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Email :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">email@example.com</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Nama Gadis Ibu Kandung :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">Beyonce</p>
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
                                                                                <p class="form-control-static">Pegawai Swasta</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Pekerjaan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">Desainer</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Nama Perusahaan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">Jaya Abadi</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Bidang Pekerjaan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">Teknologi</p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Jabatan :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">Admin</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Lama Kerja :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">5 Tahun</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Alamat Kantor :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">
                                                                                    Jl. Soekarno-Hatta No. 52 <br>
                                                                                    Kel. Turangga Kec. Turangga <br>
                                                                                    Bandung
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
                                                                                <p class="form-control-static">Rp3.000.000,00</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">Pendapatan Lain :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">Tidak ada</p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Angsuran Pinjaman :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">Rp1.000.000,00</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Jumlah Tanggungan :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">2</p>
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
                                                                                <p class="form-control-static">012345678</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-4 control-label">No. Handphone :</label>
                                                                            <div class="col-md-8">
                                                                                <p class="form-control-static">09876543321</p>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form class="form-horizontal" role="form">
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Emergency Contact :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">012345678</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Hubungan :</label>
                                                                            <div class="col-md-7">
                                                                                <p class="form-control-static">Kakak Kandung</p>
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
                                                                        <img src="{{asset('assets/images/ktp.jpg')}}" class="img-responsive">
                                                                        <p>Foto KTP</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" align="center">
                                                                    <div class="card-box">
                                                                        <img src="{{asset('assets/images/npwp.jpg')}}" class="img-responsive">
                                                                        <p>Foto NPWP</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" align="center">
                                                                    <div class="card-box">
                                                                        <img src="{{asset('assets/images/foto.jpg')}}" class="img-responsive">
                                                                        <p>Foto Nasabah</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="schedule">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-box">
                                                        <h4 class="m-t-0 m-b-10 header-title"><b>Schedule List</b></h4>
                                                        <table class="table table-bordered">
                                                            <thead class="bg-primary">
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Jam</th>
                                                                    <th>Nama AO</th>
                                                                    <th>Kantor Cabang</th>
                                                                    <th>Agenda</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>28 June 2017</td>
                                                                    <td>15.30</td>
                                                                    <td>Lorem Ipsum</td>
                                                                    <td>BRI BSD</td>
                                                                    <td>Appoinment KPR Meruya Residence</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>28 June 2017</td>
                                                                    <td>15.30</td>
                                                                    <td>Lorem Ipsum</td>
                                                                    <td>BRI BSD</td>
                                                                    <td>Appoinment KPR Meruya Residence</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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