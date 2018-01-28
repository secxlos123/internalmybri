@section('title','MyBRI - Verifikasi ADK')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Verifikasi ADK</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li><a href="{{url('/')}}">Dashboard</a></li>
                            <li class="active">Verifikasi ADK</li>
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
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="card-box">
                        <!-- <div class="add-button"> -->
                            <!-- <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a> -->
                            <!-- <a href="{{route('eform.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Pengajuan Pinjaman Aplikasi</a> -->
                            <!-- <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a> -->
                        <!-- </div> -->
                        <!-- <div id="filter" class="m-b-15">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-box">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Tanggal Pengajuan :</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="from" name="start_date">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="to" name="end_date">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Nomor Referensi :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="ref_number" id="ref_number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Nasabah :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="customer_name" id="customer_name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Status Pengajuan :</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="status">
                                                        <option selected="" value="All"> Semua</option>
                                                        <option value="Rekomend">Pengajuan Kredit</option>
                                                        <option value="Dispose">Disposisi Pengajuan</option>
                                                        <option value="Initiate">Prakarsa</option>
                                                        <option value="Submit">Proses CLF</option>
                                                        <option value="Approval1">Kredit Disetujui</option>
                                                        <option value="Approval2">Rekontes Kredit</option>
                                                        <option value="Rejected">Kredit Ditolak</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Status Prescreening :</label>
                                                <div class="col-sm-8">
                                                    <select id="prescreening_filter" class="form-control">
                                                        <option selected="" value="All"> Semua</option>
                                                        <option value="1" class="text-success">Hijau</option>
                                                        <option value="2" class="text-warning">Kuning</option>
                                                        <option value="3" class="text-danger">Merah</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Jenis Produk :</label>
                                                <div class="col-sm-8">
                                                    <select id="product_filter" class="form-control">
                                                        <option selected="" value="All"> Semua</option>
                                                        <option value="kpr">KPR</option>
                                                        <option value="briguna">BRIGUNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="text-right">
                                            <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="tab-scroll">
                            <table id="datatable" class="table table-bordered" width="100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <td align="center">Tanggal Pengajuan</td>
                                        <td align="center">CIF</td>
                                        <td align="center">ID Aplikasi</td>
                                        <td align="center">No Referensi</td>
                                        <td align="center">Produk</td>
                                        <td align="center">Nama AO</td>
                                        <td align="center">Nama Debitur</td>
                                        <td align="center">Plafond</td>
                                        <td align="center">Status</td>
                                        <td align="center">Aksi</td>
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
    </div>
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.eform.adk.script-adk')