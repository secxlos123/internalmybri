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
                                <a href="{{route('eform.index')}}">E-Form</a>
                            </li>
                            <li>
                                <a href="{{route('eform.create')}}">Pengajuan Kredit</a>
                            </li>
                            <li class="active">
                                Form LKN
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        <form id="formLKN" method="POST" action="#" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Kunjungan</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Pejabat BRI yang mengunjungi *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="oa" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Tempat Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" rows="3" name="place" maxlength="255"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Tanggal Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="datepicker-autoclose">
                                                    <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nama Calon Debitur/ Debitur *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="debitur_name" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Pekerjaan / Usaha *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="job" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">No Telp Kantor / Tempat Usaha *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="office_phone" maxlength="12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">No Rekening Pinjaman / ID Aplikasi *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="account_number" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Jumlah Permohonan *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="request_amount" maxlength="12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Jenis Pinjaman *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="loan_type" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Tujuan Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan1" value="prakarsa" name="purpose_visit">
                                                    <label for="tujuan1"> Prakarsa Kredit </label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan2" value="negosiasi" name="purpose_visit">
                                                    <label for="tujuan2"> Negosiasi </label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan3" value="pembinaan" name="purpose_visit">
                                                    <label for="tujuan3"> Pembinaan </label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan4" value="penagihan" name="purpose_visit">
                                                    <label for="tujuan4"> Penagihan </label>
                                                </div>
                                                <div class="radio radio-primary">
                                                    <input type="radio" id="tujuan5" value="lain-lain" name="purpose_visit">
                                                    <label for="tujuan5"> Lain-lain </label>
                                                </div>
                                                <div id="other-input" style="display: none;">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Hasil Kunjungan *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="result_visit" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Sumber *:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="source">
                                                    <option selected="" disabled="">-- Pilih --</option>
                                                    <option value="fixed">Fixed Income</option>
                                                    <option value="nonfixed">Non Fixed Income</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Penghasilan per-Bulan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="income" maxlength="12">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-l-58">
                                            <label class="col-md-4 control-label">Gaji / THP :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="salary" maxlength="12">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-l-58">
                                            <label class="col-md-4 control-label">Tunjangan / Insentif Lain :</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="incentive" maxlength="12">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="header-title m-l-310 m-t-20">Sumber Data</h3>
                                        <div class="form-group m-l-127">
                                            <label class="col-md-4 control-label">Mutasi Rekening *:</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="account_mutation">
                                                    <option selected="" disabled="">-- Pilih Bank --</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="Mandiri">Bank Mandiri</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="No Rekening" name="account_mutation_number" maxlength="12">
                                            </div>
                                        </div>
                                        <div class="form-group m-l-127">
                                            <label class="col-md-4 control-label">Foto Slip Gaji *:</label>
                                            <div class="col-md-8">
                                                <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="salary_slip" accept="image/png, image/jpg">
                                            </div>
                                        </div>
                                        <div class="form-group m-l-58">
                                            <label class="col-md-4 control-label">Penghasilan Usaha per-Bulan *:</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="monthly_income" maxlength="12">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="header-title m-l-310 m-t-20">Sumber Data</h3>
                                        <div class="form-group m-l-127">
                                            <label class="col-md-4 control-label">Mutasi Rekening :</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="account_mutation2">
                                                    <option selected="" disabled="">-- Pilih Bank --</option>
                                                    <option value="bni">BNI</option>
                                                    <option value="mandiri">Bank Mandiri</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="No Rekening" name="account_mutation2_number">
                                            </div>
                                        </div>
                                        <div class="form-group m-l-127">
                                            <label class="col-md-4 control-label">Lainnya :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="other" maxlength="255">
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
                            <div class="row">
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div role="form">
                                        <div class="form-group">
                                            <label class="control-label">Unggah Foto Bersama Nasabah *</label>
                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="picture" accept="image/png,image/jpg">
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
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Pros *:</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="3" name="pros" maxlength="255"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Cons *:</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="3" name="cons" maxlength="255"></textarea>
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
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nama Penjual *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="seller_name" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Alamat *:</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" rows="3" name="sell_address" maxlength="255"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">No. Telepon *:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control numericOnly" name="seller_phone" maxlength="12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Harga Jual *:</label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    <input type="text" class="form-control numericOnly" name="selling_price" maxlength="12">
                                                    <span class="input-group-addon">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Alasan Dijual *:</label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" rows="3" name="selling_reason" maxlength="255"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Hubungan dengan Pembeli *:</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="relation" maxlength="255">
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
                        <a href="#" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
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