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
                                <div class="card-box">
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
                                                            <label class="col-sm-4 control-label">Nomor Referensi :</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="ref_number" id="ref_number">
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group">
                                                            <label class="col-sm-4 control-label">Nama Customer :</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="customer_name" id="customer_name">
                                                            </div>
                                                        </div> --}}

                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Status Pengajuan :</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" id="status">
                                                                    <option selected="" value="All"> Semua</option>
                                                                    <option value="Rekomend">Pengajuan Kredit</option>
                                                                    <option value="Dispose">Disposisi Pengajuan</option>
                                                                    <option value="Initiate">Prakarsa</option>
                                                                    <option value="Submit">Proses CLF</option>
                                                                    <option value="Approval1">Kredit Disetujui</option>
                                                                    <option value="Approval2">Rekontes Kredit</option>
                                                                    <option value="Rejected">Kredit Ditolak</option>
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
                                                <th>No. Ref</th>
                                                <th>Nasabah</th>
                                                <th>Nominal</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>No. HP</th>
                                                <th>Status Prescreening</th>
                                                <th>Status</th>
                                                <th>Aging (hari)</th>
                                                <th>Status Data Nasabah</th>
                                                {{-- <th>Catatan Disposisi</th> --}}
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
@include('internals.eform._result-modal')
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
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });

    $(document).on('click', "#btn-filter", function(){
        table1.destroy();
        reloadData1($('#from').val(), $('#to').val(), $('#status').val());
    })

    // $(document).on('click', "#btn-prescreening", function(){
    //     console.log('click');

    //     $.ajax({
    //         dataType: 'json',
    //         type: 'GET',
    //         url: '{{ route("detailCustomer") }}',
    //         data: { nik : nik }

    //     }).done(function(data){
    //         // console.log(data);
    //         $('#detail').html(data['view']);
    //         $('#result-modal').modal('show');

    //     }).fail(function(errors) {
    //         // toastr.error('Data tidak ditemukan')

    //     });
    // });

    function reloadData1(from, to, status)
      {
        table1 = $('#datatable').DataTable({
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
                url : '/datatables/eform-ao',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.start_date = $('#from').val();
                    d.end_date = $('#to').val();
                    d.status = $('#status').val();
                    d.ref_number = $('#ref_number').val();
                    d.customer_name = $('#customer_name').val();
                }
            },
          aoColumns : [
                {   data: 'ref_number', name: 'ref_number', bSortable: false },
                {   data: 'customer_name', name: 'customer_name', bSortable: false  },
                {   data: 'request_amount', name: 'request_amount', bSortable: false  },
                {   data: 'created_at', name: 'created_at' },
                {   data: 'mobile_phone', name: 'mobile_phone', bSortable: false  },
                {   data: 'prescreening_status', name: 'prescreening_status', bSortable: false },
                {   data: 'status', name: 'created_at', bSortable: false },
                {   data: 'aging', name: 'aging' },
                {   data: 'response_status'
                    , name: 'response_status'
                    , bSortable: false
                    , mRender: function (data, type, full) {
                        text = '-';

                        if (full.response_status == 'approve') {
                            text = 'Telah Disetujui';

                        } else if(full.response_status == 'reject') {
                            text = 'Belum Disetujui';

                        } else if(full.response_status == 'unverified') {
                            text = 'Dalam Proses';

                        }
                        return text;
                    }
                },
                //{   data: 'aging', name: 'aging' },
                {   data: 'action', name: 'action', orderable: false, searchable: false}
            ],
      });
    }
</script>