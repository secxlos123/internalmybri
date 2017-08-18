@section('title','My BRI - Daftar User')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Daftar User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.html">Dashboard</a>
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
                                        <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a>
                                        <a href="{{route('users.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah User</a>
                                    </div>
                                    <div id="filter" class="collapse m-b-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card-box">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-group">
                                                            <label class="col-sm-4 control-label">Kantor Cabang :</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control">
                                                                    <option>-- Pilih --</option>
                                                                    <option>BSD</option>
                                                                    <option>Ragunan</option>
                                                                </select>
                                                            </div>
                                                        </div>
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
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Kantor Cabang</th>
                                                <th>Handphone</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dataUser as $user)
                                            <tr>
                                                <td class="align-middle">{{$user['id']}}</td>
                                                <td class="align-middle">{{(!empty($user['nip'])) ? $user['nip'] : ''}}</td>
                                                <td class="align-middle">{{$user['first_name']}}</td>
                                                <td class="align-middle">{{$user['email']}}</td>
                                                <td class="align-middle">{{(!empty($user['office_name'])) ? $user['office_name'] : ''}}</td>
                                                <td class="align-middle">{{$user['mobile_phone']}}</td>
                                                <td class="align-middle">{{(!empty($user['role_name'])) ? $user['role_name'] : ''}}</td>
                                                <td class="align-middle status">
                                                    <input type="checkbox" id="status-user1" switch="success" checked>
                                                    <label for="status-user1" data-on-label="Aktif" data-off-label="Inaktif"></label>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-teal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="{{route('users.show', 1)}}" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Detail">
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
        <!-- Modals Status -->
        <div id="confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>Apakah Anda yakin ingin merubah status user "<b>John</b>" ?</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-success waves-effect waves-light btn-save">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot') 

        <script>
            var resizefunc = [];
        </script> 
<script type="text/javascript">
    $(document).ready(function () {
        var lastStatusElement = null;
        $('#datatable').dataTable();
        $('.status input[type=checkbox]').change(function(e){
            e.preventDefault();
            var val = $(this).is(':checked');
            lastStatusElement = $(this);
            $(this).prop('checked', !val);
            $('#confirm').modal('show');
        });
        $('.btn-save').click(function () {
            var val = lastStatusElement.is(':checked');
            lastStatusElement.prop('checked', !val);
            $('#confirm').modal('hide');
        });
    });
    TableManageButtons.init();
</script>