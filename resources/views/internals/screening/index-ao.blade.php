@section('title','My BRI - Prescreening')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style>
td.details1-control {
    background: url('assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details1-control {
    background: url('assets/images/details_close.png') no-repeat center center;
}
</style>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Prescreening</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Prescreening
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
                                <div class="card-box">
                                    <div id="filter" class="m-b-15">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="card-box">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Status Prescreening :</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" id="is_screening">
                                                                    <option selected="" value="All"> Semua</option>
                                                                    <option value="1">Sudah</option>
                                                                    <option value="0">Belum</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="text-right">
                                                        <a href="javascript:void(0);" class="btn btn-success waves-light waves-effect w-md" id="btn-filter">Filter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <table id="datatable" class="table table-bordered">
                                    <thead class="bg-primary">
                                        <tr><th>Cabang</th>
                                                <th>Jenis Produk</th>
                                                <th>Nama AO</th>
                                                <th>Data Nasabah</th>
                                                <th>plafond</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Status prescreening</th>
                                                <th>Status Nasabah</th>
                                                <th>Aksi</th>
                                                <th>Detail</th>
                                        </tr>
                                    </thead>
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

function detail(d){
alert('tester');
    var m = '';
    m = '<table width="1000px" cellpadding="2" cellspacing="0" border="0" style="padding-left:50px;">'+
		'<tr>'+
            '<td width="50%">Reff Number</td>'+
            '<td width="50%">:  '+d.ref_number+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td width="50%">NIK</td>'+
            '<td width="50%">:  '+d.nik+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td width="50%">Nama Nasabah</td>'+
            '<td width="50%">:  '+d['customer']['personal']['first_name']+' '+(d['customer']['personal']['last_name']==null ? '' : d['customer']['personal']['last_name'])+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td width="30%">Tanggal Lahir:</td>'+
            '<td width="70%">:  '+d['customer']['personal']['birth_date']+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td width="30%">Status</td>'+
            '<td width="70%">:  '+d['customer']['personal']['status']+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td width="30%">NIK pasangan</td>'+
            '<td width="70%">:  '+d['customer']['personal']['couple_nik']+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td width="30%">Nama Pasangan:</td>'+
            '<td width="70%">:  '+d['customer']['personal']['couple_name']+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td width="30%">Tanggal Lahir Pasangan:</td>'+
            '<td width="70%">:  '+d['customer']['personal']['couple_birth_date']+'</td>'+
        '</tr>'+

        '<tr>'+
            '<td width="50%">Tanggal Pengajuan</td>'+
            '<td width="50%">:  '+d.created_at+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td width="50%">Aging</td>'+
            '<td width="50%">:  '+d.aging+'</td>'+
        '</tr>'+
    '</table>'+'<img src="'+d['customer']['personal']['couple_identity']+'">'+
            '<img src="'+d['customer']['other']['identity']+'">';
    return m;
}

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
                url : '/datatables/screening-ao',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.start_date = $('#from').val();
                    d.end_date = $('#to').val();
                    d.status = $('#status').val();
                    d.is_screening = $('#is_screening').val();
                }
            },
          aoColumns : [


                {   data: 'branch', name: 'branch', bSortable: false },
                {   data: 'product_type', name: 'product_type', bSortable: false  },
                {   data: 'ao_name', name: 'ao_name', bSortable: false  },
                {   data: 'customer_name', name: 'customer_name', bSortable: false  },
                {   data: 'request_amount', name: 'request_amount', bSortable: false  },
                {   data: 'created_at', name: 'created_at', bSortable: false  },
                {   data: 'is_screening', name: 'is_screening', bSortable: false  },
//                {   data: 'ref_number', name: 'ref_number', bSortable: false  },
 //               {   data: 'nik', name: 'nik', bSortable: false  },
//                {   data: 'customer_name', name: 'customer_name' },


                {   data: 'status_pernikahan', name: 'status_pernikahan', bSortable: false  },
                {   data: 'action', name: 'action', bSortable: false },
                {
                "className":      'details1-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
                },
            ],
      });

          $('#datatable tbody').on('click', 'td.details1-control', function () {
        var tr = $(this).closest('tr');
        var row = table1.row(tr);
        var data = table1.row().data();
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child(detail(row.data())).show();
            tr.addClass('shown');
        }
    } );
    }
    // var resizefunc = [];
    // $(document).ready(function () {
    //     var lastStatusElement = null;
    //     // $('#datatable').hide();


    //     // $('#filter').on('click', function () {
    //     // var table = $('#datatable').dataTable({
    //     //     searching : false,
    //     //     processing : true,
    //     //     serverSide : true,
    //     //     lengthMenu: [
    //     //         [ 10, 25, 50, -1 ],
    //     //         [ '10', '25', '50', 'All' ]
    //     //     ],
    //     //     language : {
    //     //         infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
    //     //     },
    //     //     ajax : {
    //     //         url : '/datatables/eform-ao',
    //     //         data : function(d, settings){
    //     //             var api = new $.fn.dataTable.Api(settings);

    //     //             d.page = Math.min(
    //     //                 Math.max(0, Math.round(d.start / api.page.len())),
    //     //                 api.page.info().pages
    //     //             );

    //     //             d.office_id = $('.offices').val();
    //     //         }
    //     //     },
    //     //     aoColumns : [
    //     //         {   data: 'ref', name: 'ref', bSortable: false },
    //     //         {   data: 'customer_name', name: 'customer_name', bSortable: false  },
    //     //         {   data: 'request_amount', name: 'request_amount', bSortable: false  },
    //     //         {   data: 'created_at', name: 'created_at' },
    //     //         {   data: 'mobile_phone', name: 'mobile_phone', bSortable: false  },
    //     //         {   data: 'prescreening_status',
    //     //             name: 'prescreening_status',
    //     //             bSortable: false,
    //     //             mRender: function (data, type, full) {
    //     //                 if(full.prescreening_status == 'Hijau'){
    //     //                     color = 'text-success';
    //     //                     text = 'Hijau';
    //     //                 }else if(full.prescreening_status == 'Kuning'){
    //     //                     color = 'text-warning';
    //     //                     text = 'Kuning';
    //     //                 }else if(full.prescreening_status == 'Merah'){
    //     //                     color = 'text-danger';
    //     //                     text = 'Merah';
    //     //                 }else {
    //     //                     color = '';
    //     //                     text = 'Pengajuan Baru';
    //     //                 }
    //     //                 return `<td class="align-middle"><p class="${color}">${text}</p></td>`;
    //     //             },
    //     //             createdCell:  function (td, cellData, rowData, row, col) {
    //     //                 $(td).attr('class', 'status');
    //     //             }},
    //     //         {   data: 'status', name: 'status' },
    //     //         {   data: 'aging', name: 'aging' },
    //     //         {   data: 'action', name: 'action', bSortable: false },
    //     //     ],

    //     // });

    //     //     // table.fnDraw();
    //     // });

    // });

    // TableManageButtons.init();
</script>