@section('title','MyBRI - Form Approval Pengajuan')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style type="text/css">
.card-box > img {
    height: 350px;
    width: 100%;
}

.card-box > a {
    height: 350px;
    width: 100%;
    padding-top: 50px;
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
                        @if($recontest == 1)
                            <h4 class="page-title">Approval Pengajuan Kredit</h4>
                        @else
                            <h4 class="page-title">Approval Recontesting Kredit</h4>
                        @endif
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{route('eform.index')}}">Pengajuan Kredit</a>
                            </li>
                            <li class="active">
                                Approval
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
                        @if($recontest == 1)
                            <h3 class="panel-title">Data Pengajuan</h3>
                        @else
                            <h3 class="panel-title">Data Recontesting</h3>
                        @endif
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
                        @if($recontest == 1)
                            <h3 class="panel-title">Data Kunjungan LKN</h3>
                        @else
                            <h3 class="panel-title">Data Kunjungan LKN Recontesting </h3>
                        @endif
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

                        @if(($detail['kpr']['status_property'] == 2))
                        <div class="panel-body">
                            @include('internals.eform.approval._lkn-investigate')
                        </div>
                        @endif

                        @if(($detail['kpr']['status_property'] == 1) && ($detail['kpr']['developer_id'] == 1))
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
                        @if($recontest == 0)
                        <div class="panel-body">
                            @include('internals.eform.recontest._lkn-recontest-docs')
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- rekomendasi approval -->
            <div class="no-print">
                @if($recontest == 1)
                    <form class="form-horizontal" role="form" action="{{route('postApproval', $id)}}" method="POST" id="form1">
                @else
                    <form class="form-horizontal" role="form" action="{{route('postApprovalRecontest', $id)}}" method="POST" id="form1">
                @endif
                    {{ csrf_field() }}
                    <input type="hidden" name="is_approved" id="is_approved">
                    <input type="hidden" name="auditaction" id="auditaction">
                    @if($recontest == 1)
                        @include('internals.eform.approval._recommendation')
                    @else
                        @include('internals.eform.recontest._recommendation-recontest')
                    @endif
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
    $('#auditaction').val('Approval Kredit');
    HoldOn.open(options);
    $('#form1').submit();
    // HoldOn.close();
})

$('#btn-reject').on('click', function(){
    $('#is_approved').attr('value', false);
    $('#auditaction').val('Reject Kredit');
    HoldOn.open(options);
    $('#form1').submit();
    // HoldOn.close();
})

$('#form1').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { e.preventDefault(); return false; }
});

function printPage() {
    window.print();
}

$('#no').on('change',function(){
        // console.log('sini');
        if ($(this).is(':checked')) {
            $('#btn-approve').hide();
        }
    });

$('#yes').on('change',function(){
        // console.log('sini');
        if ($(this).is(':checked')) {
            $('#btn-approve').show();
        }
    });

</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\EForm\ApprovalReq', '#form1'); !!}