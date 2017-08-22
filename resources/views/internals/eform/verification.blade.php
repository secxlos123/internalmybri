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
                                                <td class="align-middle">
                                                        <span id="nikDF">
                                                        {{$dataCustomer['personal']['nik']}}</span>
                                                    </td>
                                                <td class="align-middle" id="nikCIF">0987654908189866</td>
                                                <td class="align-middle" id="nikKM">0876543908898678</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default" data-toggle="modal" data-target="#update">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Lengkap</td>
                                                <td class="align-middle">{{$dataCustomer['personal']['name']}}</td>
                                                <td class="align-middle">Nasabah 1</td>
                                                <td class="align-middle">Nasabah 1</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Tempat Lahir</td>
                                                <td class="align-middle">{{$dataCustomer['personal']['birth_place']}}</td>
                                                <td class="align-middle">Bandung</td>
                                                <td class="align-middle">Bandung</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Tanggal Lahir</td>
                                                <td class="align-middle">{{$dataCustomer['personal']['birth_date']}}</td>
                                                <td class="align-middle">17 Agustus 1989</td>
                                                <td class="align-middle">17 Agustus 1989</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Alamat</td>
                                                <td class="align-middle">{{$dataCustomer['personal']['address']}}</td>
                                                <td class="align-middle">Jl. Soekarno Hatta No. 12 Bandung 40913</td>
                                                <td class="align-middle">Jl. Soekarno Hatta No. 12 Bandung 40913</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jenis Kelamin</td>
                                                <td class="align-middle">{{$dataCustomer['personal']['gender']}}</td>
                                                <td class="align-middle">Laki-laki</td>
                                                <td class="align-middle">Laki-laki</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Kewarganegaraan</td>
                                                <td class="align-middle">{{$dataCustomer['personal']['citizenship']}}</td>
                                                <td class="align-middle">WNI</td>
                                                <td class="align-middle">WNI</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Status Pernikahan</td>
                                                <td class="align-middle">@if($dataCustomer['personal']['status'] == 0) Tidak Menikah @else Menikah @endif</td>
                                                <td class="align-middle">Menikah</td>
                                                <td class="align-middle">Menikah</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Status Tempat Tinggal</td>
                                                <td class="align-middle">{{$dataCustomer['personal']['address_status']}}</td>
                                                <td class="align-middle">Permanen</td>
                                                <td class="align-middle">Permanen</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Email</td>
                                                <td class="align-middle">{{$dataCustomer['personal']['email']}}</td>
                                                <td class="align-middle">nasabah1@yahoo.com</td>
                                                <td class="align-middle">nasabah1@yahoo.com</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Gadis Ibu Kandung</td>
                                                <td class="align-middle">{{$dataCustomer['personal']['mother_name']}}</td>
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
                                                <td class="align-middle">Pegawai {{$dataCustomer['work']['type']}}</td>
                                                <td class="align-middle">Pegawai Swasta</td>
                                                <td class="align-middle">Pegawai Swasta</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Pekerjaan</td>
                                                <td class="align-middle">{{$dataCustomer['work']['work']}}</td>
                                                <td class="align-middle">Web Developer</td>
                                                <td class="align-middle">Web Developer</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Perusahaan</td>
                                                <td class="align-middle">{{$dataCustomer['work']['company_name']}}</td>
                                                <td class="align-middle">Jaya Abadi</td>
                                                <td class="align-middle">Jaya Abadi</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Bidang Pekerjaan</td>
                                                <td class="align-middle">{{$dataCustomer['work']['work_field']}}</td>
                                                <td class="align-middle">Teknologi</td>
                                                <td class="align-middle">Teknologi</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jabatan</td>
                                                <td class="align-middle">{{$dataCustomer['work']['position']}}</td>
                                                <td class="align-middle">Admin</td>
                                                <td class="align-middle">Admin</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Lama Kerja</td>
                                                <td class="align-middle">{{$dataCustomer['work']['work_duration']}} Tahun</td>
                                                <td class="align-middle">4 Tahun</td>
                                                <td class="align-middle">4 Tahun</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Alamat Kantor</td>
                                                <td class="align-middle">{{$dataCustomer['work']['office_address']}}</td>
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
                                                <td class="align-middle">Rp{{$dataCustomer['financial']['salary']}},00</td>
                                                <td class="align-middle">Rp3.000.000,00</td>
                                                <td class="align-middle">Rp3.000.000,00</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Pendapatan Lain</td>
                                                <td class="align-middle">{{$dataCustomer['financial']['other_salary']}}</td>
                                                <td class="align-middle">Tidak ada</td>
                                                <td class="align-middle">Tidak ada</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Angsuran Pinjaman</td>
                                                <td class="align-middle">Rp{{$dataCustomer['financial']['loan_installment']}},00</td>
                                                <td class="align-middle">Rp1.000.000,00</td>
                                                <td class="align-middle">Rp1.000.000,00</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jumlah Tanggungan</td>
                                                <td class="align-middle">{{$dataCustomer['financial']['dependent_amount']}}</td>
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
                                                <td class="align-middle">{{$dataCustomer['contact']['phone']}}</td>
                                                <td class="align-middle">012345678</td>
                                                <td class="align-middle">012345678</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Handphone</td>
                                                <td class="align-middle">{{$dataCustomer['contact']['mobile_phone']}}</td>
                                                <td class="align-middle">09876543321</td>
                                                <td class="align-middle">09876543321</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Emergency Contact</td>
                                                <td class="align-middle">{{$dataCustomer['contact']['emergency_contact']}}</td>
                                                <td class="align-middle">081234353678</td>
                                                <td class="align-middle">081234353678</td>
                                                <td>
                                                    <a href="#" class="btn waves-effect waves-light btn-default">Sesuaikan</a>
                                                    <a href="#" class="btn waves-effect waves-light btn-success">Verifikasi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Hubungan</td>
                                                <td class="align-middle">{{$dataCustomer['contact']['emergency_relation']}}</td>
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

                    <form action="{{route('postVerification', $id)}}" method="POST" enctype="multipart/form-data" id="form1">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <input type="hidden" name="nik" value="{{$dataCustomer['personal']['nik']}}" id="nik">
                            <input type="hidden" name="email" value="{{$dataCustomer['personal']['email']}}" id="email">
                            <input type="hidden" name="full_name" value="{{$dataCustomer['personal']['name']}}" id="name">
                            <input type="hidden" name="birth_place" value="{{$dataCustomer['personal']['birth_place']}}" id="birth_place">
                            <input type="hidden" name="birth_date" value="{{$dataCustomer['personal']['birth_date']}}" id="birth_date">
                            <input type="hidden" name="address" value="{{$dataCustomer['personal']['address']}}" id="address">
                            <input type="hidden" name="gender" value="@if($dataCustomer['personal']['gender'] == 'Laki-laki')L @else P @endif" id="gender">
                            <input type="hidden" name="citizenship" value="{{$dataCustomer['personal']['citizenship']}}" id="citizenship">
                            <input type="hidden" name="status" value="@if($dataCustomer['personal']['status'] == 'Tidak menikah') 0 @else 1 @endif" id="status">
                            <input type="hidden" name="address_status" value="{{$dataCustomer['personal']['address_status']}}" id="address_status">
                            <input type="hidden" name="mother_name" value="{{$dataCustomer['personal']['mother_name']}}" id="mother_name">
                            <input type="hidden" name="phone" value="{{$dataCustomer['contact']['phone']}}" id="phone">
                            <input type="hidden" name="mobile_phone" value="{{$dataCustomer['contact']['mobile_phone']}}" id="mobile_phone">
                            <input type="hidden" name="emergency_contact" value="{{$dataCustomer['contact']['emergency_contact']}}" id="emergency_contact">
                            <input type="hidden" name="emergency_relation" value="{{$dataCustomer['contact']['emergency_relation']}}" id="emergency_relation">
                            <input type="hidden" name="work_type" value="pegawai {{$dataCustomer['work']['type']}}" id="type">
                            <input type="hidden" name="work" value="{{$dataCustomer['work']['work']}}" id="work">
                            <input type="hidden" name="company_name" value="{{$dataCustomer['work']['company_name']}}" id="company_name">
                            <input type="hidden" name="work_field" value="{{$dataCustomer['work']['work_field']}}" id="work_field">
                            <input type="hidden" name="position" value="{{$dataCustomer['work']['position']}}" id="position">
                            <input type="hidden" name="work_duration" value="{{$dataCustomer['work']['work_duration']}}" id="work_duration">
                            <input type="hidden" name="office_address" value="{{$dataCustomer['work']['office_address']}}" id="office_address">
                            <input type="hidden" name="salary" value="{{$dataCustomer['financial']['salary']}}" id="salary">
                            <input type="hidden" name="other_salary" value="{{$dataCustomer['financial']['other_salary']}}" id="other_salary">
                            <input type="hidden" name="loan_installment" value="{{$dataCustomer['financial']['loan_installment']}}" id="loan_installment">
                            <input type="hidden" name="dependent_amount" value="{{$dataCustomer['financial']['dependent_amount']}}" id="dependent_amount">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button type="subm" href="#" id="save" class="btn btn-success waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
            var data = $('#data-source');
            if(data.val() == 'cif'){
                $('#nikDF').text($( "#nikCIF" ).text());
                $('#nik').val($( "#nikCIF" ).text());
            }else if(data.val() == 'kemendagri'){
                $('#nikDF').text($( "#nikKM" ).text());
                $('#nik').val($( "#nikKM" ).text());
            }
            $('#update').modal('hide');
       });

       // $('#save').on('click', function(e) {
       //      $("#form1").submit();
       // });
   });
</script>