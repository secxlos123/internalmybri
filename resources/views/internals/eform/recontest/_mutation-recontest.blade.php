@if (count($eformData['visit_report']['mutation']) > 0)
@foreach($eformData['visit_report']['mutation'] as $index => $mutation)
<div id="mutations">
  <div class="panel-body" style="border-style:solid;border-width:0.5px;border-color:#f3f3f3">
    <div class="row">
      <div class="col-md-4">
        <div class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-4 control-label">Nama Bank *:</label>
            <div class="col-md-6">
              {!! Form::select( 'mutation['.$index.'][bank]'
              , get_bank('all')
              , $eformData['visit_report']['mutation'][$index]['bank']
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
            <label class="col-md-4 control-label">No. Rekening *:</label>
            <div class="col-md-6">
              <input type="text" class="form-control numericOnly" name="mutations[{{$index}}][number]" maxlength="15" value="{{$eformData['visit_report']['mutation'][$index]['number']}}">
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
              <th>Tanggal *</th>
              <th>Nominal *</th>
              <th>Jenis Transaksi *</th>
              <th>Keterangan *</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($mutation['bankstatement'] as $key => $bank)
            <tr>
              <td>
                <div class="input-group count-row">
                  <input type="text" class="form-control" id="datepicker-inline" name="mutations[{{$index}}][tables][{{$key}}][date]" value="{{$eformData['visit_report']['mutation'][$index]['bankstatement'][$key]['date']}}">
                  <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                </div>
              </td>
              <td>
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                  <input type="text" class="form-control numericOnly currency-rp" name="mutations[{{$index}}][tables][{{$key}}][amount]" maxlength="16" value="{{$eformData['visit_report']['mutation'][$index]['bankstatement'][$key]['amount']}}">
                  <!-- <span class="input-group-addon">,00</span> -->
                </div>
              </td>
              <td>
                <select class="form-control" name="mutations[{{$index}}][tables][{{$key}}][type]">
                  <option disabled="">-- Pilih --</option>
                  <option @if($eformData['visit_report']['mutation'][$index]['bankstatement'][$key]['type'] == 'Transaksi Tidak Terkait Usaha') selected @else '' @endif value="Transaksi Tidak Terkait Usaha" >Transaksi Tidak Terkait Usaha</option>
                  <option @if($eformData['visit_report']['mutation'][$index]['bankstatement'][$key]['type'] == 'Transaksi Overbooking') selected @else '' @endif value="Transaksi Overbooking" >Transaksi Overbooking</option>
                </select>
              </td>
              <td>
                <input type="text" class="form-control" name="mutations[{{$index}}][tables][{{$key}}][note]" maxlength="255" value="{{$eformData['visit_report']['mutation'][$index]['bankstatement'][$key]['note']}}">
              </td>
              <td>
                <a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-info add-row" title="Tambah Row" id="add-row" data-row="0">
                  +
                </a>
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
          <div class="form-group mutation_file {!! $errors->has('mutation_file') ? 'has-error' : '' !!}">
            <label class="col-md-4 control-label">Unggah File Mutasi *</label>
            <div class="col-md-8">
              <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="mutations[{{$index}}][file]" accept="image/*,application/pdf,application/rar,application/zip">
              @if ($errors->has('mutation_file')) <p class="help-block">{{ $errors->first('mutation_file') }}</p> @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endif