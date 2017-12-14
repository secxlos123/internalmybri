@section('title','My BRI - Approval Pengajuan ADK')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style type="text/css">
    .card-box > img {
        height: 350px;
        width: 100%;
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Approval Pengajuan ADK</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li><a href="{{url('/')}}">Dashboard</a></li>
                            <li><a href="{{route('eform.index')}}">E-Form</a></li>
                            <li class="active">Pengajuan</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills m-b-30">
                        <li class="active">
                            <a href="#exsummary" data-toggle="tab" aria-expanded="true">Data Exsummary</a>
                        </li>
                        <li>
                            <a href="#prescoring" data-toggle="tab" aria-expanded="true">Data Prescoring</a>
                        </li>
                        <li>
                            <a href="#debitur" data-toggle="tab" aria-expanded="true">Data Debitur</a>
                        </li>
                        <li>
                            <a href="#kredit" data-toggle="tab" aria-expanded="true">Data Kredit</a>
                        </li>
                        <li>
                            <a href="#pribadi" data-toggle="tab" aria-expanded="true">Data Pribadi</a>
                        </li>
                        <li>
                            <a href="#pekerjaan" data-toggle="tab" aria-expanded="true">Data Pekerjaan</a>
                        </li>
                        <li>
                            <a href="#finansial" data-toggle="tab" aria-expanded="true">Data Finansial</a>
                        </li>
                        <li>
                            <a href="#keluarga" data-toggle="tab" aria-expanded="true">Data Keluarga</a>
                        </li>
                        <li>
                            <a href="#dokumen" data-toggle="tab" aria-expanded="true">Data Dokumen</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content br-n pn">
                <div id="exsummary" class="tab-pane active">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Exsummary</h3>
                                </div>
                                <!-- data exsummary -->
                                <div class="panel-body">
                                    @include('internals.eform.adk._cus-exsummary')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="prescoring" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Prescoring</h3>
                                </div>
                                <!-- data prescoring -->
                                <div class="panel-body">
                                    @include('internals.eform.adk._cus-prescoring')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="debitur" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Debitur</h3>
                                </div>
                                <!-- data debitur -->
                                <div class="panel-body">
                                    @include('internals.eform.adk._cus-debitur')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="kredit" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Kredit</h3>
                                </div>
                                <!-- data kredit -->
                                <div class="panel-body">
                                    @include('internals.eform.adk._cus-data_kredit')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pribadi" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pribadi</h3>
                                </div>
                                <!-- data pribadi -->
                                <div class="panel-body">
                                    @include('internals.eform.adk._cus-personal')
                                    <hr>

                                    @if($detail['customer']['personal']['status_id'] == 2)
                                    <!--pasangan-->
                                    @include('internals.eform.adk._cus-couple')
                                    <hr>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pekerjaan" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pekerjaan</h3>
                                </div>
                                <div class="panel-body">
                                    <!--pekerjaan-->
                                    @include('internals.eform.adk._cus-work')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="finansial" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Finansial</h3>
                                </div>
                                <div class="panel-body">
                                    <!-- finansial -->
                                    @include('internals.eform.adk._cus-financial')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="keluarga" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Keluarga</h3>
                                </div>
                                <div class="panel-body">
                                    <!-- family -->
                                    @include('internals.eform.adk._cus-family')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="dokumen" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Briguna Dokumen</h3>
                                </div>
                                <div class="panel-body">
                                    <!-- identity -->
                                    @include('internals.eform.adk._cus-identity')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- rekomendasi approval -->
            <form class="form-horizontal" role="form" action="{{route('post_adk', $id)}}" method="POST" id="form1">
                {{ csrf_field() }}
                <input type="hidden" name="is_approved" id="is_approved">
                <div class="text-center">
                    @if ($type != 'preview')
                        <button type="submit" href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Terima</button>
                        <button type="submit" href="#" class="btn btn-danger waves-light waves-effect w-md m-b-20" id="btn-reject">Tolak</button>
                    @else
                        <button type="button" onclick="printPage()" class="btn waves-light waves-effect w-md m-b-20"><i class="fa fa-print"></i> Print</button>
                    @endif
                        <a href="{{URL::previous()}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script type="text/javascript">
    var options = {
        theme:"sk-bounce",
        message:'Mohon tunggu sebentar.',
        textColor:"white"
    };
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

    $('#form1').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { e.preventDefault(); return false; }
    });

    function printPage() {
        window.print();
    }
</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\EForm\ApprovalReq', '#form1'); !!}