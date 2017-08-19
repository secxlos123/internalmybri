@section('title','My BRI - Daftar Nasabah')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                
                                <div class="page-title-box">
                                    <h4 class="page-title">Daftar Nasabah</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Daftar Nasabah
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
                                    <div class="add-button">
                                        <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a>
                                        <a href="{{route('customers.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah Nasabah</a>
                                        <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-sync"></i> Sinkronisasi Nasabah</a>
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
                                                            <label class="col-sm-4 control-label">Jenis Kelamin :</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control">
                                                                    <option>-- Pilih --</option>
                                                                    <option>Laki-laki</option>
                                                                    <option>Perempuan</option>
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
                                                <th>NIK</th>
                                                <th>Nama Nasabah</th>
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
                                                <td class="align-middle">Nasabah 1</td>
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
                                            @foreach($dataCustomer as $data)
                                            <tr>
                                                <td class="align-middle">{{$data['id']}}</td>
                                                <td class="align-middle">{{$data['nik']}}</td>
                                                <td class="align-middle">{{$data['first_name']}} {{$data['last_name']}}</td>
                                                <td class="align-middle">{{$data['email']}}</td>
                                                <td class="align-middle"></td>
                                                <td class="align-middle">{{$data['mobile_phone']}}</td>
                                                <td class="align-middle">{{$data['gender']}}</td>
                                                <td>
                                                    <a href="{{route('customers.edit', $data['id'])}}" class="btn btn-icon waves-effect waves-light btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="{{route('customers.show', $data['id'])}}" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
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
    $(document).ready(function () {
        $('#datatable').dataTable();   
    });
    TableManageButtons.init();
</script>