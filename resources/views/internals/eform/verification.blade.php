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
                        @if (\Session::has('success'))
                            <div class="alert alert-success">{{ \Session::get('success') }}</div>
                        @endif
                        <div class="row" @if($dataCustomer['is_completed'] == true) hidden="" @endif>
                            <div class="col-md-12">
                                <div class="add-button">
                                    <p class="col-md-2">Lengkapi Data Leads</p>
                                    <a href="{{route('completeData', $id)}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-pencil"></i> Lengkapi Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box m-t-30">

                                    <!-- <div id="filter" class="collapse m-b-15">
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
                                                            <a href="javascript:void(0);" class="btn btn-success waves-light waves-effect w-md">Cari</a>
                                                        </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Cari NIK :</label>
                                                                <div class="col-sm-4">
                                                                    <input class="form-control" type="" name="">
                                                                </div>
                                                                <div class="col-sm-3">
                                                            <a href="javascript:void(0);" class="btn btn-success waves-light waves-effect w-md">Cari</a>
                                                        </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    
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
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-toggle="modal" data-field="nik">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Lengkap</td>
                                                <td class="align-middle"><span id="nameDF">{{$dataCustomer['personal']['name']}}</span></td>
                                                <td class="align-middle" id="nameCIF">Nasabah 1</td>
                                                <td class="align-middle" id="nameKM">Nasabah 1</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="name">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Tempat Lahir</td>
                                                <td class="align-middle"><span id="birth_placeDF">{{$dataCustomer['personal']['birth_place']}}</span></td>
                                                <td class="align-middle" id="birth_placeCIF">Bandung</td>
                                                <td class="align-middle" id="birth_placeKM">Bandung</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="birth_place">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Tanggal Lahir</td>
                                                <td class="align-middle"><span id="birth_dateDF">{{$dataCustomer['personal']['birth_date']}}</span></td>
                                                <td class="align-middle" id="birth_dateCIF">17 Agustus 1989</td>
                                                <td class="align-middle" id="birth_dateKM">17 Agustus 1989</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="birth_date">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Alamat</td>
                                                <td class="align-middle"><span id="addressDF">{{$dataCustomer['personal']['address']}}</span></td>
                                                <td class="align-middle" id="addressCIF">Jl. Soekarno Hatta No. 12 Bandung 40913</td>
                                                <td class="align-middle" id="addressKM">Jl. Soekarno Hatta No. 12 Bandung 40913</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="address">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jenis Kelamin</td>
                                                <td class="align-middle"><span id="genderDF">{{$dataCustomer['personal']['gender']}}</span></td>
                                                <td class="align-middle" id="genderCIF">Laki-laki</td>
                                                <td class="align-middle" id="genderKM">Laki-laki</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="gender">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Kewarganegaraan</td>
                                                <td class="align-middle"><span id="citizenshipDF">{{$dataCustomer['personal']['citizenship']}}</span></td>
                                                <td class="align-middle" id="citizenshipCIF">WNI</td>
                                                <td class="align-middle" id="citizenshipKM">WNI</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="citizenship">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Status Pernikahan</td>
                                                <td class="align-middle"><span id="statusDF">@if($dataCustomer['personal']['status'] == 0) Tidak Menikah @else Menikah @endif</span></td>
                                                <td class="align-middle" id="statusCIF">Menikah</td>
                                                <td class="align-middle" id="statusKM">Menikah</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="status">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Status Tempat Tinggal</td>
                                                <td class="align-middle"><span id="address_statusDF">{{$dataCustomer['personal']['address_status']}}</span></td>
                                                <td class="align-middle" id="address_statusCIF">Permanen</td>
                                                <td class="align-middle" id="address_statusKM">Permanen</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="address_status">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Telepon</td>
                                                <td class="align-middle"><span id="phoneDF">{{$dataCustomer['contact']['phone']}}</span></td>
                                                <td class="align-middle" id="phoneCIF">012345678</td>
                                                <td class="align-middle" id="phoneKM">012345678</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Handphone</td>
                                                <td class="align-middle"><span id="mobile_phoneDF">{{$dataCustomer['contact']['mobile_phone']}}</span></td>
                                                <td class="align-middle" id="mobile_phoneCIF">09876543321</td>
                                                <td class="align-middle" id="mobile_phoneKM">09876543321</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="mobile_phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td class="align-middle bg-primary">Email</td>
                                                <td class="align-middle"><span id="emailDF">{{$dataCustomer['personal']['email']}}</span></td>
                                                <td class="align-middle" id="emailCIF">nasabah1@yahoo.com</td>
                                                <td class="align-middle" id="emailKM">nasabah1@yahoo.com</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="email">Sesuaikan</a>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Gadis Ibu Kandung</td>
                                                <td class="align-middle"><span id="mother_nameDF">{{$dataCustomer['personal']['mother_name']}}</span></td>
                                                <td class="align-middle" id="mother_nameCIF">Ani</td>
                                                <td class="align-middle" id="mother_nameKM">Ani</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="mother_name">Sesuaikan</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="row">
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
                                                <td class="align-middle"><span id="typeDF">Pegawai {{$dataCustomer['work']['type']}}</span></td>
                                                <td class="align-middle" id="typeCIF">Pegawai Swasta</td>
                                                <td class="align-middle" id="typeMK">Pegawai Swasta</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="type">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Pekerjaan</td>
                                                <td class="align-middle"><span id="workDF">{{$dataCustomer['work']['work']}}</span></td>
                                                <td class="align-middle" id="workCIF">Web Developer</td>
                                                <td class="align-middle" id="workKM">Web Developer</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="work">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Perusahaan</td>
                                                <td class="align-middle"><span id="company_nameDF">{{$dataCustomer['work']['company_name']}}</span></td>
                                                <td class="align-middle" id="company_nameCIF">Jaya Abadi</td>
                                                <td class="align-middle" id="company_nameKM">Jaya Abadi</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="company_name">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Bidang Pekerjaan</td>
                                                <td class="align-middle"><span id="work_fieldDF">{{$dataCustomer['work']['work_field']}}</span></td>
                                                <td class="align-middle" id="work_fieldCIF">Teknologi</td>
                                                <td class="align-middle" id="work_fieldKM">Teknologi</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="work_field">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jabatan</td>
                                                <td class="align-middle"><span id="positionDF">{{$dataCustomer['work']['position']}}</span></td>
                                                <td class="align-middle" id="positionCIF">Admin</td>
                                                <td class="align-middle" id="positionKM">Admin</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="position">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Lama Kerja</td>
                                                <td class="align-middle"><span id="work_durationDF">{{$dataCustomer['work']['work_duration']}} Tahun</span></td>
                                                <td class="align-middle" id="work_durationCIF">4 Tahun</td>
                                                <td class="align-middle" id="work_durationKM">4 Tahun</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="work_duration">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Alamat Kantor</td>
                                                <td class="align-middle"><span id="office_addressDF">{{$dataCustomer['work']['office_address']}}</span></td>
                                                <td class="align-middle" id="office_addressCIF">Jl. Soekarno-Hatta No. 52 Kel. Turangga Kec. Turangga Bandung</td>
                                                <td class="align-middle" id="office_addressKM">Jl. Soekarno-Hatta No. 52 Kel. Turangga Kec. Turangga Bandung</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="office_address">Sesuaikan</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="row">
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
                                                <td class="align-middle"><span id="salaryDF">Rp{{$dataCustomer['financial']['salary']}},00</span></td>
                                                <td class="align-middle" id="salaryCIF">Rp3.000.000,00</td>
                                                <td class="align-middle" id="salaryKM">Rp3.000.000,00</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="salary">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Pendapatan Lain</td>
                                                <td class="align-middle"><span id="other_salaryDF">{{$dataCustomer['financial']['other_salary']}}</span></td>
                                                <td class="align-middle" id="other_salaryCIF">Tidak ada</td>
                                                <td class="align-middle" id="other_salaryKM">Tidak ada</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="other_salary">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Angsuran Pinjaman</td>
                                                <td class="align-middle"><span id="loan_installmentDF">Rp{{$dataCustomer['financial']['loan_installment']}},00</span></td>
                                                <td class="align-middle" id="loan_installmentCIF">Rp1.000.000,00</td>
                                                <td class="align-middle" id="loan_installmentKM">Rp1.000.000,00</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="loan_installment">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jumlah Tanggungan</td>
                                                <td class="align-middle"><span id="dependent_amountDF">{{$dataCustomer['financial']['dependent_amount']}}</span></td>
                                                <td class="align-middle" id="dependent_amountCIF">1</td>
                                                <td class="align-middle" id="dependent_amountKM">1</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="dependent_amount">Sesuaikan</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="row">
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
                                                <td class="align-middle"><span id="phoneDF">{{$dataCustomer['contact']['phone']}}</span></td>
                                                <td class="align-middle" id="phoneCIF">012345678</td>
                                                <td class="align-middle" id="phoneKM">012345678</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Handphone</td>
                                                <td class="align-middle"><span id="mobile_phoneDF">{{$dataCustomer['contact']['mobile_phone']}}</span></td>
                                                <td class="align-middle" id="mobile_phoneCIF">09876543321</td>
                                                <td class="align-middle" id="mobile_phoneKM">09876543321</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="mobile_phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Emergency Contact</td>
                                                <td class="align-middle"><span id="emergency_contactDF">{{$dataCustomer['contact']['emergency_contact']}}</span></td>
                                                <td class="align-middle" id="emergency_contactCIF">081234353678</td>
                                                <td class="align-middle" id="emergency_contactKM">081234353678</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="emergency_contact">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Hubungan</td>
                                                <td class="align-middle"><span id="emergency_relationDF">{{$dataCustomer['contact']['emergency_relation']}}</span></td>
                                                <td class="align-middle" id="emergency_relationCIF">Kakak Kandung</td>
                                                <td class="align-middle" id="emergency_relationKM">Kakak Kandung</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="emergency_relation">Sesuaikan</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->

                    <form action="{{route('verifyData', $id)}}" method="POST" enctype="multipart/form-data" id="form1">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <input type="hidden" name="nik" value="{{$dataCustomer['personal']['nik']}}" id="nik">
                            <input type="hidden" name="email" value="{{$dataCustomer['personal']['email']}}" id="email">
                            <input type="hidden" name="full_name" value="{{$dataCustomer['personal']['name']}}" id="name">
                            <input type="hidden" name="birth_place" value="{{$dataCustomer['personal']['birth_place']}}" id="birth_place">
                            <input type="hidden" name="birth_date" value="{{$dataCustomer['personal']['birth_date']}}" id="birth_date">
                            <input type="hidden" name="address" value="{{$dataCustomer['personal']['address']}}" id="address">
                            <input type="hidden" name="gender" value="@if($dataCustomer['personal']['gender'] == 'Laki-laki')L@else P @endif" id="gender">
                            <input type="hidden" name="citizenship" value="{{$dataCustomer['personal']['citizenship']}}" id="citizenship">
                            <input type="hidden" name="status" @if($dataCustomer['personal']['status'] == 'Tidak menikah') value="0" @else value="1" @endif id="status">
                            <input type="hidden" name="address_status" value="{{$dataCustomer['personal']['address_status']}}" id="address_status">
                            <input type="hidden" name="mother_name" value="{{$dataCustomer['personal']['mother_name']}}" id="mother_name">
                            <input type="hidden" name="phone" value="{{$dataCustomer['contact']['phone']}}" id="phone">
                            <input type="hidden" name="mobile_phone" value="{{$dataCustomer['contact']['mobile_phone']}}" id="mobile_phone">
                            
                        <div class="row" @if($dataCustomer['is_completed'] == false) hidden="" @endif>
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button type="submit" href="javascript:void(0);" id="save" class="btn btn-default waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
                                </div>
                                <!-- <div class="col-md-1 pull-right">
                                    <button type="submit" href="javascript:void(0);" id="save" class="btn waves-effect waves-light btn-success"><i class="mdi mdi-content-save"></i> Verifikasi</button>
                                </div> -->
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
                                <input type="hidden" id="field">
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
@include('internals.eform.verification_script')