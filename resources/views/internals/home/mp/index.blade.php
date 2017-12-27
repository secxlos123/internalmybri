<div class="row">
  <div class="col-md-12">
    <div class="card-box m-t-30">
      <h4 class="m-t-min30 m-b-30 header-title custom-title">List Pengajuan Baru</h4>
      <div class="panel-body">
        <!--bar properti baru-->
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <ul class="list-inline chart-detail-list">
                  </ul>
                </div>
                <div id="property-bar-stacked" style="height: 300px;"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <div class="form-horizontal" >
                    <h4>Filter Diagram Berdasarkan Bulan</h4>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Mulai Dari :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control datepicker-autoclose" id="from" name="start_date">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Hingga :</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control datepicker-autoclose" id="to" name="end_date">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label"></label>
                      <div class="col-sm-6">
                        <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--table properti baru-->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="col-sm-2">Mulai Dari : </label>
              <div class="col-sm-3"> <input type="text" class="form-control datepicker-autoclose" id="from" name="start_date"> </div>
              <label class="col-sm-2">Hingga : </label>
              <div class="col-sm-3"> <input type="text" class="form-control datepicker-autoclose" id="to" name="end_date"> </div>
              <div class="col-sm-2">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-horizontal">
              <div class="form-group ">
                <div class="col-md-6">
                  <h5><b>List Properti Baru</b></h5>
                </div>
                <div class="col-sm-6 text-right">
                  <a href="javascript:void(0);" class="btn btn-info waves-light waves-effect w-md" id="btn-print">Print</a>
                  <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-download">Download</a>
                </div>
              </div>
            </div>
            <div class="tab-scroll">
              <table id="datatable" class="table table-bordered display responsive nowrap dataTable no-footer dtr-inline collapsed">
                <thead class="bg-primary">
                  <tr>
                    <th>No. Ref Aplikasi</th>
                    <th>Nama Nasabah</th>
                    <th>Nominal</th>
                    <th>Tanggal Pertemuan</th>
                    <!-- <th>Jenis Produk</th> -->
                    <!-- <th>KC BRI Terdekat</th> -->
                    <th>Status Prescreening</th>
                    <th>AO</th>
                    <th>Status</th>
                    <th>Aging (hari)</th>
                    <th style="width: 100px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>