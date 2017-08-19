@section('title','My BRI - Edit User')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Edit User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('users.index')}}">Manajemen User</a>
                                        </li>
                                        <li class="active">
                                            Edit user
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                @if (\Session::has('error'))
                                 <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Data User</h3>
                                    </div>
                                    <form class="form-horizontal" role="form" action="{{route('users.update', $dataUser['id'])}}" method="POST" enctype="multipart/form-data" id="form1">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">NIP :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="nip" value="{{$dataUser['nip']}}" maxlength="16" minlength="16">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Nama Lengkap :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="full_name" value="{{$dataUser['fullname']}}" id="full_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Tempat Lahir :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="birth_place">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Tanggal Lahir :</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="datepicker-autoclose"  name="birth_date" >
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Alamat :</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" name="address"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis Kelamin :</label>
                                                        <div class="col-md-8">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" id="laki" value="L" name="gender" {{($dataUser['gender'] == "Laki-laki") ? 'checked' : '' }}>
                                                                <label for="laki"> Laki-laki </label>
                                                            </div>
                                                            <div class="radio radio-pink radio-inline">
                                                                <input type="radio" id="perempuan" value="P" name="gender" {{($dataUser['gender'] == "Perempuan") ? 'checked' : '' }}>
                                                                <label for="perempuan"> Perempuan </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email :</label>
                                                        <div class="col-md-8">
                                                            <input type="email" class="form-control" name="email" value="{{$dataUser['email']}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Telepon :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="phone" value="{{$dataUser['phone']}}" maxlength="12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Handphone :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="mobile_phone" value="{{$dataUser['mobile_phone']}}" maxlength="12">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Role :</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="role_id">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                @foreach($roles['roles']['data'] as $role)
                                                                <option value="{{$role['id']}}" {{($role['id'] == $dataUser['role_id']) ? 'selected' : '' }}>{{$role['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Foto KTP :</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" name="images" data-placeholder="{{$dataUser['image']}}">
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
                                                        <label class="col-md-3 control-label">Jabatan :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="position" value="{{$dataUser['position']}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Kantor Cabang :</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="office_id">
                                                                <option selected="" disabled="" >-- Pilih --</option>
                                                                @foreach($offices['offices']['data'] as $office)
                                                                <option value="{{$office['id']}}" {{($office['id'] == $dataUser['office_id']) ? 'selected' : '' }}>{{$office['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Alamat Kantor :</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" name="office_address"></textarea>
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
                                <p>Apakah Anda yakin ingin mengubah user "<b id="name"></b>" ?</p>
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