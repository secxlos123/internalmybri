@section('title','My BRI - E-Form')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">E-Form</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            E-Form
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">{{ \Session::get('success') }}</div>
                                @endif
                                <div class="card-box ">
                                    <div class="add-button">
                                        <!-- <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a> -->
                                        <a href="{{route('eform.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah Pengajuan Aplikasi</a>
                                        <!-- <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a> -->
                                    </div>
                                    <div id="filter" class="m-b-15">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="card-box">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Tanggal Pengajuan :</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="from" name="start_date">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" id="to" name="end_date">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Status Pengajuan :</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" id="status">
                                                                    <option selected="" value="All"> Semua</option>
                                                                    <option value="Rekomend">Rekomend</option>
                                                                    <option value="Dispose">Dispose</option>
                                                                    <option value="Initiate">Initiate</option>
                                                                    <option value="Submit">Submit</option>
                                                                    <option value="Approval1">Approval 1</option>
                                                                    <option value="Approval2">Approval 2</option>
                                                                    <option value="Rejected">Rejected</option>
                                                                    <option value="Onprogress">On Progress</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Status Prescreening :</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control">
                                                                    <option selected="" value="All"> Semua</option>
                                                                    <option value="1" class="text-success">Hijau</option>
                                                                    <option value="2" class="text-warning">Kuning</option>
                                                                    <option value="3" class="text-danger">Merah</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="text-right">
                                                        <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="datatable" class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>No. Ref Aplikasi</th>
                                                <th>Nama Nasabah</th>
                                                <th>Nominal</th>
                                                <th>Tanggal Pertemuan</th>
                                                <!-- <th>Jenis Produk</th> -->
                                                <th>KC BRI Terdekat</th>
                                                <th>Status Prescreening</th>
                                                <th>AO</th>
                                                <th>Status</th>
                                                <th>Aging (hari)</th>                                           
                                                <th style="width: 100px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr>
                                                <td class="align-middle">1</td>
                                                <td class="align-middle">123455667</td>
                                                <td class="align-middle">Nasabah 1</td>
                                                <td class="align-middle">Rp200.000.000,00</td>
                                                <td class="align-middle">BSD</td>
                                                <td class="align-middle">AO 1</td>
                                                <td class="align-middle text-warning">Proses</td>
                                                <td>
                                                    <button class="btn btn-icon btn-teal disabled">
                                                        <i class="mdi mdi-loupe"></i>
                                                    </button>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Screening">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">2</td>
                                                <td class="align-middle">54231343</td>
                                                <td class="align-middle">Nasabah 2</td>
                                                <td class="align-middle">Rp500.000.000,00</td>
                                                <td class="align-middle">Jaksel</td>
                                                <td class="align-middle">AO 2</td>
                                                <td class="align-middle text-success">Diterima</td>
                                                <td>
                                                    <button class="btn btn-icon btn-teal disabled">
                                                        <i class="mdi mdi-loupe"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-info disabled">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">3</td>
                                                <td class="align-middle">65423134</td>
                                                <td class="align-middle">Nasabah 3</td>
                                                <td class="align-middle">Rp900.000.000,00</td>
                                                <td class="align-middle">Jaksel</td>
                                                <td class="align-middle">AO 1</td>
                                                <td class="align-middle text-danger">Ditolak</td>
                                                <td>
                                                    <button class="btn btn-icon btn-teal disabled">
                                                        <i class="mdi mdi-loupe"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-info disabled">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">4</td>
                                                <td class="align-middle">76542315</td>
                                                <td class="align-middle">Nasabah 3</td>
                                                <td class="align-middle">Rp200.000.000,00</td>
                                                <td class="align-middle">BSD</td>
                                                <td class="align-middle">AO 2</td>
                                                <td class="align-middle">Pengajuan Baru</td>
                                                <td>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-teal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Assignment AO">
                                                        <i class="mdi mdi-loupe"></i>
                                                    </a>
                                                    <button class="btn btn-icon btn-info disabled">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
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
            searching: false,
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
           processing : true,
           serverSide : true,
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
                }
            },
          aoColumns : [
                {   data: 'ref_number', name: 'ref_number', bSortable: false  },
                {   data: 'customer_name', name: 'customer_name',  bSortable: false  },
                {   data: 'request_amount', name: 'request_amount',  bSortable: false  },
                {   data: 'created_at', name: 'created_at', bSortable: true },
                // {   data: 'product_type', name: 'product_type' },
                {   data: 'branch_id', name: 'branch_id', bSortable: false, className: 'hidden' },
                {   data: 'prescreening_status', 
                    name: 'prescreening_status', 
                    bSortable: false,
                    mRender: function (data, type, full) {
                        if(full.prescreening_status == 'Hijau'){
                            color = 'text-success';
                            text = 'Hijau';
                        }else if(full.prescreening_status == 'Kuning'){
                            color = 'text-warning';
                            text = 'Kuning';
                        }else if(full.prescreening_status == 'Merah'){
                            color = 'text-danger';
                            text = 'Merah';
                        }else {
                            color = '';
                            text = 'Pengajuan Baru';
                        }
                        return `<td class="align-middle"><p class="${color}">${text}</p></td>`;
                    },
                    createdCell:  function (td, cellData, rowData, row, col) {
                        $(td).attr('class', 'status'); 
                    }},
                {   data: 'ao_name', name: 'ao_name', bSortable: false },
                {   data: 'status', name: 'status', bSortable: true },
                {   data: 'aging', name: 'aging', bSortable: true },
                {   data: 'action', name: 'action', bSortable: false },
            ],
      }); 
      }
    // var resizefunc = [];
    // $(document).ready(function () {
    //     var lastStatusElement = null;
    //     $('.select2').select2({
    //         witdh : '100%',
    //         allowClear: true,
    //     });

    //     var table = $('#datatable').dataTable({
    //         searching : false,
    //         processing : true,
    //         serverSide : true,
    //         lengthMenu: [
    //             [ 10, 25, 50, -1 ],
    //             [ '10', '25', '50', 'All' ]
    //         ],
    //         language : {
    //             infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
    //         },
    //         ajax : {
    //             url : '/datatables/eform',
    //             data : function(d, settings){
    //                 var api = new $.fn.dataTable.Api(settings);

    //                 d.page = Math.min(
    //                     Math.max(0, Math.round(d.start / api.page.len())),
    //                     api.page.info().pages
    //                 );

    //                 d.office_id = $('.offices').val();
    //             }
    //         },
    //         aoColumns : [
    //             {   data: 'ref', name: 'ref', bSortable: false  },
    //             {   data: 'customer_name', name: 'customer_name',  bSortable: false  },
    //             {   data: 'request_amount', name: 'request_amount',  bSortable: false  },
    //             {   data: 'appointment_date', name: 'appointment_date' },
    //             // {   data: 'product_type', name: 'product_type' },
    //             {   data: 'branch_id', name: 'branch_id' },
    //             {   data: 'prescreening_status', 
    //                 name: 'prescreening_status', 
    //                 bSortable: false,
    //                 mRender: function (data, type, full) {
    //                     if(full.prescreening_status == 'Hijau'){
    //                         color = 'text-success';
    //                         text = 'Hijau';
    //                     }else if(full.prescreening_status == 'Kuning'){
    //                         color = 'text-warning';
    //                         text = 'Kuning';
    //                     }else if(full.prescreening_status == 'Merah'){
    //                         color = 'text-danger';
    //                         text = 'Merah';
    //                     }else {
    //                         color = 'text-info';
    //                         text = 'On Progress';
    //                     }
    //                     return `<td class="align-middle"><p class="${color}">${text}</p></td>`;
    //                 },
    //                 createdCell:  function (td, cellData, rowData, row, col) {
    //                     $(td).attr('class', 'status'); 
    //                 }},
    //             {   data: 'ao', name: 'ao', bSortable: false },
    //             {   data: 'status', name: 'status' },
    //             {   data: 'aging', name: 'aging' },
    //             {   data: 'action', name: 'action', bSortable: false },
    //         ],
    //     });

    //     $('#btn-filter').on('click', function () {
    //         table.fnDraw();
    //     });
        
    //     $('.office').select2({
    //         witdh : '100%',
    //         allowClear: true,
    //         ajax: {
    //             url: '/offices',
    //             dataType: 'json',
    //             delay: 250,
    //             data: function (params) {
    //                 return {
    //                     name: params.term,
    //                     page: params.page || 1
    //                 };
    //             },
    //             processResults: function (data, params) {
    //                 params.page = params.page || 1;
    //                 return {
    //                     results: data.offices.data,
    //                     pagination: {
    //                         more: (params.page * data.cities.per_page) < data.offices.total
    //                     }
    //                 };
    //             },
    //             cache: true
    //         },
    //     });
    // });

    // TableManageButtons.init();
</script>