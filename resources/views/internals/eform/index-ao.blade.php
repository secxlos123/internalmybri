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
                                <div class="card-box table-responsive">
                                    <div class="add-button">
                                        <!-- <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a> -->
                                        <a href="{{route('eform.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah Pengajuan Aplikasi</a>
                                        <!-- <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a> -->
                                    </div>
                                    <div id="filter" class="m-b-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card-box">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Tanggal Awal :</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control datepicker-inline" name="birth_date" value="{{ old('birth_date') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Tanggal Akhir :</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control datepicker-inline" name="birth_date" value="{{ old('birth_date') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Kantor Cabang :</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control">
                                                                    <option selected="" disabled=""> Semua</option>
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
                                                                    <option selected="" disabled="" value="0"> Semua</option>
                                                                    <option value="1">Hijau</option>
                                                                    <option value="2">Kuning</option>
                                                                    <option value="3">Merah</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="text-right">
                                                        <a href="#" class="btn btn-success waves-light waves-effect w-md">Filter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="datatable" class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>No. Ref</th>
                                                <th>Leads</th>
                                                <th>Nominal</th>
                                                <th>Tanggal Perjanjian</th>
                                                <th>No. HP</th>
                                                <th>Status Prescreening</th>
                                                <th>Status</th>
                                                <th>Aging (hari)</th>
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
@include('internals.layouts.footer')
@include('internals.layouts.foot') 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    var resizefunc = [];
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });
        $('#datatable').hide();

        // var table = $('#datatable').dataTable({
        //     searching : false,
        //     processing : true,
        //     serverSide : true,
        //     lengthMenu: [
        //         [ 10, 25, 50, -1 ],
        //         [ '10', '25', '50', 'All' ]
        //     ],
        //     language : {
        //         infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
        //     },
        //     ajax : {
        //         url : '/datatables/eform-ao',
        //         data : function(d, settings){
        //             var api = new $.fn.dataTable.Api(settings);

        //             d.page = Math.min(
        //                 Math.max(0, Math.round(d.start / api.page.len())),
        //                 api.page.info().pages
        //             );

        //             d.office_id = $('.offices').val();
        //         }
        //     },
        //     aoColumns : [
        //         {   data: 'ref', name: 'ref', bSortable: false },
        //         {   data: 'customer_name', name: 'customer_name', bSortable: false  },
        //         {   data: 'request_amount', name: 'request_amount', bSortable: false  },
        //         {   data: 'appointment_date', name: 'appointment_date' },
        //         {   data: 'mobile_phone', name: 'mobile_phone', bSortable: false  },
        //         {   data: 'prescreening_status', 
        //             name: 'prescreening_status', 
        //             bSortable: false,
        //             mRender: function (data, type, full) {
        //                 if(full.prescreening_status == 'Hijau'){
        //                     color = 'text-success';
        //                     text = 'Hijau';
        //                 }else if(full.prescreening_status == 'Kuning'){
        //                     color = 'text-warning';
        //                     text = 'Kuning';
        //                 }else if(full.prescreening_status == 'Merah'){
        //                     color = 'text-danger';
        //                     text = 'Merah';
        //                 }else {
        //                     color = '';
        //                     text = 'Pengajuan Baru';
        //                 }
        //                 return `<td class="align-middle"><p class="${color}">${text}</p></td>`;
        //             },
        //             createdCell:  function (td, cellData, rowData, row, col) {
        //                 $(td).attr('class', 'status'); 
        //             }},
        //         {   data: 'status', name: 'status' },
        //         {   data: 'aging', name: 'aging' },
        //         {   data: 'action', name: 'action', bSortable: false },
        //     ],
        // });

        $('#btn-filter').on('click', function () {
            table.fnDraw();
        });
        
        $('.office').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/offices',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.offices.data,
                        pagination: {
                            more: (params.page * data.cities.per_page) < data.offices.total
                        }
                    };
                },
                cache: true
            },
        });
    });

    TableManageButtons.init();
</script>