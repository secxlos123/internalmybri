@section('title','My BRI - Daftar Approval Perubahan Data Pihak Ke-3')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="page-title-box">
                                    <h4 class="page-title">Daftar Approval Perubahan Data Pihak Ke-3</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Daftar Approval Perubahan Data Pihak Ke-3
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
                                            <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-sync"></i> Sinkronisasi Approval Perubahan Data</a>
                                            <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a>
                                        </div>
                                    </fieldset>
                                    <div id="filter" class="m-b-15">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="card-box">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Kota :</label>
                                                            <div class="col-sm-8">
                                                            {!! Form::select('cities', ['' => ''], old('cities'), [
                                                                'class' => 'select2 cities',
                                                                'data-placeholder' => 'Pilih Kota',
                                                                'id' => 'city'
                                                            ]) !!}
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

                                    <table id="datatable" class="table table-bordered display responsive nowrap dataTable no-footer dtr-inline collapsed">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Kota</th>
                                                <th>Handphone</th>
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

<script type="text/javascript">
    var table1 = $('#datatable').DataTable({
        searching: false,
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#btn-filter", function(){
        table1.destroy();
        reloadData1($('.cities').val());
    })

    function reloadData1(nik, customer_name, city_id){
        table1 = $('#datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "searching": false,
            "ajax" : {
                url : '/datatables/approval-third-party',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.city_id = city_id;
                }
            },
            "columns" : [
                { data: "company_name", name: 'company_name' },
                { data: "address", name: 'address' },
                { data: "city_id", name: 'city_id' },
                { data: "mobile_phone", name: 'mobile_phone' },
                { data: "action", name: 'action', bSortable: false },
            ],
        });
    }

    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
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
</script>