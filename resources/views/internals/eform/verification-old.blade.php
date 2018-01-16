@section('title','MyBRI - Form Verifikasi Data Nasabah')
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
                        <!-- <div class="row" @if(!empty($dataCustomer)) @if($dataCustomer['customer']['is_completed'] == true) hidden="" @endif @endif>
                            <div class="col-md-12">
                                <div class="add-button">
                                    <p class="col-md-2">Lengkapi Data Nasabah</p>
                                    <a @if(!empty($dataCustomer)) href="{{url('eform/verification/'.$id.'/completeData/'.$dataCustomer['customer']['id'])}}" @else href="{{url('eform/verification/'.$id.'/completeData/1')}}" @endif class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-pencil"></i> Lengkapi Data</a>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box m-t-30">                                    
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title"><b>Data Pribadi</b></h4>
                                    <table class="table table-bordered">
                                        <input type="hidden" name="eform_id" value="{{$id}}">
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
                                                <td class="align-middle"><span id="nameDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['name']}}@endif</span></td>
                                                <td class="align-middle" id="nameCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['name']}}@endif</td>
                                                <td class="align-middle" id="nameKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['name']}}@endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="name">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Tanggal Lahir</td>
                                                <td class="align-middle"><span id="birth_dateDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['birth_date']}} @endif</span></td>
                                                <td class="align-middle" id="birth_dateCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['birth_date']}} @endif</td>
                                                <td class="align-middle" id="birth_dateKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['birth_date']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="birth_date">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Alamat</td>
                                                <td class="align-middle"><span id="addressDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['address']}}@endif</span></td>
                                                <td class="align-middle" id="addressCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['address']}}@endif</td>
                                                <td class="align-middle" id="addressKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['address']}}@endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="address">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Jenis Kelamin</td>
                                                <td class="align-middle"><span id="genderDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['gender']}} @endif</span></td>
                                                <td class="align-middle" id="genderCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['gender']}} @endif</td>
                                                <td class="align-middle" id="genderKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['gender']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="gender">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Status Tempat Tinggal</td>
                                                <td class="align-middle"><span id="address_statusDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['address_status']}} @endif</span></td>
                                                <td class="align-middle" id="address_statusCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['address_status']}} @endif</td>
                                                <td class="align-middle" id="address_statusKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['address_status']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="address_status">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Telepon</td>
                                                <td class="align-middle"><span id="phoneDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['phone']}} @endif</span></td>
                                                <td class="align-middle" id="phoneCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['phone']}} @endif</td>
                                                <td class="align-middle" id="phoneKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['phone']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">No. Handphone</td>
                                                <td class="align-middle"><span id="mobile_phoneDF">@if(!empty($dataCustomer)) {{$dataCustomer['customer']['mobile_phone']}} @endif</span></td>
                                                <td class="align-middle" id="mobile_phoneCIF">@if(!empty($dataCustomer)) {{$dataCustomer['cif']['mobile_phone']}} @endif</td>
                                                <td class="align-middle" id="mobile_phoneKM">@if(!empty($dataCustomer)) {{$dataCustomer['kemendagri']['mobile_phone']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="mobile_phone">Sesuaikan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle bg-primary">Nama Gadis Ibu Kandung</td>
                                                <td class="align-middle"><span id="mother_nameDF">@if(!empty($dataCustomer)){{$dataCustomer['customer']['mother_name']}} @endif</span></td>
                                                <td class="align-middle" id="mother_nameCIF">@if(!empty($dataCustomer)){{$dataCustomer['cif']['mother_name']}} @endif</td>
                                                <td class="align-middle" id="mother_nameKM">@if(!empty($dataCustomer)){{$dataCustomer['kemendagri']['mother_name']}} @endif</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="btn waves-effect waves-light btn-default btn-change" data-field="mother_name">Sesuaikan</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <form @if(!empty($dataCustomer)) action="{{route('verifyData', $dataCustomer['customer']['id'])}}" @endif method="POST" enctype="multipart/form-data" id="form1">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                            <input type="hidden" name="full_name"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['name']}}" @endif id="name">
                            <input type="hidden" name="birth_place_id"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['birth_place_id']}}" @endif id="birth_place_id">
                            <input type="hidden" name="birth_date"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['birth_date']}}" @endif id="birth_date">
                            <input type="hidden" name="address"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['address']}}" @endif id="address">
                            <input type="hidden" name="gender"  @if(!empty($dataCustomer)) value="@if($dataCustomer['customer']['gender'] == 'Laki-laki')L @else P @endif" @endif id="gender">
                            <input type="hidden" name="citizenship_id"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['citizenship_id']}}" @endif id="citizenship_id">
                            <input type="hidden" name="address_status"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['address_status']}}" @endif id="address_status">
                            <input type="hidden" name="mother_name"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['mother_name']}}" @endif id="mother_name">
                            <input type="hidden" name="phone"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['phone']}}" @endif id="phone">
                            <input type="hidden" name="mobile_phone"  @if(!empty($dataCustomer)) value="{{$dataCustomer['customer']['mobile_phone']}}" @endif id="mobile_phone">
                            
                        <div class="row" @if(!empty($dataCustomer))  @if($dataCustomer['customer']['is_completed'] == false) hidden="" @endif @endif>s
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button type="submit" href="javascript:void(0);" id="save" class="btn btn-default waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
                                </div>
                                <!-- <div class="col-md-1 pull-right">
                                    <button type="submit" href="javascript:void(0);" id="save" class="btn waves-effect waves-light btn-orange"><i class="mdi mdi-content-save"></i> Verifikasi</button>
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
                        <button type="button" id="btnSave" class="btn btn-orange waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot') 
@include('internals.eform.verification_script')