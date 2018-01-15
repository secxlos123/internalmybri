@section('title','MyBRI - Edit Pihak Ketiga')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Edit Pihak Ketiga</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('third-party.index')}}">Pihak Ketiga</a>
                                        </li>
                                        <li class="active">
                                            Edit Pihak Ketiga
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
                                    <form class="form-horizontal" role="form" action="{{route('third-party.update', $id)}}" method="POST" id="form_third_party" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Nama Pihak Ketiga *:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control alphaOnly" name="name" maxlength="150" required="" value="{{$datas['name']}}" id="name">
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group address {!! $errors->has('address') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Alamat *:</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="3" name="address" maxlength="255">{{$datas['address']}}</textarea>
                                                    @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group city_id {!! $errors->has('city_id') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Kota *:</label>
                                                    <div class="col-md-8">
                                                       {!! Form::select('city_id', [$datas['city_id'] => $datas['city_name']], old('cities'), [
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
                                                        <input type="email" class="form-control" required="" maxlength="50" value="{{$datas['email']}}" readonly="">
                                                    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">No. Handphone *:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control numericOnly" maxlength="12" name="phone_number" value="{{$datas['phone_number']}}">
                                                    @if ($errors->has('phone_number')) <p class="help-block">{{ $errors->first('phone_number') }}</p> @endif
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
                                <p>Apakah Anda yakin ingin mengubah Pihak Ketiga dengan nama : "<b id="name"></b>" ?</p>
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
    $(document).ready(function() {
       $('#btnSave').on('click', function(e) {
            $("#form_third_party").submit();
       });

       $('#btn-save').on('click', function(e) {
            var name = $('#name').val();
            $('#save').modal('show');
            $("#save #name").html(name);
       });
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
{!! JsValidator::formRequest('App\Http\Requests\ThirdParty\ThirdPartyRequest', '#form_third_party'); !!}