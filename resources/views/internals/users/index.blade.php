@section('title','Dashboard')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Manajemen User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Manajemen User
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <div class="add-button">
                                        <a href="{{url('/users/create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah User</a>
                                    </div>
                                    <table id="datatable" class="table table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama User</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">1</td>
                                                <td class="align-middle">Lisda</td>
                                                <td class="align-middle">pinca</td>
                                                <td>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">2</td>
                                                <td class="align-middle">Kania</td>
                                                <td class="align-middle">mp</td>
                                                <td>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail">
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
@include('internals.layouts.footer')
@include('internals.layouts.foot')  
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();   
    });
    TableManageButtons.init();
</script>  