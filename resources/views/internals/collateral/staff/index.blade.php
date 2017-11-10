@section('title','My BRI - List Approval Pengajuan Properti Baru')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">List Approval Pengajuan Properti Baru</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li class="active">
                                List Approval Pengajuan Properti Baru
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
                        <div id="filter" class="m-b-15">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-box">
                                        <form class="form-horizontal" role="form">

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Status Approval Properti :</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="status">
                                                        <option selected="" value="All"> Semua</option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Not Approved</option>
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
                                    <th>No.</th>
                                    <th>Nama Proyek</th>
                                    <th>Kota</th>
                                    <th>Jumlah Tipe</th>
                                    <!-- <th>Jenis Produk</th> -->
                                    <th>Unit Properti</th>
                                    <th>PIC</th>
                                    <th>Telepon</th>
                                    <th>Staff Penilai</th>
                                    <th>Status Approval</th>                                           
                                    <th>Aksi</th>
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
@include('internals.layouts.footer')
@include('internals.layouts.foot') 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->

<script type="text/javascript">
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
                {   data: 'branch_id', name: 'branch_id', bSortable: false },
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
</script>