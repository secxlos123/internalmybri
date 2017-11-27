@section('title','My BRI - Detail Informasi Approval Collateral Properti')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <!-- header -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Detail Informasi Approval Collateral Properti</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dasboard</a>
                            </li>
                            <li>
                                <a href="{{route('collateral.index')}}">List Approval Pengajuan Properti Baru</a>
                            </li>
                            <li class="active">
                                Approval Collateral Properti
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- contains -->
            <div class="row">
                <div class="col-md-12">
                    @if (\Session::has('error'))
                     <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="m-t-0 header-title"><b>Detail Informasi Approval Collateral Appraisal</b></h5>
                                <p class="text-muted m-b-30 font-13">
                                    No. Contact Agen / Sales : {{$collateral['property']['pic_phone']}}
                                </p>
                                @if (\Session::has('error'))
                                 <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif

                                <!-- detail properti -->
                                @include('internals.collateral.manager._detail-property')

                                <!-- tipe -->
                                @include('internals.collateral.manager._type-property')

                                <!-- unit -->
                                @include('internals.collateral.manager._unit-property')                            

                                <!-- informasi penilaian -->
                                <!-- @include('internals.collateral.manager._collateral-detail') -->

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <!-- rekomendasi approval -->
                                        <form class="form-horizontal" role="form" method="POST" id="form1">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="is_approved" id="is_approved">
                                            <div class="text-center">
                                                <!-- <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Setujui</button>
                                                <a href="javascript:void(0);" class="btn btn-danger waves-light waves-effect w-md m-b-20" id="btn-reject">Tolak</a> -->
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
    </div>
</div>

<!-- informasi penilaian -->                                @include('internals.collateral.manager.detail-information-modal')           @include('internals.collateral._reject-modal')
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.collateral.script')

<script type="text/javascript">
    $(document).ready(function () {
        var lastStatusElement = null;
        $('.select2').select2({
            witdh : '100%',
            allowClear: true,
        });
        
        $('.name').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '{{route("getAO")}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.officers.data,
                        pagination: {
                            more: (params.page * data.officers.per_page) < data.officers.total
                        }
                    };
                },
                cache: true
            },
        });
    });
    // $(document).on('click', "#view-detail", function(){
    //     $('#detail-collateral-modal').modal('show');
    // })

    $(document).on('click', "#btn-approve", function(){
        $('#is_approved').attr('value', true);
        $('#form1').submit();
        HoldOn.open(options);
    })

    $(document).on('click', "#btn-reject", function(){
        $('#reject-modal').modal('show');
    })

    $(document).on('click', "#btn-submit", function(){
        $('#is_approved').attr('value', false);
        $('#form1').submit();
        HoldOn.open(options);
    })
</script>