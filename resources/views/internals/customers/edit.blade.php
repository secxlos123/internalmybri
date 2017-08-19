@section('title','My BRI - Edit Nasabah')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Edit Nasabah</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('customers.index')}}">Nasabah</a>
                                        </li>
                                        <li class="active">
                                            Edit Nasabah
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
                                    <form class="form-horizontal" role="form" action="{{route('customers.update', $id)}}" method="POST" enctype="multipart/form-data" id="form1">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">NIK :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['personal']['nik']}}" name="nik">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Nama Lengkap :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['personal']['name']}}" name="full_name" id="full_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Tempat Lahir :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['personal']['birth_place']}}" name="birth_place">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Tanggal Lahir :</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="datepicker-autoclose" value="{{$dataCustomer['personal']['birth_date']}}" name="birth_date">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Alamat :</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" name="address">{{$dataCustomer['personal']['address']}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jenis Kelamin :</label>
                                                        <div class="col-md-7">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" id="laki" value="L"{{($dataCustomer['personal']['gender'] == "Laki-laki") ? 'checked' : '' }} name="gender">
                                                                <label for="laki"> Laki-laki </label>
                                                            </div>
                                                            <div class="radio radio-pink radio-inline">
                                                                <input type="radio" id="perempuan" value="P" {{($dataCustomer['personal']['gender'] == "Perempuan") ? 'checked' : '' }} name="gender">
                                                                <label for="perempuan"> Perempuan </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Kewarganegaraan :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="citizenship">
                                                                <option disabled="">-- Pilih --</option>
                                                                <option {{($dataCustomer['personal']['citizenship'] == "WNI") ? 'selected' : '' }}>WNI</option>
                                                                <option {{($dataCustomer['personal']['citizenship'] == "WNA") ? 'selected' : '' }}>WNA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Status Pernikahan :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="status">
                                                                <option disabled="">-- Pilih --</option>
                                                                <option {{($dataCustomer['personal']['status'] == "0") ? 'selected' : '' }} value="0">Tidak Menikah</option>
                                                                <option {{($dataCustomer['personal']['status'] == "1") ? 'selected' : '' }} value="1">Menikah</option>
                                                                <option {{($dataCustomer['personal']['status'] == "2") ? 'selected' : '' }} value="2">Janda</option>
                                                                <option {{($dataCustomer['personal']['status'] == "3") ? 'selected' : '' }} value="3">Duda</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Status Tempat Tinggal :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="address_status">
                                                                <option disabled="">-- Pilih --</option>
                                                                <option {{($dataCustomer['personal']['address_status'] == "menetap") ? 'selected' : '' }}>Permanen</option>
                                                                <option {{($dataCustomer['personal']['address_status'] == "sementara") ? 'selected' : '' }}>Sementara</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Email :</label>
                                                        <div class="col-md-7">
                                                            <input type="email" class="form-control" value="{{$dataCustomer['personal']['email']}}" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Nama Gadis Ibu Kandung :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['personal']['mother_name']}}" name="mother_name">
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="work_type">
                                                                <option>-- Pilih --</option>
                                                                <option {{($dataCustomer['work']['type'] == "swasta") ? 'selected' : '' }}>Pegawai Swasta</option>
                                                                <option {{($dataCustomer['work']['type'] == "negeri") ? 'selected' : '' }}>Pegawai Negeri</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['work']}}" name="work">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Perusahaan :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['company_name']}}" name="company_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Bidang Pekerjaan :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['work_field']}}" name="work_field">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jabatan :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['position']}}" name="position">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lama Kerja :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['work']['work_duration']}}" name="work_duration" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Alamat Kantor :</label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" rows="3" name="office_address">{{$dataCustomer['work']['office_address']}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Gaji/Pendapatan :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['financial']['salary']}}" name="salary" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Pendapatan Lain :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['financial']['other_salary']}}" name="other_salary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Angsuran Pinjaman :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['financial']['loan_installment']}}" name="loan_installment">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Jumlah Tanggungan :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['financial']['dependent_amount']}}" name="dependent_amount">
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Telepon :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['contact']['phone']}}" name="phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Handphone :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['contact']['mobile_phone']}}" name="mobile_phone">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Emergency Contact :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['contact']['emergency_contact']}}" name="emergency_contact">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">Hubungan :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" value="{{$dataCustomer['contact']['emergency_relation']}}" name="emergency_relation">
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto KTP :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="{{$dataCustomer['other']['identity']}}" name="identity">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto NPWP :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="{{$dataCustomer['other']['npwp']}}" name="npwp">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto Nasabah :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="{{$dataCustomer['other']['image']}}" name="images">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                                    <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Edit</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>


        <div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>Apakah Anda yakin ingin mengubah nasabah "<b id="name"></b>" ?</p>
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
            $("#form1").submit();
       });

       $('#btn-save').on('click', function(e) {
            var name = $('#full_name').val();
            $('#save').modal('show');
            $("#save #name").html(name);
       });
   });

</script>