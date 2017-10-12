@section('title','My BRI - Kalkulator Simulasi Kredit')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Kalkulator Simulasi Kredit</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('developers.index')}}">Developer</a>
                                        </li>
                                        <li class="active">
                                            Kalkulator Simulasi Kredit
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
                                    <form class="form-horizontal" role="form" id="form1" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-horizontal" role="form">
                                                <div class="form-group developer_name {!! $errors->has('developer_name') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">KPR Aktif *:</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control " name="active_kpr" id="active_kpr">
                                                            <option value="0" selected=""> Pilih </option>
                                                            <option value="1"> 1 </option>
                                                            <option value="2"> 2 </option>
                                                            <option value="3"> > 2 </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Harga Rumah *:</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">Rp</span>
                                                            <input type="text" class="form-control numericOnly currency-rp " id="price" name="price" value="{{old('price')}}" maxlength="16" id="price">
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="form-group">
                                                    <label class="control-label col-md-4">Uang Muka *:</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control numericOnly " name="dp" value="{{old('dp')}}" maxlength="2" max="90" placeholder="0" id="dp" >
                                                            <span class="input-group-addon">%</span>
                                                            @if ($errors->has('dp')) <p class="help-block">{{ $errors->first('dp') }}</p> @endif
                                                        </div><br>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">Rp</span>
                                                            <input type="text" class="form-control numericOnly currency-rp" name="down_payment" value="{{old('down_payment')}}" maxlength="16" id="down_payment" readonly="">
                                                            <!-- <span class="input-group-addon">,00</span> -->
                                                            @if ($errors->has('down_payment')) <p class="help-block">{{ $errors->first('down_payment') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group city_id {!! $errors->has('city_id') ? 'has-error' : '' !!}">
                                                    <label class="col-md-4 control-label">Jenis Suku Bunga *:</label>
                                                    <div class="col-md-8">
                                                       <select class="form-control " name="active_kpr" id="active_kpr">
                                                            <option value="0" selected=""> Pilih </option>
                                                            <option value="1"> FLAT </option>
                                                            <option value="2"> EFEKTIF </option>
                                                            <option value="3"> EFEKTIF (Fixed - Float) </option>
                                                            <option value="4"> EFEKTIF (Fixed - Floor - Float) </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Plafond yang diajukan *:</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">Rp</span>
                                                            <input type="text" class="form-control numericOnly currency-rp " id="price" name="price" value="{{old('price')}}" maxlength="16" id="price">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group year {!! $errors->has('year') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Jangka Waktu *:</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control numericOnly required " name="year" value="{{old('year')}}" maxlength="2" placeholder="0" id="year" max="20">
                                                            <span class="input-group-addon">Bulan</span>
                                                            @if ($errors->has('year')) <p class="help-block">{{ $errors->first('year') }}</p> @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group year {!! $errors->has('year') ? 'has-error' : '' !!}">
                                                    <label class="control-label col-md-4">Suku Bunga *:</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control numericOnly required " name="year" value="{{old('year')}}" maxlength="2" placeholder="0" id="year" max="20">
                                                            <span class="input-group-addon">% per-tahun</span>
                                                            @if ($errors->has('year')) <p class="help-block">{{ $errors->first('year') }}</p> @endif
                                                        </div>
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
                            <div class="col-md-6">
                                <div class="pull-right">
                                    <!-- <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a> -->
                                    <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Hitung Simulasi </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            <!-- Modals Save -->
        <!-- <div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
        </div> -->
        </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')    

<script type="text/javascript">
    $(document).ready(function() {
       $('#btnSave').on('click', function(e) {
            $("#form1").submit();
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