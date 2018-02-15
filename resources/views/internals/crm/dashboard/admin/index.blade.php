<div class="row">
  <div class="col-md-12">
    <div class="card-box m-t-30">
      <h4 class="m-t-min30 m-b-30 header-title custom-title"></h4>
      <div class="panel-body">
        <!--bar nasabah baru-->
        <div class="panel panel-default hide">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6">
                <div id="chart-all" style="height: 300px;"></div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row" >
                  <div class="form-horizontal">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Bulan :</label>
                        <div class="col-sm-6">
                          <select class="select2" id="m-bulan">
                            <option selected="">Semua</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Pemasar :</label>
                        <div class="col-sm-6">
                          <select required class="form-control select2" id="m-pemasar">
                              <option selected="">Semua</option>
                              @foreach($pemasar as $pm)
                              <option value="{{$pm['PERNR']}}">{{$pm['SNAME']}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Product :</label>
                        <div class="col-sm-6">
                          <select required class="form-control select2" id="m-product">
                              <option selected="">Semua</option>
                              @foreach($product as $pr)
                              <option>{{$pr['product_name']}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="hide">
                      <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
                    </div>
                  </div>
                </div>

                <div id="morris-bar-stacked" style="height: 300px;"></div>

              </div>
            </div>
          </div>
        </div>

        <div class="row hide">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">

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
                <div class="tab-scroll">
                  <table id="datatable" class="table table-bordered ">
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

        <!--table nasabah baru-->
        <div class="row">
          <div class="col-md-12">
            <div class="panel-body">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
