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
                                <a href="{{url('/')}}">Dashboard</a>
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
                        <form class="form-horizontal" role="form" id="form-calculator" enctype="multipart/form-data" action="{{route('postCalculate')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <!-- <div class="form-group">
                                            <label class="col-md-4 control-label">KPR Aktif *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control " name="active_kpr" id="active_kpr">
                                                    <option value="0" selected=""> Pilih </option>
                                                    <option value="1"> 1 </option>
                                                    <option value="2"> 2 </option>
                                                    <option value="3"> > 2 </option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Harga Rumah *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp " id="price" name="price" value="{{old('price')}}" maxlength="16">
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
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Jenis Suku Bunga *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control " name="interest_rate_type" id="interest_rate_type">
                                                    <option value="0" selected="" disabled=""> Pilih </option>
                                                    <option value="1"> FLAT </option>
                                                    <option value="2"> EFEKTIF </option>
                                                    <option value="3"> EFEKTIF (Fixed - Float) </option>
                                                    <!-- <option value="4"> EFEKTIF (Fixed - Floor - Float) </option> -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Plafond yang diajukan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly currency-rp " id="price_platform" name="price_platform" value="{{old('price_platform')}}" maxlength="16">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_div">
                                            <label class="control-label col-md-4">Jangka Waktu *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly required " name="time_period" value="{{old('time_period')}}" maxlength="3" placeholder="0" id="time_period">
                                                    <span class="input-group-addon">Bulan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_total_div">
                                            <label class="control-label col-md-4">Jangka Waktu Total *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly required " name="time_period_total" value="{{old('time_period_total')}}" maxlength="3" placeholder="0" id="time_period_total">
                                                    <span class="input-group-addon">Bulan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_fixed_div">
                                            <label class="control-label col-md-4">Jangka Waktu Fixed *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly required " name="time_period_fixed" value="{{old('time_period_fixed')}}" maxlength="3" placeholder="0" id="time_period_fixed">
                                                    <span class="input-group-addon">Bulan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_floor_div">
                                            <label class="control-label col-md-4">Jangka Waktu Floor *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly required " name="time_period_floor" value="{{old('time_period_floor')}}" maxlength="2" placeholder="0" id="time_period_floor">
                                                    <span class="input-group-addon">Bulan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <label class="control-label col-md-4">Suku Bunga *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly required " name="rate" value="{{old('rate')}}" maxlength="5" placeholder="0" id="rate">
                                                    <span class="input-group-addon">% per-tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_float_div">
                                            <label class="control-label col-md-4">Suku Bunga Float *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly required " name="interest_rate_float" value="{{old('interest_rate_float')}}" maxlength="5" placeholder="0" id="interest_rate_float">
                                                    <span class="input-group-addon">% per-tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_fixed_div">
                                            <label class="control-label col-md-4">Suku Bunga Fixed *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly required " name="interest_rate_fixed" value="{{old('interest_rate_fixed')}}" maxlength="5" placeholder="0" id="interest_rate_efektif">
                                                    <span class="input-group-addon">% per-tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_floor_div">
                                            <label class="control-label col-md-4">Suku Bunga Floor *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control numericOnly required " name="interest_rate_floor" value="{{old('interest_rate_floor')}}" maxlength="5" placeholder="0" id="interest_rate_floor">
                                                    <span class="input-group-addon">% per-tahun</span>
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
                        <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i> Hitung Simulasi </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')    
@include('internals.calculator.calculator-script')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Calculator\CalculatorRequest', '#form-calculator'); !!}