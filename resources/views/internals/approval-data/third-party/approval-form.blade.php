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
                                                    <p class="form-control-static">{{$detail['old']['first_name']}}</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['new']['related']['name']}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Alamat</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['old']['thirdparty']['address']}}</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['new']['address']}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Kota</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['old']['thirdparty']['city']['name']}}</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['new']['city']['name']}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Nomor Telepon</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['old']['thirdparty']['phone_number']}}</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['new']['related']['phone_number']}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Email</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['old']['thirdparty']['email']}}</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['new']['related']['email']}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="form-control-static">Nomor Handphone</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['old']['mobile_phone']}}</p>
                                                </td>
                                                <td>
                                                    <p class="form-control-static">{{$detail['new']['mobile_phone']}}</p>
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
                                <form class="form-horizontal" role="form" method="POST" id="form1" method="post" action="{{route('postApprovalDataThirdParty')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="is_approved" id="is_approved">
                                    <input type="hidden" name="id" id="id" value="{{$detail['new']['id']}}">
                                    <div class="text-center">
                                    @if($detail['new']['status'] != 'approved')
                                        <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Setujui</button>
                                        <a href="javascript:void(0);" class="btn btn-danger waves-light waves-effect w-md m-b-20" id="btn-reject">Tolak</a>
                                    @endif
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

<script type="text/javascript">
    $('#btn-approve').on('click', function(){
        $('#is_approved').attr('value', true);
        HoldOn.open(options);
        $('#form1').submit();
        HoldOn.close();
    })

    $('#btn-reject').on('click', function(){
        $('#is_approved').attr('value', false);
        HoldOn.open(options);
        $('#form1').submit();
        HoldOn.close();
    })
</script>