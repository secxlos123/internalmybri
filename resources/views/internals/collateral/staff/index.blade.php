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
                                                        <option value="1">Baru</option>
                                                        <option value="2">Sedang Di Proses</option>
                                                        <option value="3">Menunggu Persetujuan</option>
                                                        <option value="4">Disetujui</option>
                                                        <option value="5">Ditolak</option>
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
                                    <!-- <th>No.</th> -->
                                    <th>Nama Proyek</th>
                                    <th>Kota</th>
                                    <th>Jumlah Tipe</th>
                                    <!-- <th>Jenis Produk</th> -->
                                    <th>Unit Properti</th>
                                    <th>PIC</th>
                                    <th>Telepon</th>
                                    <th>Staff Penilai</th>
                                    <th>Status Approval</th>                                           
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
@include('internals.layouts.footer')
@include('internals.layouts.foot') 
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
            url : '/datatables/staff-collateral',
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
                {   data: 'prop_name', name: 'prop_name', bSortable: false  },
                {   data: 'prop_city_name', name: 'prop_city_name',  bSortable: false  },
                {   data: 'prop_types', name: 'prop_types',  bSortable: false  },
                {   data: 'prop_items', name: 'prop_items', bSortable: true },
                // {   data: 'product_type', name: 'product_type' },
                {   data: 'prop_pic_name', name: 'prop_pic_name', bSortable: false },
                {   data: 'prop_pic_phone', name: 'prop_pic_phone', bSortable: false },
                {   data: 'staff_name', name: 'staff_name', bSortable: false },
                {   data: 'status', name: 'status', bSortable: true },
                {   data: 'action', name: 'action', bSortable: false, bSearchable: false },
                ],
            }); 
    }
</script>