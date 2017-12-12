@section('title','My BRI - Form Approval Pengajuan ADK')
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

            <!-- rekomendasi approval -->
            <form class="form-horizontal" role="form" action="{{route('postApproval', $id)}}" method="POST" id="form1">
                {{ csrf_field() }}
                <input type="hidden" name="is_approved" id="is_approved">
                @include('internals.eform.approval._recommendation')
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