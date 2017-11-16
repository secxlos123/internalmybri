<div id="mutations">
  <div class="panel-body" style="border-style:solid;border-width:0.5px;border-color:#f3f3f3">
    <div class="row">
        <div class="col-md-4">
            <div class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-4 control-label">Nama Bank *:</label>
                    <div class="col-md-6">
                        <select class="form-control bank" name="mutations[0][bank]">
                            <option selected="">-- Pilih Bank --</option>
                            <option value="bni">BNI</option>
                            <option value="mandiri">Bank Mandiri</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-4 control-label">No. Rekening *:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control numericOnly" name="mutations[0][number]" maxlength="12">
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
                  <tr>
                      <td>
                        <div class="input-group">
                            <input type="text" class="form-control" id="datepicker-inline" name="mutations[0][tables][0][date]">
                            <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" class="form-control numericOnly currency-rp" name="mutations[0][tables][0][amount]" maxlength="24">
                            <!-- <span class="input-group-addon">,00</span> -->
                        </div>
                      </td>
                      <td>
                        <select class="form-control" name="mutations[0][tables][0][type]">
                            <option selected="" disabled="">-- Pilih --</option>
                            <option>Transaksi Tidak Terkait Usaha</option>
                            <option>Transaksi Overbooking</option>
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
            <div class="col-md-6">
              <div class="form-group mutation_file {!! $errors->has('mutation_file') ? 'has-error' : '' !!}">
                  <label class="col-md-4 control-label">Unggah File Mutasi *</label>
                  <div class="col-md-8">
                      <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="glyphicon glyphicon-folder-open" data-placeholder="Tidak ada file" name="mutations[0][file]" accept="image/png,image/jpg,application/pdf,application/docx">
                      @if ($errors->has('mutation_file')) <p class="help-block">{{ $errors->first('mutation_file') }}</p> @endif
                  </div>
              </div>
            </div>
        </div>                    
</div>
</div>