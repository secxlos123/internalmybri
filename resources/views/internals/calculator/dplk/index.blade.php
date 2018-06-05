@section('title','MyBRI - Kalkulator Simulasi Kredit')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style media="screen">
  .input-group-addon, .input-group-btn{
    width: 0;
  }
  .input-group{
    width: 100% ;
  }
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Kalkulator Simulasi DPLK</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Home MyBRI</a>
                            </li>
                            <li class="active">
                                Kalkulator Simulasi DPLK
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
                                <div class="col-md-6" style="border-right: 3px solid #eeeeee;">
                                    <div class="form-horizontal" role="form">
                                        <!-- <div class="form-group">
                                            <label class="col-md-4 control-label">KPR Aktif :</label>
                                            <div class="col-md-8">
                                                <select class="form-control " name="active_kpr" id="active_kpr">
                                                    <option value="0"> Pilih </option>
                                                    <option value="1"> 1 </option>
                                                    <option value="2"> 2 </option>
                                                    <option value="3"> > 2 </option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-8">
                                                <h4>IDENTITAS</h4>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                              <label class="control-label">Nama</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('nama', '', ['class' => 'form-control','placeholder' => '','id'=>'nama','required'=>'']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                              <label class="control-label">Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-8">
                                              <div class="input-group">
                                                <input type="text" placeholder="" class="form-control" id="tanggalLahir" name="tanggal_lahir">
                                                <input type="hidden" name="" value="" id="usia_sekarang">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                              <label class="control-label">Usia Pensiun</label>
                                            </div>
                                            <div class="col-md-8">
                                              <div class="input-group">
                                                {!! Form::text('usia_pensiun', '', ['class' => 'form-control numericOnly','placeholder' => '','id'=>'usia_pensiun','maxlength'=>'3','step'=>'1']) !!}
                                                <input type="hidden" name="" value="" id="jumlah_tahun">
                                                <span class="input-group-addon">tahun</span>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-8">
                                                <h4>PILIHAN INVESTASI</h4>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-4">
                                              <label class="control-label">Setoran Awal</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('setoran_awal', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '','id'=>'setoran_awal']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                              <label class="control-label">Iuran Bulanan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('iuran_bulanan', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '','id'=>'iuran_bulanan']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                              <label class="control-label">Kenaikan Iuran per Tahun</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('kenaikan_pertahun', '', ['class' => 'form-control numericOnly','placeholder' => '','id'=>'kenaikan_pertahun']) !!}
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Jenis Investasi</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                  <select class="form-control" id="jenis_investasi" name="kanwil">
                                                    <option value="pasar_uang"> Pasar Uang</option>
                                                    <option value="pendapatan_tetap"> Pendapatan Tetap</option>
                                                    <option value="saham"> Saham</option>
                                                    <option value="psu_syariah"> Pasar Uang Syariah</option>
                                                    <option value="berimbang_syariah"> Berimbang Syariah</option>
                                                    <option value="kombinasi"> Kombinasi</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="return_dplk" name="" value="">
                                        <div id="view_kombinasi" class="hide">
                                          <div class="form-group">
                                              <div class="col-md-4">
                                                <label class="control-label">Pasar Uang</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <div class="input-group">
                                                      {!! Form::text('pasar_uang', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '','id'=>'pasar_uang']) !!}
                                                      <span class="input-group-addon">%</span>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-md-4">
                                                <label class="control-label">Pendapatan Tetap</label>
                                              </div> 
                                              <div class="col-md-8">
                                                  <div class="input-group">
                                                      {!! Form::text('pendapatan_tetap', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '','id'=>'pendapatan_tetap']) !!}
                                                      <span class="input-group-addon">%</span>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-md-4">
                                                <label class="control-label">Saham</label>
                                              </div>
                                              <div class="col-md-8">
                                                  <div class="input-group">
                                                      {!! Form::text('saham', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '','id'=>'saham']) !!}
                                                      <span class="input-group-addon">%</span>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-8">
                                                <h4>ASUMSI</h4>
                                            </div>
                                        </div>

                                        <h4>Return DPLK/tahun</h4>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Pasar Uang</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('asusmsi_pasar_uang', '6.98', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'asusmsi_pasar_uang']) !!}
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Pendapatan Tetap</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('asusmsi_pendapatan_tetap', '9.48', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'asusmsi_pendapatan_tetap']) !!}
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Saham</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('asusmsi_saham', '15.09', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'asusmsi_saham']) !!}
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">PSU Syariah</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('asusmsi_psu_syariah', '9.48', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'asusmsi_psu_syariah']) !!}
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Berimbang Syariah</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('asusmsi_berimbang_syariah', '15.09', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'asusmsi_berimbang_syariah']) !!}
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Bunga Tabungan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('bunga_tabungan', '3', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'bunga_tabungan']) !!}
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Pajak Bunga</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('pajak_bunga', '20', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'pajak_bunga']) !!}
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Inflasi</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    {!! Form::text('inflasi', '3.61', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'inflasi']) !!}
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="padding-left:10px;">
                                            <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Hitung Simulasi </button>
                                        </div>
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Hapus </button>
                                        </div>
                                    </div>
                                    {!!  Form::close()  !!}
                                </div>

                                <div class="col-md-6">
                                  <div class="form-horizontal" role="form">
                                      <div class="form-group">
                                          <div class="col-md-4"></div>
                                          <div class="col-md-8">
                                              <h4>PROYEKSI MANFAAT</h4>
                                          </div>
                                      </div>
                                      <div class="form-group" id="interest_rate_div">
                                          <div class="col-md-4">
                                            <label class="control-label">Akumulasi Iuran</label>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="input-group">
                                                  <span class="input-group-addon">Rp</span>
                                                  {!! Form::text('akumulasi_iuran', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'akumulasi_iuran']) !!}
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group" id="interest_rate_div">
                                          <div class="col-md-4">
                                            <label class="control-label">Manfaat Sebelum Pajak</label>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="input-group">
                                                  <span class="input-group-addon">Rp</span>
                                                  {!! Form::text('manfaat_sebelum_pajak', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'manfaat_sebelum_pajak']) !!}
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group" id="interest_rate_div">
                                          <div class="col-md-4">
                                            <label class="control-label">Pajak Pensiun</label>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="input-group">
                                                  <span class="input-group-addon">Rp</span>
                                                  {!! Form::text('pajak_pensiun', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'pajak_pensiun']) !!}
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group" id="interest_rate_div">
                                          <div class="col-md-4">
                                            <label class="control-label">Manfaat Setelah Pajak</label>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="input-group">
                                                  <span class="input-group-addon">Rp</span>
                                                  {!! Form::text('manfaat_setelah_pajak', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'manfaat_setelah_pajak']) !!}
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group" id="interest_rate_div">
                                          <div class="col-md-4">
                                            <label class="control-label">Maksimal Penarikan</label>
                                          </div>
                                          <div class="col-md-8">
                                              <div class="input-group">
                                                  <span class="input-group-addon">Rp</span>
                                                  {!! Form::text('maksimal_penarikan', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'maksimal_penarikan']) !!}
                                              </div>
                                          </div>
                                      </div>


                                      <div id="pembayaran_manfaat_pensiun" class="hide">
                                      <div class="form-group">
                                          <div class="col-md-4"></div>
                                          <div class="col-md-8">
                                              <h4>PEMBAYARAN MANFAAT PENSIUN</h4>
                                          </div>
                                      </div>

                                        <div class="form-group" id="time_period_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Porsentasi Penarikan Tunai</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                  <select class="form-control" id="posentasi_penarikan" name="porsentasi_penarikan">
                                                    <option value="0"> 0</option>
                                                    <option value="20"> 20%</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Manfaat Pensiun Tunai</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('manfaat_pensiun_tunai', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'manfaat_pensiun_tunai']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Jenis Anuitas</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                  <select class="form-control" id="porsentasi_penarikan" name="porsentasi_penarikan">
                                                    <option value="single"> Single</option>
                                                    <option value="janda_duda"> Janda / Duda</option>
                                                    <option value="jada_duda_anak"> Janda / Duda + Anak</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="time_period_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Manfaat Janda / Duda + Anak</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                  <select class="form-control" id="manfaat_janda_duda_anak" name="manfaat_janda_duda_anak">
                                                    <option value="60"> 60%</option>
                                                    <option value="100"> 100%</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Manfaat Anuitas Bulanan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('manfaat_anuitas_bulanan', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'manfaat_anuitas_bulanan']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Manfaat Anuitas Janda / Duda</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('manfaat_anuitas_janda_duda', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'manfaat_anuitas_janda_duda']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Manfaat Anuitas Yatim / Piatu</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('manfaat_anuitas_yatim_piatu', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'manfaat_anuitas_yatim_piatu']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Akumulasi Anuitas</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('akumulasi_anuitas', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'akumulasi_anuitas']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="interest_rate_div">
                                            <div class="col-md-4">
                                              <label class="control-label">Cash Refund</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp</span>
                                                    {!! Form::text('cash_refund', '', ['class' => 'form-control numericOnly currency-rp','placeholder' => '0','id'=>'cash_refund']) !!}
                                                </div>
                                            </div>
                                        </div>

                                      </div>

                                  </div>
                                </div>
                                <div class="pull-right" style="padding-left:10px;">
                                    <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Hitung Simulasi </button>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Hapus </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.calculator.dplk.calculator-script')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Calculator\CalculatorRequest', '#form-calculator'); !!}
