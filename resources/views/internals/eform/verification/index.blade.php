@section('title','MyBRI - Form Verify Data Nasabah')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style type="text/css">
    /*body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }*/
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 1000mm;
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
        .no-print, .no-print *
        {
            display: none !important;
        }

        .nik-btn{
            padding: 3px 1px;
            background-color: #eee0;
            outline: none !important;
            box-sizing: border-box;
        }
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Verifikasi Data Nasabah</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('indexAO')}}">Pengajuan</a>
                            </li>
                            <li class="active">
                                Verify
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @if (\Session::has('error'))
            <div class="alert alert-danger">{{ \Session::get('error') }}</div>
            @endif

            <form @if(!empty($dataCustomer)) action="{{route('verifyData', $dataCustomer['customer']['id'])}}" @endif method="POST" enctype="multipart/form-data" id="form1">
                <input type="hidden" id="id" value="{{$id}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                    @if (isset($dataCustomer['kpr']))
                    <!--Bundle of data eform-->
                    @include('internals.eform.verification._kpr')
                    @endif
                    <!--Bundle of data pribadi-->
                    @include('internals.eform.verification._personal-data')
                    <!--Field texts of data pribadi-->
                    @include('internals.eform.verification._hidden-input')
                    <!--Bundle of data pasangan-->
                    @include('internals.eform.verification._couple-data')
                    <!--Bundle of data pekerjaan-->
                    @include('internals.eform.verification._work-data')
                    <!--Bundle of data finansial-->
                    @include('internals.eform.verification._financial-data')
                    <!--Bundle of data Emergency contact-->
                    @include('internals.eform.verification._family-data')
                     @include('form_audit._input_long_lat')
                    <!--Action button-->
                    <div class="row no-print">
                        <div class="col-md-12">
                            <div class="pull-right">
                                @if ($type != 'preview')
                                <button type="submit" href="javascript:void(0);" id="save" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Kirim Verify Data</button>
                                @else
                                <button type="button" class="btn waves-light waves-effect w-md m-b-20" id="print"><i class="fa fa-print"></i> Print</button>
                                <a href="{{ url('eform') }}"><button type="button" class="btn waves-light waves-effect w-md m-b-20"> Kembali</button></a>
                                @endif
                            </div>
                        </div>
                    </div><!--End-->
                </form>
            </div>
        </div>
    </div>

    <!-- Modals update -->
    @include('internals.eform.verification._cif-modal')
    @include('internals.eform.verification._change-nik-modal')

    <!-- Script -->
    @include('internals.layouts.footer')
    @include('internals.layouts.foot')
    @include('internals.eform.verification.verification-script')