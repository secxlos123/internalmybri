@section('title','My BRI - Form LKN')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Laporan Kunjungan Nasabah dan Rekomendasi Pengajuan Kredit</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('indexAO')}}">E-Form</a>
                            </li>
                            <li class="active">
                                Form LKN
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        <form id="formLKN" method="POST" action="{{route('postLKN', $id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <input type="hidden" name="id" value="{{$id}}">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                     <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Kunjungan</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group visitor_name {!! $errors->has('visitor_name') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Pejabat BRI yang mengunjungi *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="visitor_name" maxlength="50" value="{{ old('visitor_name') }}">
                                                @if ($errors->has('visitor_name')) <p class="help-block">{{ $errors->first('visitor_name') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group place {!! $errors->has('visitor_name') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Tempat Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" rows="3" name="place" maxlength="255">{{ old('place') }}</textarea>
                                                @if ($errors->has('place')) <p class="help-block">{{ $errors->first('place') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group date {!! $errors->has('date') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Tanggal Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="datepicker-autoclose" name="date" value="{{ old('date') }}">
                                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                                    @if ($errors->has('date')) <p class="help-block">{{ $errors->first('date') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group name {!! $errors->has('name') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Nama Calon Debitur/ Debitur *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="name" maxlength="50" value="{{ old('name') }}">
                                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group job {!! $errors->has('job') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Pekerjaan / Usaha *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="job" maxlength="50" value="{{ old('job') }}">
                                                @if ($errors->has('job')) <p class="help-block">{{ $errors->first('job') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group phone {!! $errors->has('phone') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">No Telp Kantor / Tempat Usaha *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="phone" maxlength="12" value="{{ old('phone') }}">
                                                @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group account {!! $errors->has('account') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">No Rekening Pinjaman / ID Aplikasi *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="account" maxlength="20" value="{{ old('account') }}">
                                                @if ($errors->has('account')) <p class="help-block">{{ $errors->first('account') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group amount {!! $errors->has('amount') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Jumlah Permohonan *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="amount" maxlength="12" value="{{ old('amount') }}">
                                                @if ($errors->has('amount')) <p class="help-block">{{ $errors->first('amount') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group type {!! $errors->has('type') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Jenis Pinjaman *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="type" maxlength="50" value="{{ old('type') }}">
                                                @if ($errors->has('type')) <p class="help-block">{{ $errors->first('type') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group purpose_of_visit {!! $errors->has('purpose_of_visit') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Tujuan Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan1" value="prakarsa" name="purpose_of_visit">
                                                    <label for="tujuan1"> Prakarsa Kredit </label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan2" value="negosiasi" name="purpose_of_visit">
                                                    <label for="tujuan2"> Negosiasi </label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan3" value="pembinaan" name="purpose_of_visit">
                                                    <label for="tujuan3"> Pembinaan </label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan4" value="penagihan" name="purpose_of_visit">
                                                    <label for="tujuan4"> Penagihan </label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan5" value="lain-lain" name="purpose_of_visit">
                                                    <label for="tujuan5"> Lain-lain </label>
                                                </div>
                                                <div id="other-input" style="display: none;">
                                                    <input type="text" class="form-control">
                                                </div>
                                                @if ($errors->has('purpose_of_visit')) <p class="help-block">{{ $errors->first('purpose_of_visit') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group result {!! $errors->has('result') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Hasil Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="result" maxlength="50" value="{{ old('result') }}">
                                                @if ($errors->has('result')) <p class="help-block">{{ $errors->first('result') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group source {!! $errors->has('source') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Sumber *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="source">
                                                    <option selected="" disabled="">-- Pilih --</option>
                                                    <option value="fixed">Fixed Income</option>
                                                    <option value="nonfixed">Non Fixed Income</option>
                                                </select>
                                                @if ($errors->has('source')) <p class="help-block">{{ $errors->first('source') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group income {!! $errors->has('income') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Penghasilan per-Bulan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="income" maxlength="12" value="{{ old('income') }}">
                                                    <span class="input-group-addon">,00</span>
                                                    @if ($errors->has('income')) <p class="help-block">{{ $errors->first('income') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-l-58 income_salary {!! $errors->has('income_salary') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Gaji / THP :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="income_salary" maxlength="12" value="{{ old('income_salary') }}">
                                                    <span class="input-group-addon">,00</span>
                                                    @if ($errors->has('income_salary')) <p class="help-block">{{ $errors->first('income_salary') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-l-58 income_allowance {!! $errors->has('income_allowance') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Tunjangan / Insentif Lain :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="income_allowance" maxlength="12" value="{{ old('income_allowance') }}">
                                                    @if ($errors->has('income_allowance')) <p class="help-block">{{ $errors->first('income_allowance') }}</p> @endif
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="header-title m-l-310 m-t-20">Sumber Data</h3>
                                        <div class="form-group m-l-127 income_mutation_type {!! $errors->has('income_mutation_type') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Mutasi Rekening *:</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="income_mutation_type">
                                                    <option selected="" disabled="">-- Pilih Bank --</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="Mandiri">Bank Mandiri</option>
                                                </select>
                                                @if ($errors->has('income_mutation_type')) <p class="help-block">{{ $errors->first('income_mutation_type') }}</p> @endif
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control numericOnly" placeholder="No Rekening" name="income_mutation_number" maxlength="12" value="{{ old('income_mutation_number') }}">
                                                @if ($errors->has('income_mutation_number')) <p class="help-block">{{ $errors->first('income_mutation_number') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-l-127 income_salary_image {!! $errors->has('income_salary_image') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Foto Slip Gaji *:</label>
                                            <div class="col-md-8">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="income_salary_image" accept="image/png, image/jpg" value="{{ old('income_salary_image') }}">
                                                @if ($errors->has('income_salary_image')) <p class="help-block">{{ $errors->first('income_salary_image') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-l-58 bussiness_income {!! $errors->has('bussiness_income') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Penghasilan Usaha per-Bulan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="business_income" maxlength="12" value="{{ old('bussiness_income') }}">
                                                    <span class="input-group-addon">,00</span>
                                                    @if ($errors->has('bussiness_income')) <p class="help-block">{{ $errors->first('bussiness_income') }}</p> @endif
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="header-title m-l-310 m-t-20">Sumber Data</h3>
                                        <div class="form-group m-l-127 bussiness_mutation_type {!! $errors->has('bussiness_mutation_type') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Mutasi Rekening :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="business_mutation_type">
                                                    <option selected="" disabled="">-- Pilih Bank --</option>
                                                    <option value="bni">BNI</option>
                                                    <option value="mandiri">Bank Mandiri</option>
                                                </select>
                                                @if ($errors->has('bussiness_mutation_type')) <p class="help-block">{{ $errors->first('bussiness_mutation_type') }}</p> @endif
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control numericOnly" placeholder="No Rekening" name="bussiness_mutation_number" value="{{ old('bussiness_mutation_number') }}">
                                                @if ($errors->has('bussiness_mutation_number')) <p class="help-block">{{ $errors->first('bussiness_mutation_number') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-l-127 bussiness_other {!! $errors->has('bussiness_other') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Lainnya :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="bussiness_other" maxlength="255" value="{{ old('bussiness_other') }}">
                                                @if ($errors->has('bussiness_other')) <p class="help-block">{{ $errors->first('bussiness_other') }}</p> @endif
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
                            <h3 class="panel-title">Rincian Mutasi Rekening</h3>
                        </div>
                        <div class="panel-body">
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nama Bank *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="bank_name">
                                                    <option selected="" disabled="">-- Pilih Bank --</option>
                                                    <option value="bni">BNI</option>
                                                    <option value="mandiri">Bank Mandiri</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">No. Rekening *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="account_number2" maxlength="12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Tanggal *</th>
                      <th>Nominal *</th>
                      <th>Jenis Transaksi *</th>
                      <th>Keterangan *</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>
                        <div class="input-group">
                                                                <input type="text" class="form-control" id="datepicker-autoclose" name="mutation_date">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                      </td>
                      <td>
                        <div class="input-group">
                                                                <span class="input-group-addon">Rp</span>
                                                                <input type="text" class="form-control numericOnly" name="nominal" maxlength="12">
                                                                <span class="input-group-addon">,00</span>
                                                            </div>
                      </td>
                      <td>
                        <select class="form-control" name="transaction_type">
                                                                <option selected="" disabled="">-- Pilih --</option>
                                                                <option value="1">Transaksi Tidak Terkait Usaha</option>
                                                                <option value="2">Transaksi Overbooking</option>
                                                            </select>
                      </td>
                      <td>
                        <input type="text" class="form-control" name="remark" maxlength="255">
                      </td>
                  </tr>
              </tbody>
            </table>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div role="form">
                                        <div class="form-group mutation_file {!! $errors->has('mutation_file') ? 'has-error' : '' !!}">
                                            <label class="control-label">Unggah File Mutasi Rekening *</label>
                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="mutation_file" accept="image/png,image/jpg,application/pdf,application/docx">
                                            @if ($errors->has('mutation_file')) <p class="help-block">{{ $errors->first('mutation_file') }}</p> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div role="form">
                                        <div class="form-group photo_with_customer {!! $errors->has('photo_with_customer') ? 'has-error' : '' !!}">
                                            <label class="control-label">Unggah Foto Bersama Nasabah *</label>
                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="photo_with_customer" accept="image/png,image/jpg">
                                            @if ($errors->has('photo_with_customer')) <p class="help-block">{{ $errors->first('photo_with_customer') }}</p> @endif
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
                            <h3 class="panel-title">Analisa</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group pros {!! $errors->has('pros') ? 'has-error' : '' !!}">
                                            <label class="col-md-2 control-label">Pros *:</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="3" name="pros" maxlength="255">{{ old('pros') }}</textarea>
                                                @if ($errors->has('pros')) <p class="help-block">{{ $errors->first('pros') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group cons {!! $errors->has('cons') ? 'has-error' : '' !!}">
                                            <label class="col-md-2 control-label">Cons *:</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="3" name="cons" maxlength="255">{{ old('cons') }}</textarea>
                                                @if ($errors->has('cons')) <p class="help-block">{{ $errors->first('cons') }}</p> @endif
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
                            <h3 class="panel-title">Investigasi Jual Beli</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group seller_name {!! $errors->has('seller_name') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Nama Penjual *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="seller_name" maxlength="50" value="{{ old('seller_name') }}">
                                                @if ($errors->has('seller_name')) <p class="help-block">{{ $errors->first('seller_name') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group seller_address {!! $errors->has('seller_address') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">Alamat *:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" rows="3" name="seller_address" maxlength="255">{{ old('seller_address') }}</textarea>
                                                @if ($errors->has('seller_address')) <p class="help-block">{{ $errors->first('seller_address') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group seller_phone {!! $errors->has('seller_phone') ? 'has-error' : '' !!}">
                                            <label class="col-md-4 control-label">No. Telepon *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="seller_phone" maxlength="12" value="{{ old('seller_phone') }}">
                                                @if ($errors->has('seller_phone')) <p class="help-block">{{ $errors->first('seller_phone') }}</p> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group selling_price {!! $errors->has('selling_price') ? 'has-error' : '' !!}">
                                            <label class="col-md-5 control-label">Harga Jual *:</label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="selling_price" maxlength="12" value="{{ old('selling_price') }}">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                                    @if ($errors->has('selling_price')) <p class="help-block">{{ $errors->first('selling_price') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group reason_for_sale {!! $errors->has('reason_for_sale') ? 'has-error' : '' !!}">
                                            <label class="col-md-5 control-label">Alasan Dijual *:</label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" rows="3" name="reason_for_sale" maxlength="255">{{ old('reason_for_sale') }}</textarea>
                                                @if ($errors->has('reason_for_sale')) <p class="help-block">{{ $errors->first('reason_for_sale') }}</p> @endif
                                            </div>
                                        </div>
                                        <div class="form-group relation_with_seller {!! $errors->has('relation_with_seller') ? 'has-error' : '' !!}">
                                            <label class="col-md-5 control-label">Hubungan dengan Pembeli *:</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="relation_with_seller" maxlength="255" value="{{ old('relation_with_seller') }}">
                                                @if ($errors->has('relation_with_seller')) <p class="help-block">{{ $errors->first('relation_with_seller') }}</p> @endif
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
                        <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Simpan</a>
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
                                <p>Apakah Anda yakin ingin menyimpan form LKN ini ?</p>
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
            $("#formLKN").submit();
       });
   });
</script>