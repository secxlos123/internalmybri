@section('title','My BRI - Form Approval Pengajuan')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style type="text/css">
    .card-box > img {
        height: 350px;
        width: 100%;
    }
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
        }
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Approval Pengajuan</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('eform.index')}}">E-Form</a>
                            </li>
                            <li class="active">
                                Pengajuan
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Pengajuan</h3>
                        </div>
                        <!-- data pengajuan-->
                        <div class="panel-body">
                            @include('internals.eform.approval._eform-data')
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Nasabah</h3>
                        </div>
                        <!-- data nasabah -->
                        <div class="panel-body">
                            @include('internals.eform.approval._customer-personal')
                            <hr>

                            @if($detail['customer']['personal']['status_id'] == 2)
                            <!--pasangan-->
                            @include('internals.eform.approval._customer-couple')
                            <hr>
                            @endif

                            <!--pekerjaan-->
                            @include('internals.eform.approval._customer-work')
                            <hr>

                            <!-- finansial -->
                            @include('internals.eform.approval._customer-financial')
                            <hr>

                            <!-- family -->
                            @include('internals.eform.approval._customer-family')
                            <hr>

                            <!-- identity -->
                            @include('internals.eform.approval._customer-identity')
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Kunjungan LKN</h3>
                        </div>
                        <!-- data lkn -->
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-visit')
                        </div>
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-income')
                        </div>
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-kpp')
                        </div>
                        @if (isset($detail['visit_report']['mutation']))
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-mutation')
                        </div>
                        @endif
                        @if(($detail['visit_report']['use_reason'] == 2)||($detail['visit_report']['use_reason'] == 18))
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-investigate')
                        </div>
                        @endif
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-analist')
                        </div>
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-recommend')
                        </div>
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-common')
                        </div>
                    </div>
                </div>
            </div>



            <!-- rekomendasi approval -->
            <div class="no-print">
            <form class="form-horizontal" role="form" action="{{route('postApproval', $id)}}" method="POST" id="form1">
                {{ csrf_field() }}
                <input type="hidden" name="is_approved" id="is_approved">
                @include('internals.eform.approval._recommendation')
            </form>
            </div>
        </div>
    </div>
</div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script type="text/javascript">

// $(function(){
//         $('.zoom').toggle(
//               function() { $(this).animate({width: "100%"}, 500)},
//                function() { $(this).animate({width: "50px"}, 500); }
//         );
//   });

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