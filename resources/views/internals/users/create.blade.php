@section('title','My BRI - Tambah User')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tambah User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('users.index')}}">Manajemen User</a>
                                        </li>
                                        <li class="active">
                                            Tambah user
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
                                <form class="form-horizontal" role="form" action="{{route('users.store')}}" method="POST" id="form1" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-horizontal" >
                                                    <div class="form-group nip {!! $errors->has('nip') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">NIP *:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control numericOnly" name="nip" maxlength="16" minlength="16" value="{{ old('nip') }}">
                                                            @if ($errors->has('nip')) <p class="help-block">{{ $errors->first('nip') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group full_name {!! $errors->has('full_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Nama Lengkap *:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="full_name" id="full_name" maxlength="50" value="{{ old('full_name') }}">
                                                            @if ($errors->has('full_name')) <p class="help-block">{{ $errors->first('full_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group birth_place {!! $errors->has('birth_place') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tempat Lahir :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="birth_place" maxlength="50" value="{{ old('birth_place') }}">
                                                            @if ($errors->has('birth_place')) <p class="help-block">{{ $errors->first('birth_place') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group birth_date {!! $errors->has('birth_date') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tanggal Lahir :</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="datepicker-autoclose" name="birth_date" value="{{ old('birth_date') }}">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                                @if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group address {!! $errors->has('address') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Alamat :</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" name="address" maxlength="255">{{ old('address') }}</textarea>
                                                            @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-horizontal" >
                                                    <div class="form-group gender {!! $errors->has('gender') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Jenis Kelamin *:</label>
                                                        <div class="col-md-8">
                                                            <div class="radio radio-info radio-inline">
                                                                <input type="radio" id="laki" value="L" name="gender">
                                                                <label for="laki"> Laki-laki </label>
                                                            </div>
                                                            <div class="radio radio-pink radio-inline">
                                                                <input type="radio" id="perempuan" value="P" name="gender">
                                                                <label for="perempuan"> Perempuan </label>
                                                            </div>
                                                            @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group email {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Email *:</label>
                                                        <div class="col-md-8">
                                                            <input type="email" class="form-control" name="email" maxlength="50" value="{{ old('email') }}">
                                                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group phone {!! $errors->has('phone') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">No. Telepon *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" name="phone" maxlength="12" value="{{ old('phone') }}" >
                                                            @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group mobile_phone {!! $errors->has('mobile_phone') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">No. Handphone *:</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control numericOnly" name="mobile_phone" maxlength="12" value="{{ old('mobile_phone') }}">
                                                            @if ($errors->has('mobile_phone')) <p class="help-block">{{ $errors->first('mobile_phone') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group role_id {!! $errors->has('role_id') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Role *:</label>
                                                        <div class="col-md-8">
                                                            <select class="form-control" name="role_id">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                @foreach($roles['contents']['data'] as $role)
                                                                <option value="{{$role['id']}}">{{$role['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('role_id')) <p class="help-block">{{ $errors->first('role_id') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group images {!! $errors->has('images') ? 'has-error' : '' !!}">
                                                        <label class="col-md-4 control-label">Foto KTP *:</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" accept="image/png,image/jpeg" name="images">
                                                            @if ($errors->has('images')) <p class="help-block">{{ $errors->first('images') }}</p> @endif
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
                                                <div class="form-horizontal" >
                                                    <div class="form-group position {!! $errors->has('position') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Jabatan *:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="position" maxlength="50" value="{{ old('position') }}">
                                                            @if ($errors->has('position')) <p class="help-block">{{ $errors->first('position') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group office_id {!! $errors->has('office_id') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Kantor Cabang *:</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="office_id">
                                                                <option selected="" disabled="">-- Pilih --</option>
                                                                @foreach($offices['contents']['data'] as $office)
                                                                <option value="{{$office['id']}}">{{$office['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('office_id')) <p class="help-block">{{ $errors->first('office_id') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group office_address {!! $errors->has('office_address') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Alamat Kantor :</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="3" maxlength="255" name="office_address"> {{ old('office_address') }}</textarea>
                                                            @if ($errors->has('office_address')) <p class="help-block">{{ $errors->first('office_address') }}</p> @endif
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
                                    <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Simpan</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>

                <!-- Modals Save -->
        <div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>Apakah Anda yakin ingin menambah user "<b id="name"></b>" ?</p>
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