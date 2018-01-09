@section('title','My BRI - Auditrail')

@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')

    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Auditrail</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="{{url('/')}}">Dashboard</a>
                                </li>
                                <li class="active">
                                    Auditrail
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#customer">Profil Customer</a></li>
                            <li><a data-toggle="tab" href="#pengajuan">Pengajuan Aplikasi</a></li>
                            <li><a data-toggle="tab" href="#developer">Developer</a></li>
                            <li><a data-toggle="tab" href="#pihak">Pihak Ketiga</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="customer" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form class="form-horizontal" role="form" onsubmit="return false;">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama / NIK :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="ref_number" id="ref_number">
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered responsive">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th>Old Value</th>
                                                <th>New Value</th>
                                                <th>Nominal</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>No. HP</th>
                                                <th>Status Prescreening</th>
                                                <th>id</th>
                                                <th>Status Pengajuan</th>
                                                <th>Umur Pengajuan</th>
                                                <th>Janji Temu</th>
                                                <th>Status Data Nasabah</th>
                                                <th style="width: 100px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="pengajuan" class="tab-pane fade">
                                <h3>Pengajuan Aplikasi</h3>
                            </div>
                            <div id="developer" class="tab-pane fade">
                                <h3>Developer</h3>
                            </div>
                            <div id="pihak" class="tab-pane fade">
                                <h3>Pihak Ketiga</h3>
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
</script>