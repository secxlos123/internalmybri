@section('title','My BRI - Riwayat Paket Kredit')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Riwayat Paket Kredit</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li><a href="{{url('/')}}">Dashboard</a></li>
                            <li class="active">Riwayat Paket Kredit</li>
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
                        <table id="datatable-histori" class="table table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Tanggal Pengajuan</th>
                                    <th>ID Aplikasi</th>
                                    <th>No Referensi</th>
                                    <th>Produk</th>
                                    <th>Nama Debitur</th>
                                    <th>Plafond</th>
                                    <th>Status</th>
                                    <!-- <th style="width: 100px">Aksi</th> -->
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
@include('internals.eform.adk.script-his-adk')