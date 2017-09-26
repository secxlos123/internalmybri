@section('title','My BRI - Daftar Leads')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                
                                <div class="page-title-box">
                                    <h4 class="page-title">Daftar Leads</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Daftar Leads
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
                                <div class="card-box table-responsive">
                                    <fieldset hidden>
                                        <div class="add-button">
                                            <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a>
                                           <!--  <a href="{{route('customers.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah Leads</a> -->
                                            <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-sync"></i> Sinkronisasi Leads</a>
                                            <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a>
                                        </div>
                                    </fieldset>
                                    <div id="filter" class="collapse m-b-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card-box">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Kota :</label>
                                                            <div class="col-sm-8">
                                                            {!! Form::select('cities', ['' => ''], old('cities'), [
                                                                'class' => 'select2 cities',
                                                                'data-placeholder' => 'Pilih Kota'
                                                            ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Jenis Kelamin :</label>
                                                            <div class="col-sm-8">
                                                            <select name="gender" class="form-control">
                                                                <option disabled="" selected="">Pilih Jenis Kelamin</option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="L">Perempuan</option>
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
                                                <th>NIK</th>
                                                <th>Nama Leads</th>
                                                <th>Email</th>
                                                <th>Kota</th>
                                                <th>Handphone</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr>
                                                <td class="align-middle">1</td>
                                                <td class="align-middle">123455667</td>
                                                <td class="align-middle">Leads 1</td>
                                                <td class="align-middle">xx@xx.com</td>
                                                <td class="align-middle">Kota 1</td>
                                                <td class="align-middle">21213212</td>
                                                <td class="align-middle">Laki-laki</td>
                                                <td>
                                                    <a href="{{route('customers.edit', 1)}}" class="btn btn-icon waves-effect waves-light btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="{{route('customers.show', 1)}}" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });

        var table = $('#datatable').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax" : {
                url : '/datatables/customers',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.office_id = $('.offices').val();
                }
            },
            "aoColumns" : [
                { data: "nik", name: 'nik' },
                { data: "name", name: 'name' },
                { data: "email", name: 'email' },
                { data: "city", name: 'office_name' },
                { data: "phone", name: 'phone' },
                { data: "gender", name: 'gender' },
                { data: "action", name: 'action', bSortable: false },
            ],
        });

        $('#btn-filter').on('click', function () {
            table.fnDraw();
        });
        
        $('.cities').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/cities',
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
                        results: data.cities.data,
                        pagination: {
                            more: (params.page * data.cities.per_page) < data.cities.total
                        }
                    };
                },
                cache: true
            },
        });
    });

    $('.cities').on('select2:select', function (e) {
        var citi_id = e.params.data.id;
    });

    TableManageButtons.init();
</script>