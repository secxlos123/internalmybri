<div class="row">
  <div class="col-md-12">
    <div class="card-box m-t-30">
      <h4 class="m-t-min30 m-b-30 header-title custom-title">Customer Baru</h4>
      <div class="panel-body">
        <!--bar nasabah baru-->
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <ul class="list-inline chart-detail-list">
                  </ul>
                </div>
                <div id="morris-bar-stacked" style="height: 300px;"></div>
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

        <!--table nasabah baru-->
        <div class="row">
          <div class="col-md-12">
            <div class="form-horizontal">
              <div class="form-group ">
                <div class="col-md-6">
                  <h5><b>10 Customer Baru</b></h5>
                </div>
                <div class="col-sm-6 text-right">
                  <a href="javascript:void(0);" class="btn btn-info waves-light waves-effect w-md" id="btn-print">Print</a>
                  <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-download">Download</a>
                </div>
              </div>
            </div>
            <table id="datatable" class="table table-bordered">
              <thead class="bg-primary">
                <tr>
                  <th>NIK</th>
                  <th>Nama Profil Customer</th>
                  <th>Email</th>
                  <th>Kota Tempat Tinggal</th>
                  <th>Handphone</th>
                  <th>Jenis Kelamin</th>
                  <!-- <th>Status</th> -->
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

  <div class="col-md-12">
    <div class="card-box m-t-30">
      <h4 class="m-t-min30 m-b-30 header-title custom-title">Properti Baru</h4>
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
                <label class="col-sm-2">Pilih Kota : </label>
                <div class="col-sm-6">
                {!! Form::select('cities', ['' => ''], old('cities'), [
                    'class' => 'select2 cities',
                    'data-placeholder' => 'Pilih Kota',
                    'id' => 'city'
                ]) !!}
                </div>
                <div class="col-sm-4">
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
            <table id="datatable-property" class="table table-bordered">
              <thead class="bg-primary">
                <tr>
                  <th>Nama Properti</th>
                  <th>Kota</th>
                  <th>Jumlah Tipe</th>
                  <th>Unit Properti</th>
                  <th>PIC</th>
                  <th>Telepon</th>
                  <th style="width: 150px">Aksi</th>
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