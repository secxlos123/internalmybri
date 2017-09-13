<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-4 control-label">Nama Bank *:</label>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <input type="text" class="form-control numericOnly" name="account_number2" maxlength="12">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="accountTable">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Tanggal *</th>
                      <th>Nominal *</th>
                      <th>Jenis Transaksi *</th>
                      <th>Keterangan *</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>
                        <div class="input-group">
                            <input type="text" class="form-control" id="datepicker-inline" name="mutation_date">
                            <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                        </div>
                      </td>
                      <td>
                        <div class="input-group">
                            <span class="input-group-addon">Rp</span>
                            <input type="text" class="form-control numericOnly currency-rp" name="nominal" maxlength="12">
                            <!-- <span class="input-group-addon">,00</span> -->
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
                      <td>
                        <span class="form-control btn btn-danger delete-row" title="Tambah Row" id="delete-row"><i class="mdi mdi-delete"></i></span>
                      </td>
                  </tr>
              </tbody>
            </table>
            <p>
              <a href="javascript:void(0)" class="form-control btn btn-info" title="Tambah Row" id="add-row">Tambah Transaksi</a>
            </p>
        </div>
    </div>                            
</div>