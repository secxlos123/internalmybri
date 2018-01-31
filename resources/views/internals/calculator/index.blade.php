@section('title','MyBRI - Kalkulator Simulasi Kredit')
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
                {!! Form::open(['route' => 'postCalculate','class' => 'callus top201', 'id' => 'form-calculator', ]) !!}
                   <div class="card-box">
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
                                                    {!! Form::text('price', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '','id'=>'price','required'=>'']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Uang Muka *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('dp', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'dp','maxlength'=>'6','required'=>'','step'=>'0.4']) !!}
                                                    <span class="input-group-addon">%</span>
                                                    @if ($errors->has('dp')) <p class="help-block">{{ $errors->first('dp') }}</p> @endif
                                                </div><br>
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('down_payment', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '','id'=>'down_payment']) !!}
                                                    @if ($errors->has('down_payment')) <p class="help-block">{{ $errors->first('down_payment') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Jenis Suku Bunga *:</label>
                                            <div class="col-md-8">
                                                {{Form::select('interest_rate_type',[1=>'FLAT',2=>'EFEKTIF','3'=>'EFEKTIF (Fixed - Float)'],null,['class'=>'form-control' ,'id'=>'interest_rate_type'])}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Plafond yang diajukan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('price_platform', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '','id'=>'price_platform','readonly'=>'']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_div">
                                            <label class="control-label col-md-4">Jangka Waktu *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('time_period', '', ['class' => 'form-control' ,'placeholder' => '0','id'=>'time_period','maxlength'=>'3']) !!}
                                                    <span class="input-group-addon">Bulan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_total_div">
                                            <label class="control-label col-md-4">Jangka Waktu Total *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                   {!! Form::text('time_period_total', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period_total','maxlength'=>'3']) !!}
                                                    <span class="input-group-addon">Bulan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_fixed_div">
                                            <label class="control-label col-md-4">Jangka Waktu Fixed *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('time_period_fixed', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period_fixed','maxlength'=>'3']) !!}
                                                    <span class="input-group-addon">Bulan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_floor_div">
                                            <label class="control-label col-md-4">Jangka Waktu Floor *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('time_period_floor', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period_floor','maxlength'=>'3']) !!}
                                                    <span class="input-group-addon">Bulan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <label class="control-label col-md-4">Suku Bunga *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('rate', '', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'rate','maxlength'=>'6','step'=>'0.4']) !!}
                                                    <span class="input-group-addon">% per-tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_float_div">
                                            <label class="control-label col-md-4">Suku Bunga Float *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('interest_rate_float', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'interest_rate_float','maxlength'=>'6','step'=>'0.4']) !!}
                                                    <span class="input-group-addon">% per-tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_fixed_div">
                                            <label class="control-label col-md-4">Suku Bunga Fixed *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                   {!! Form::text('interest_rate_fixed', '', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'interest_rate_efektif','maxlength'=>'6','step'=>'0.4']) !!}
                                                    <span class="input-group-addon">% per-tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_floor_div">
                                            <label class="control-label col-md-4">Suku Bunga Floor *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('interest_rate_floor', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'interest_rate_floor','maxlength'=>'6','step'=>'0.4']) !!}
                                                    <span class="input-group-addon">% per-tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Hitung Simulasi </button>
                                    </div>
                                </div>
                            </div>
                            {!!  Form::close()  !!}
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