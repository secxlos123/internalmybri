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
                        <div class="tab-scroll">
                            <table id="datatable-histori" class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <td align="center">Tanggal Pengajuan</td>
                                        <td align="center">ID Aplikasi</td>
                                        <td align="center">No Referensi</td>
                                        <td align="center">Produk</td>
                                        <td align="center">Nama Pemutus</td>
                                        <td align="center">Nama Pemrakarsa</td>
                                        <td align="center">Nama Debitur</td>
                                        <td align="center">Nomor Rekening</td>
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
@include('internals.eform.adk.script-his-adk')