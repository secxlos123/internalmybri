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
                                    <h4 class="page-title">E-Form</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.html">Dashboard</a>
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
                                <div class="card-box table-responsive">
                                    <div class="add-button">
                                        <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a>
                                        <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Tambah Pengajuan Aplikasi</a>
                                        <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a>
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
                                                            <label class="col-sm-4 control-label">Status Pengajuan :</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control">
                                                                    <option>-- Pilih --</option>
                                                                    <option>Proses</option>
                                                                    <option>Diterima</option>
                                                                    <option>Ditolak</option>
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
                                                <th>No. Ref Aplikasi</th>
                                                <th>Nama Nasabah</th>
                                                <th>Nominal</th>
                                                <th>KC BRI Terdekat</th>
                                                <th>AO</th>
                                                <th>Status Pengajuan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">1</td>
                                                <td class="align-middle">123455667</td>
                                                <td class="align-middle">Nasabah 1</td>
                                                <td class="align-middle">Rp200.000.000,00</td>
                                                <td class="align-middle">BSD</td>
                                                <td class="align-middle">AO 1</td>
                                                <td class="align-middle text-warning">Proses</td>
                                                <td>
                                                    <button class="btn btn-icon btn-teal disabled">
                                                        <i class="mdi mdi-loupe"></i>
                                                    </button>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Screening">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">2</td>
                                                <td class="align-middle">54231343</td>
                                                <td class="align-middle">Nasabah 2</td>
                                                <td class="align-middle">Rp500.000.000,00</td>
                                                <td class="align-middle">Jaksel</td>
                                                <td class="align-middle">AO 2</td>
                                                <td class="align-middle text-success">Diterima</td>
                                                <td>
                                                    <button class="btn btn-icon btn-teal disabled">
                                                        <i class="mdi mdi-loupe"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-info disabled">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">3</td>
                                                <td class="align-middle">65423134</td>
                                                <td class="align-middle">Nasabah 3</td>
                                                <td class="align-middle">Rp900.000.000,00</td>
                                                <td class="align-middle">Jaksel</td>
                                                <td class="align-middle">AO 1</td>
                                                <td class="align-middle text-danger">Ditolak</td>
                                                <td>
                                                    <button class="btn btn-icon btn-teal disabled">
                                                        <i class="mdi mdi-loupe"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-info disabled">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">4</td>
                                                <td class="align-middle">76542315</td>
                                                <td class="align-middle">Nasabah 3</td>
                                                <td class="align-middle">Rp200.000.000,00</td>
                                                <td class="align-middle">BSD</td>
                                                <td class="align-middle">AO 2</td>
                                                <td class="align-middle">Pengajuan Baru</td>
                                                <td>
                                                    <a href="#" class="btn btn-icon waves-effect waves-light btn-teal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Assignment AO">
                                                        <i class="mdi mdi-loupe"></i>
                                                    </a>
                                                    <button class="btn btn-icon btn-info disabled">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
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

        <script>
            var resizefunc = [];
        </script> 
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();   
    });
    TableManageButtons.init();
</script>