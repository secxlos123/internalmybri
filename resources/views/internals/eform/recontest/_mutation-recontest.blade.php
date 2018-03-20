@if (count($eformData['visit_report']['mutation']) > 0)
@foreach($eformData['visit_report']['mutation'] as $index => $mutation)
<div>
  <div class="panel-body" style="border-style:solid;border-width:0.5px;border-color:#f3f3f3">
    <div class="row">
      <div class="col-md-4">
        <div class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-4 control-label">Nama Bank :</label>
            <div class="col-md-6">
              <p class="form-control-static"> {{strtoupper($eformData['visit_report']['mutation'][$index]['bank'])}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-4 control-label">No. Rekening :</label>
            <div class="col-md-6">
              <p class="form-control-static"> {{$eformData['visit_report']['mutation'][$index]['number']}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 pull-right">
        <div class="form-horizontal" role="form">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nominal</th>
              <th>Jenis Transaksi</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @foreach($mutation['bankstatement'] as $key => $bank)
            <tr>
              <td>
                <p class="form-control-static"> {{$eformData['visit_report']['mutation'][$index]['bankstatement'][$key]['date']}}</p>
              </td>
              <td>
                <p class="form-control-static">Rp. {{number_format($eformData['visit_report']['mutation'][$index]['bankstatement'][$key]['amount'], 2, ',', '.')}}</p>
              </td>
              <td>
                <p class="form-control-static">{{$eformData['visit_report']['mutation'][$index]['bankstatement'][$key]['type']}}</p>
              </td>
              <td>
                <p class="form-control-static">{{$eformData['visit_report']['mutation'][$index]['bankstatement'][$key]['note']}}</p>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="col-md-6" align="center">
          <div class="card-box">
            @if((pathinfo(strtolower($eformData['visit_report']['mutation'][$index]['file']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($eformData['visit_report']['mutation'][$index]['file']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($eformData['visit_report']['mutation'][$index]['file'])), PATHINFO_EXTENSION) == 'jpeg'))
            <img src="@if(!empty($eformData['visit_report']['mutation'][$index]['file'])){{$eformData['visit_report']['mutation'][$index]['file']}}@endif" class="img-responsive">
            <p>File Mutasi</p>
            @else
            <a href="@if(!empty($eformData['visit_report']['mutation'][$index]['file'])){{$eformData['visit_report']['mutation'][$index]['file']}}@endif" target="_blank"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
            <p>Klik Untuk Lihat File Mutasi</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endif
<div id="mutations">
  <div class="panel-body" style="border-style:solid;border-width:0.5px;border-color:#f3f3f3">
    <div class="row">
      <h4>Tambahan Data Mutasi :</h4>
      <div class="col-md-4">
        <div class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-4 control-label">Nama Bank :</label>
            <div class="col-md-6">
              {!! Form::select( 'mutations[0][bank]'
              , get_bank('all')
              , old('mutations[0][bank]')
              , [
              'class' => 'form-control '
              , 'placeholder' => 'Pilih Bank'
              ]
              ) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-4 control-label">No. Rekening :</label>
            <div class="col-md-6">
              <input type="text" class="form-control numericOnly" name="mutations[0][number]" maxlength="15" value="{{old('mutations[0][number]')}}">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 pull-right">
        <div class="form-horizontal" role="form">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered accountTable" id="accountTable0">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nominal</th>
              <th>Jenis Transaksi</th>
              <th>Keterangan</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="input-group count-row">
                  <input type="text" class="form-control" id="datepicker-inline" name="mutations[0][tables][0][date]">
                  <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                </div>
              </td>
              <td>
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                  <input type="text" class="form-control numericOnly currency-rp" name="mutations[0][tables][0][amount]" maxlength="16">
                  <!-- <span class="input-group-addon">,00</span> -->
                </div>
              </td>
              <td>
                <select class="form-control" name="mutations[0][tables][0][type]">
                  <option selected disabled="">-- Pilih --</option>
                  <option value="Transaksi Tidak Terkait Usaha" >Transaksi Tidak Terkait Usaha</option>
                  <option value="Transaksi Overbooking" >Transaksi Overbooking</option>
                </select>
              </td>
              <td>
                <input type="text" class="form-control" name="mutations[0][tables][0][note]" maxlength="255">
              </td>
              <td>
                <a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-info add-row" title="Tambah Row" id="add-row" data-row="0">
                  +
                </a>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="col-md-6" align="center">
          <div class="form-group mutation_file {!! $errors->has('mutation_file') ? 'has-error' : '' !!}">
            <label class="col-md-4 control-label">Unggah File Mutasi</label>
            <div class="col-md-8">
              <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="mutations[0][file]" accept="image/*,application/pdf,application/rar,application/zip">
              @if ($errors->has('mutation_file')) <p class="help-block">{{ $errors->first('mutation_file') }}</p> @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

