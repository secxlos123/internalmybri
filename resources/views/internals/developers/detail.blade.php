@section('title','My BRI - Detail Developer')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Detail Developer "{{$dataDev['developer_name']}}" </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{route('customers.index')}}">Developer</a>
                                        </li>
                                        <li class="active">
                                            Detail Developer
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
                                                <span class="hidden-xs">Developer Info</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#contact-list" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-phone"></i></span>
                                                <span class="hidden-xs">Contact List</span>
                                            </a>
                                        </li>
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
                                                                        <label class="col-md-4 control-label">Nama Developer :</label>
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
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Plafon :</label>
                                                                        <div class="col-md-8">
                                                                            <p class="form-control-static">{{$dataDev['plafond']}}</p>
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
                                                                        <label class="col-md-4 control-label">Ringkasan :</label>
                                                                        <div class="col-md-8">
                                                                            <p class="form-control-static">{{$dataDev['summary']}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-md-4 control-label">Nomor PKS :</label>
                                                                        <div class="col-md-8">
                                                                            <p class="form-control-static">{{$dataDev['pks_number']}}</p>
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
                                                            <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a>
                                                        </div>
                                                        <div id="filter" class="collapse m-b-15">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="card-box">
                                                                        <form class="form-horizontal" role="form">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Kota :</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control">
                                                                                        <option>-- Pilih --</option>
                                                                                        <option>Bandung</option>
                                                                                        <option>Jakarta</option>
                                                                                        <option>Semarang</option>
                                                                                        <option>Surabaya</option>
                                                                                        <option>Yogyakarta</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4 control-label">Tipe Property :</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control">
                                                                                        <option>-- Pilih --</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
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
                                                                    <th>No</th>
                                                                    <th>Nama Property</th>
                                                                    <th>Kota</th>
                                                                    <th>Tipe Property</th>
                                                                    <th>Property #</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="align-middle">1</td>
                                                                    <td class="align-middle">Property 1</td>
                                                                    <td class="align-middle">Bandung</td>
                                                                    <td class="align-middle">1</td>
                                                                    <td class="align-middle">100</td>
                                                                    <td>
                                                                        <a href="{{route('property_detail', 1)}}" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail">
                                                                            <i class="mdi mdi-eye"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="align-middle">2</td>
                                                                    <td class="align-middle">Property 1</td>
                                                                    <td class="align-middle">Jakarta</td>
                                                                    <td class="align-middle">4</td>
                                                                    <td class="align-middle">200</td>
                                                                    <td>
                                                                        <a href="{{route('property_detail', 1)}}" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail">
                                                                            <i class="mdi mdi-eye"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
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