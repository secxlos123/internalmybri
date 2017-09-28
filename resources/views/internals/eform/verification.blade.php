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
                        <div class="row" @if($dataCustomer['customer']['is_completed'] == true) hidden="" @endif>
                            <div class="col-md-12">
                                <div class="add-button">
                                    <p class="col-md-2">Lengkapi Data Leads</p>
                                    <a href="{{url('eform/verification/'.$id.'/completeData/'.$dataCustomer['customer']['id'])}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-pencil"></i> Lengkapi Data</a>
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
                                        <input type="hidden" name="form_id" value="{{$id}}">
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
                                                <td class="align-middle bg-primary">Nama Lengkap</td>
                                                <td class="align-middle"><span id="nameDF">{{$dataCustomer['customer']['name']}}</span></td>
                                                <td class="align-middle" id="nameCIF">{{$dataCustomer['cif']['name']}}</td>
                                                <td class="align-middle" id="nameKM">{{$dataCustomer['kemendagri']['name']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="name">Sesuaikan</a>
                                                </td>
                                            </tr>
                                           <!--  <tr>
                                                <td class="align-middle bg-primary">Tempat Lahir</td>
                                                <td class="align-middle"><span id="birth_placeDF">{{$dataCustomer['customer']['birth_place']}}</span></td>
                                                <td class="align-middle" id="birth_placeCIF">{{$dataCustomer['kemendagri']['birth_place']}}</td>
                                                <td class="align-middle" id="birth_placeKM">{{$dataCustomer['cif']['birth_place']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="birth_place">Sesuaikan</a>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="align-middle bg-primary">Tanggal Lahir</td>
                                                <td class="align-middle"><span id="birth_dateDF">{{$dataCustomer['customer']['birth_date']}}</span></td>
                                                <td class="align-middle" id="birth_dateCIF">{{$dataCustomer['cif']['birth_date']}}</td>
                                                <td class="align-middle" id="birth_dateKM">{{$dataCustomer['kemendagri']['birth_date']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="birth_date">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Alamat</td>
                                                <td class="align-middle"><span id="addressDF">{{$dataCustomer['customer']['address']}}</span></td>
                                                <td class="align-middle" id="addressCIF">{{$dataCustomer['cif']['address']}}</td>
                                                <td class="align-middle" id="addressKM">{{$dataCustomer['kemendagri']['address']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="address">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jenis Kelamin</td>
                                                <td class="align-middle"><span id="genderDF">{{$dataCustomer['customer']['gender']}}</span></td>
                                                <td class="align-middle" id="genderCIF">{{$dataCustomer['cif']['gender']}}</td>
                                                <td class="align-middle" id="genderKM">{{$dataCustomer['kemendagri']['gender']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="gender">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td class="align-middle bg-primary">Kewarganegaraan</td>
                                                <td class="align-middle"><span id="citizenshipDF">{{$dataCustomer['customer']['citizenship']}}</span></td>
                                                <td class="align-middle" id="citizenshipCIF">{{$dataCustomer['kemendagri']['citizenship']}}</td>
                                                <td class="align-middle" id="citizenshipKM">{{$dataCustomer['cif']['citizenship']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="citizenship">Sesuaikan</a>
                                                </td>
                                            </tr> -->
                                          <!--   <tr>
                                                <td class="align-middle bg-primary">Status Pernikahan</td>
                                                <td class="align-middle"><span id="statusDF">@if($dataCustomer['customer']['status'] == 0) Tidak Menikah @else Menikah @endif</span></td>
                                                <td class="align-middle" id="statusCIF">{{$dataCustomer['cif']['status']}}</td>
                                                <td class="align-middle" id="statusKM">{{$dataCustomer['kemendagri']['status']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="status">Sesuaikan</a>
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td class="align-middle bg-primary">Status Tempat Tinggal</td>
                                                <td class="align-middle"><span id="address_statusDF">{{$dataCustomer['customer']['address_status']}}</span></td>
                                                <td class="align-middle" id="address_statusCIF">{{$dataCustomer['cif']['address_status']}}</td>
                                                <td class="align-middle" id="address_statusKM">{{$dataCustomer['kemendagri']['address_status']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="address_status">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Telepon</td>
                                                <td class="align-middle"><span id="phoneDF">{{$dataCustomer['customer']['phone']}}</span></td>
                                                <td class="align-middle" id="phoneCIF">{{$dataCustomer['cif']['phone']}}</td>
                                                <td class="align-middle" id="phoneKM">{{$dataCustomer['kemendagri']['phone']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Handphone</td>
                                                <td class="align-middle"><span id="mobile_phoneDF">{{$dataCustomer['customer']['mobile_phone']}}</span></td>
                                                <td class="align-middle" id="mobile_phoneCIF">{{$dataCustomer['cif']['mobile_phone']}}</td>
                                                <td class="align-middle" id="mobile_phoneKM">{{$dataCustomer['kemendagri']['mobile_phone']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="mobile_phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Gadis Ibu Kandung</td>
                                                <td class="align-middle"><span id="mother_nameDF">{{$dataCustomer['customer']['mother_name']}}</span></td>
                                                <td class="align-middle" id="mother_nameCIF">{{$dataCustomer['cif']['mother_name']}}</td>
                                                <td class="align-middle" id="mother_nameKM">{{$dataCustomer['kemendagri']['mother_name']}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="mother_name">Sesuaikan</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <form action="{{route('verifyData', $dataCustomer['customer']['id'])}}" method="POST" enctype="multipart/form-data" id="form1">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <input type="hidden" name="full_name" value="{{$dataCustomer['customer']['name']}}" id="name">
                            <input type="hidden" name="birth_place_id" value="{{$dataCustomer['customer']['birth_place_id']}}" id="birth_place_id">
                            <input type="hidden" name="birth_date" value="{{$dataCustomer['customer']['birth_date']}}" id="birth_date">
                            <input type="hidden" name="address" value="{{$dataCustomer['customer']['address']}}" id="address">
                            <input type="hidden" name="gender" value="@if($dataCustomer['customer']['gender'] == 'Laki-laki')L @else P @endif" id="gender">
                            <!-- <input type="hidden" name="citizenship" value="{{$dataCustomer['customer']['citizenship']}}" id="citizenship"> -->
                            <input type="hidden" name="citizenship_id" value="{{$dataCustomer['customer']['citizenship_id']}}" id="citizenship_id">
                           <!--  <input type="hidden" name="status" @if($dataCustomer['customer']['status'] == 'Tidak menikah') value="0" @else value="1" @endif id="status"> -->
                            <input type="hidden" name="address_status" value="{{$dataCustomer['customer']['address_status']}}" id="address_status">
                            <input type="hidden" name="mother_name" value="{{$dataCustomer['customer']['mother_name']}}" id="mother_name">
                            <input type="hidden" name="phone" value="{{$dataCustomer['customer']['phone']}}" id="phone">
                            <input type="hidden" name="mobile_phone" value="{{$dataCustomer['customer']['mobile_phone']}}" id="mobile_phone">
                            
                        <div class="row" @if($dataCustomer['customer']['is_completed'] == false) hidden="" @endif>
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