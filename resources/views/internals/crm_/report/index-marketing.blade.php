@section('title','My BRI - Index Report')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">

          <div class="page-title-box">
            <h4 class="page-title">Daftar Report</h4>
            <ol class="breadcrumb p-0 m-0">
              <li>
                <a href="">Dashboard</a>
              </li>
              <li class="active">
                Daftar Report
              </li>
            </ol>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      @if (\Session::has('success'))
      <div class="alert alert-success">{{ \Session::get('success') }}</div>
      @endif
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">
            <fieldset hidden>
              <div class="add-button">
                <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a>
                <!--  <a href="{{route('customers.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah Profil Customer</a> -->
                <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-sync"></i> Sinkronisasi Profil Customer</a>
                <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a>
              </div>
            </fieldset>
            <div id="filter" class="m-b-15">
              <div class="row">
                <div class="col-md-8">
                  <div class="card-box">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal :</label>
                        <div class="col-sm-4">
                          <input type="text" placeholder="Awal" class="form-control" id="from" name="start_date">
                        </div>
                        <div class="col-sm-4">
                          <input type="text" placeholder="Akhir" class="form-control" id="to" name="end_date">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Kantor Wilayah :</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="kanwil" name="kanwil">
                            <option selected="" value="All"> Semua</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Kantor Cabang :</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="kacab" name="kacab">
                            <option selected="" value="All"> Semua</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Unit Kerja :</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="uker" name="uker">
                            <option selected="" value="All"> Semua</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Pemasar :</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="status">
                            <option selected="" value="All"> Semua</option>
                          </select>
                        </div>
                      </div>

                    </form>
                    <div class="text-right">
                      <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Cari</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-scroll table-responsive">
              <table id="datatable" class="table table-bordered">
                <thead class="bg-primary text-center">
                  <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Bulan</th>
                    <th rowspan="2">Tahun</th>
                    <th rowspan="2">Wilayah</th>
                    <th rowspan="2">Cabang</th>
                    <th rowspan="2">Unit Kerja</th>
                    <th rowspan="2">Nama Pemasar</th>
                    <th rowspan="2">Produk</th>
                    <th rowspan="2">Jenis</th>
                    <th rowspan="2">Nama Nasabah</th>
                    <th rowspan="2">Target</th>
                    <th colspan="3">Realisasi</th>
                    <th rowspan="2">Status</th>
                  </tr>
                  <tr>
                    <th>No Rekening</th>
                    <th>Volume</th>
                    <th>Tanggal Closing</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Desember</td>
                    <td>2016</td>
                    <td>DKI</td>
                    <td>Sudirman</td>
                    <td>KC. Sudirman</td>
                    <td>Oktifial Pangestuti</td>
                    <td>Giro</td>
                    <td>Akuisisi</td>
                    <td>Eka Putra</td>
                    <td>100.000.000</td>
                    <td>1092-1290-1290</td>
                    <td>93.000.000</td>
                    <td>21-2-2018</td>
                    <td>On Progress</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Januari</td>
                    <td>2017</td>
                    <td>DKI</td>
                    <td>Sudirman</td>
                    <td>KC. Sudirman</td>
                    <td>Achmad Aliyudin</td>
                    <td>Giro</td>
                    <td>Akuisisi</td>
                    <td>Farra Ghea Fauzea</td>
                    <td>200.000.000</td>
                    <td>1092-1290-1290</td>
                    <td>300.000.000</td>
                    <td>22-2-2018</td>
                    <td>On Progress</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- <div class="text-right">
            <a href="{{url('/add_Report')}}" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Buat Report</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script type="text/javascript">
  $(document).ready(function(){

    $("#from").datepicker({
      todayBtn:  1,
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd',
    }).on('changeDate', function (selected) {
      var minDate = new Date(selected.date.valueOf());
      $('#to').datepicker('setStartDate', minDate);
    });

    $("#to").datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    }).on('changeDate', function (selected) {
      var maxDate = new Date(selected.date.valueOf());
      $('#from').datepicker('setEndDate', maxDate);
    });

  });

  var table1 = $('#datatable').DataTable({
    searching : false,
    order : [[3, 'asc']],
    "language": {
      "emptyTable": "No data available in table"
    }
  });

  $(document).on('click', "#btn-filter", function(){
    table1.destroy();
    reloadData1($('#from').val(), $('#to').val(), $('#status').val());
  })

  function reloadData1(from, to, status)
  {
    table1 = $('#datatable').DataTable({
      searching : false,
      processing : true,
      serverSide : true,
      order : [[3, 'asc']],
      lengthMenu: [
      [ 10, 25, 50, -1 ],
      [ '10', '25', '50', 'All' ]
      ],
      language : {
        infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
      },
      ajax : {
        url : '/datatables/eform',
        data : function(d, settings){
          var api = new $.fn.dataTable.Api(settings);

          d.page = Math.min(
          Math.max(0, Math.round(d.start / api.page.len())),
          api.page.info().pages
          );

          d.start_date = from;
          d.end_date = to;
          d.status = status;
          d.ref_number = $('#ref_number').val();
          d.customer_name = $('#customer_name').val();
          d.prescreening = $('#prescreening_filter').val();
          d.product = $('#product_filter').val();
        }
      },
      aoColumns : [
      {   data: 'ref_number', name: 'ref_number',  bSortable: false },
      {   data: 'customer_name', name: 'customer_name',  bSortable: false  },
      {   data: 'request_amount', name: 'request_amount',  bSortable: false  },
      {   data: 'created_at', name: 'created_at' },
      // {   data: 'product_type', name: 'product_type' },
      {   data: 'branch_id', name: 'branch_id', bSortable: false, className: 'hidden' },
      {   data: 'prescreening_status', name: 'prescreening_status', bSortable: false },
      {   data: 'id', name: 'eforms.id', bSortable: false, className: 'hidden' },
      {   data: 'ao_name', name: 'ao_name', bSortable: false },
      {   data: 'status', name: 'status', bSortable: false },
      {   data: 'aging', name: 'aging' },
      {   data: 'action', name: 'action', orderable: false, searchable: false},
      ],
    });
  }
</script>
