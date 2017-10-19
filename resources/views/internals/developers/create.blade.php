@section('title','My BRI - Tambah Developer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Tambah Developer</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('developers.index')}}">Developer</a>
                                        </li>
                                        <li class="active">
                                            Tambah Developer
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
                                <div class="card-box">
                                    <form class="form-horizontal" role="form" action="{{route('developers.store')}}" method="POST" id="form1" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group company_name {!! $errors->has('company_name') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Nama Perusahaan *:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="company_name" maxlength="50" required="" value="{{old('company_name')}}" id="name">
                                                    @if ($errors->has('company_name')) <p class="help-block">{{ $errors->first('company_name') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group developer_name {!! $errors->has('developer_name') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Nama PIC *:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control alphaOnly" name="developer_name" maxlength="150" required="" value="{{old('developer_name')}}" >
                                                    @if ($errors->has('developer_name')) <p class="help-block">{{ $errors->first('developer_name') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group address {!! $errors->has('address') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Alamat Kantor *:</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3" name="address" maxlength="255">{{old('address')}}</textarea>
                                                    @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group city_id {!! $errors->has('city_id') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Kota *:</label>
                                                    <div class="col-md-8">
                                                       {!! Form::select('city_id', ['' => ''], old('cities'), [
                                                            'class' => 'select2 cities',
                                                            'data-placeholder' => 'Pilih Kota'
                                                        ]) !!}
                                                    @if ($errors->has('city_id')) <p class="help-block">{{ $errors->first('city_id') }}</p> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group email {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Alamat Email *:</label>
                                                    <div class="col-md-8">
                                                        <input type="email" class="form-control" name="email" required="" maxlength="100" value="{{old('email')}}">
                                                    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group phone {!! $errors->has('phone') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">No. Telepon *:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control numericOnly" maxlength="16" name="phone" value="{{old('phone')}}">
                                                    @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group mobile_phone {!! $errors->has('mobile_phone') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">No. Handphone *:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control numericOnly" maxlength="16" name="mobile_phone" value="{{old('mobile_phone')}}">
                                                    @if ($errors->has('mobile_phone')) <p class="help-block">{{ $errors->first('mobile_phone') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group image {!! $errors->has('image') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Logo *:</label>
                                                    <div class="col-md-8">
                                                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="image" accept="image/*">
                                                    @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group summary {!! $errors->has('summary') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Ringkasan * :</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" name="summary" cols="3" maxlength="255">{{old('summary')}}</textarea>
                                                    @if ($errors->has('summary')) <p class="help-block"> {{ $errors->first('summary') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group hidden">
                                                    <label class="col-md-4 control-label">No. PKS *:</label>
                                                    <div class="col-md-8">
                                                        <input type="hidden" class="form-control numericOnly" maxlength="12" name="pks_number" value="-">
                                                    @if ($errors->has('pks_number')) <p class="help-block">{{ $errors->first('pks_number') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group hidden">
                                                    <label class="col-md-4 control-label">Plafon * :</label>
                                                    <div class="col-md-8">
                                                        <input type="hidden" class="form-control numericOnly currency-rp" name="plafond" cols="3" maxlength="12" value="0">
                                                    @if ($errors->has('plafond')) <p class="help-block"> {{ $errors->first('plafond') }}</p> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                                    <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Simpan</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            <!-- Modals Save -->
        <div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>Apakah Anda yakin ingin menambah developer "<b id="name"></b>" ?</p>
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
        </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')    

<script type="text/javascript">
    var options = {
         theme:"sk-bounce",
         message:'Mohon tunggu sebentar.',
         textColor:"white"
    };
    $(document).ready(function() {
       $('#btnSave').on('click', function(e) {
            $("#form1").submit();
            HoldOn.open(options);
       });

       $('#btn-save').on('click', function(e) {
            var name = $('#name').val();
            $('#save').modal('show');
            $("#save #name").html(name);
       });
   });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    var resizefunc = [];
    $(document).ready(function () {        
        $('.cities').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/cities',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    console.log(data);
                    return {
                        results: data.cities.data,
                        pagination: {
                            more: (params.page * data.cities.per_page) < data.cities.total
                        }
                    };
                },
                cache: true
            },
        });
    });

    TableManageButtons.init();
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Developer\DevRequest', '#form1'); !!}