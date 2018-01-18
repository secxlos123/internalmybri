@section('title','MyBRI - Edit Mitra Kerjasama')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Edit Mitra Kerjasama</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('developers.index')}}">Mitra Kerjasama</a>
                                        </li>
                                        <li class="active">
                                            Edit Mitra Kerjasama
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
                                    <form class="form-horizontal" role="form" action="{{route('developers.update', $id)}}" method="POST" id="form1" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group ">
                                                    <label class="col-md-4 control-label">Nama Perusahaan *:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="company_name" maxlength="50" required="" @if(!empty($dataDev['company_name'])) value="{{$dataDev['company_name']}}" @else value="{{old('company_name')}}" @endif readonly="">
                                                    @if ($errors->has('company_name')) <p class="help-block">{{ $errors->first('company_name') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group developer_name {!! $errors->has('developer_name') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Nama PIC *:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control alphaOnly" name="developer_name" maxlength="50" required="" @if(!empty($dataDev['developer_name'])) value="{{$dataDev['developer_name']}}" @else value="{{old('developer_name')}}" @endif id="name">
                                                    @if ($errors->has('developer_name')) <p class="help-block">{{ $errors->first('developer_name') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group address {!! $errors->has('address') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Alamat Kantor *:</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3" name="address" maxlength="255">@if(!empty($dataDev['company_name'])) {{$dataDev['company_name']}} @else {{old('company_name')}} @endif</textarea>
                                                    @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group city_id {!! $errors->has('city_id') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Kota *:</label>
                                                    <div class="col-md-8">
                                                        @if(!empty($dataDev['company_name']))
                                                           {!! Form::select('city_id', [$dataDev['city_id'] => $dataDev['city_name']], $dataDev['city_id'], [
                                                                'class' => 'select2 cities',
                                                                'id' => 'city_id',
                                                                'data-option' => $dataDev['city_name']
                                                            ]) !!}
                                                        @else
                                                            {!! Form::select('city_id', ['' => ''], '', [
                                                                'class' => 'select2 cities',
                                                                'id' => 'city_id'
                                                            ]) !!}
                                                        @endif

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
                                                        <input type="email" class="form-control" name="email" required="" @if(!empty($dataDev['email'])) value="{{$dataDev['email']}}" @else value="{{old('email')}}" @endif readonly="">
                                                    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group phone {!! $errors->has('phone') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">No. Telepon :</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control numericOnly" maxlength="s" name="phone" @if(!empty($dataDev['phone'])) value="{{$dataDev['phone']}}" @else value="{{old('phone')}}" @endif>
                                                    @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">No. Handphone *:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control numericOnly" maxlength="12" name="mobile_phone" @if(!empty($dataDev['mobile_phone'])) value="{{$dataDev['mobile_phone']}}" @else  value="{{old('mobile_phone')}}" @endif>
                                                    @if ($errors->has('mobile_phone')) <p class="help-block">{{ $errors->first('mobile_phone') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Logo *:</label>
                                                    <div class="col-md-8">
                                                        <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" @if(!empty($dataDev['mobile_phone']))  data-placeholder="{{$dataDev['image']}}" @endif name="image" accept="image/png,image/jpg,image/gif">
                                                    @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group summary {!! $errors->has('summary') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Ringkasan *:</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" name="summary" cols="3" maxlength="255">@if(!empty($dataDev['summary'])) {{$dataDev['summary']}} @else {{old('summary')}} @endif </textarea>
                                                    @if ($errors->has('summary')) <p class="help-block">{{ $errors->first('summary') }}</p> @endif
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
                                    <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Simpan</a>
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
                        <button type="button" id="btnSave" class="btn btn-orange waves-effect waves-light">Simpan</button>
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

       $
   });
</script>

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

                    return {
                        results: data.cities.data,
                        pagination: {
                            more: (params.page * data.cities.per_page) < data.cities.total
                        }
                    };
                },
                cache: true
            },
            // initSelection: function (item, callback) {
            //    var id = item.val();
            //    var cities = item.data('option');
            //    if(id > 0){

            //        var data = { id: 23, cities: 'KAB. BANDUNG' };
            //        callback(data);
            //    }
            // }
        });
    });

    TableManageButtons.init();
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Mitra Kerjasama\UpdateDevRequest', '#form1'); !!}