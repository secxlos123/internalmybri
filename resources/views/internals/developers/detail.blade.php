@section('title','MyBRI - Detail Mitra Kerjasama')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Mitra Kerjasama "{{$dataDev['developer_name']}}" </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('customers.index')}}">Mitra Kerjasama</a>
                            </li>
                            <li class="active">
                                Detail Mitra Kerjasama
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#developer-info" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-info"></i></span>
                                    <span class="hidden-xs">Mitra Kerjasama Info</span>
                                </a>
                            </li>
                            <fieldset hidden>
                                <li class="">
                                    <a href="#contact-list" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-phone"></i></span>
                                        <span class="hidden-xs">Contact List</span>
                                    </a>
                                </li>
                            </fieldset>
                            <li class="">
                                <a href="#property-list" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-list"></i></span>
                                    <span class="hidden-xs">Property List</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="developer-info">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="dev-logo m-b-10">
                                                        <img src="{{$dataDev['image']}}" class="img-thumbnail">
                                                    </div>
                                                    <h3 class="m-b-10">{{$dataDev['company_name']}}</h3>
                                                </div>
                                            </div>
                                            <hr class="w-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Nama PIC :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$dataDev['developer_name']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Alamat Kantor :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$dataDev['address']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Kota :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$dataDev['city_name']}}</p>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Alamat Email :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$dataDev['email']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">No. Telepon :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$dataDev['phone']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">No. Handphone :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$dataDev['mobile_phone']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Ringkasan :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{$dataDev['summary']}}</p>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="contact-list">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box table-responsive">
                                            <button class="btn btn-primary waves-light waves-effect w-md m-b-15"  data-toggle="modal" data-target="#add"><i class="mdi mdi-plus-circle-outline"></i> Tambah Nasabah</button>
                                            <table class="table table-bordered">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Contact Person</th>
                                                        <th>Alamat Email</th>
                                                        <th>No. Telepon</th>
                                                        <th>Kantor Cabang</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle">1</td>
                                                        <td class="align-middle">John Doe</td>
                                                        <td class="align-middle">john@domain.com</td>
                                                        <td class="align-middle">08782345678</td>
                                                        <td class="align-middle">Bandung</td>
                                                        <td>
                                                            <span data-toggle="modal" data-target="#edit">
                                                                <button class="btn btn-icon waves-effect waves-light btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                    <i class="mdi mdi-pencil"></i>
                                                                </button>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">2</td>
                                                        <td class="align-middle">Maria Olson</td>
                                                        <td class="align-middle">maria@domain.com</td>
                                                        <td class="align-middle">0812345678</td>
                                                        <td class="align-middle">Jakarta</td>
                                                        <td>
                                                            <span data-toggle="modal" data-target="#edit">
                                                                <button class="btn btn-icon waves-effect waves-light btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                    <i class="mdi mdi-pencil"></i>
                                                                </button>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="property-list">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box table-responsive">
                                            <div class="add-button">
                                                <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a>
                                                <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15 hide"><i class="mdi mdi-export"></i> Ekspor ke Excel</a>
                                            </div>
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
                                                                            'data-placeholder' => '-- Pilih Kota --'
                                                                        ]) !!}
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <div class="text-right">
                                                                <a href="javascript:void(0)" id="btn-filter" class="btn btn-orange waves-light waves-effect w-md">Filter</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Data properties of developer -->
                                            <table id="datatable-properties" class="table table-bordered display responsive nowrap dataTable no-footer dtr-inline collapsed">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>Nama Proyek</th>
                                                        <th>Kota</th>
                                                        <th>Banyak Tipe</th>
                                                        <th>Banyak Unit</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('internals.layouts.footer')
    @include('internals.layouts.foot')

    <script type="text/javascript">
        $(document).ready(function () {
            var table_property = $('#datatable-properties').dataTable({
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
                    url : "{!! $dataDev['id'] !!}/properties",
                    data : function(d, settings){
                        var api = new $.fn.dataTable.Api(settings);

                        d.page = Math.min(
                            Math.max(0, Math.round(d.start / api.page.len())),
                            api.page.info().pages
                        );

                        d.city_id = $('.cities').val();
                    }
                },
                aoColumns : [
                    { data: 'prop_name', name: 'prop_name' },
                    { data: 'prop_city_name', name: 'prop_city_name' },
                    { data: 'prop_types', name: 'prop_types' },
                    { data: 'prop_items', name: 'prop_items' },
                ],
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

            $('#btn-filter').on('click', function () {
                table_property.fnDraw();
            });
        });

    </script>