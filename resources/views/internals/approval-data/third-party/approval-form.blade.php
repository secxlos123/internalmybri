@section('title','My BRI - Form Approval Perubahan Data Pihak Ketiga')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Approval Perubahan Data Pihak Ketiga</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('approveThirdParty')}}">Daftar Approval Perubahan Data Pihak Ketiga</a>
                            </li>
                            <li class="active">
                                Approval Perubahan Data Pihak Ketiga
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
                <div class="col-md-12">
                    <div class="card-box m-t-30">
                        <h4 class="m-t-min30 m-b-30 header-title custom-title">Approval Perubahan Data Pihak Ketiga</h4>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table-box" border="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Data Lama</th>
                                                <th>Data Baru</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Nama Pihak Ketiga</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">PT. ABC</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">PT. EFG</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Alamat Perusahaan</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">Jalan Pegangsaan Timur</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">Jalan Gatot Soebroto</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Kota</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">Jakarta Barat</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">Jakarta Timur</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Nomor Telepon</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">081987188888</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">0221717171</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Email</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">lorem@ipsum.com</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">lorem@ipsum.com</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Nomor Handphone</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">08188711771</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">08128782888</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- rekomendasi approval -->
                                <form class="form-horizontal" role="form" method="POST" id="form1">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="is_approved" id="is_approved">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Setujui</button>
                                        <a href="javascript:void(0);" class="btn btn-danger waves-light waves-effect w-md m-b-20" id="btn-reject">Tolak</a>
                                        <a href="{{URL::previous()}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                                    </div>
                                </form>
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