@section('title','MyBRI - Form Approval Collateral Properti')
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
                        <h4 class="page-title">Approval Collateral Properti</h4>
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
                            <h5 class="m-t-0 header-title"><b>Form Approval Collateral Appraisal</b></h5>
                                @if($type != 'nonindex')
                                <!-- detail properti -->
                                @include('internals.collateral.manager._detail-property')
                                <!-- tipe -->
                                @include('internals.collateral.manager._type-property')
                                <!-- unit -->
                                @include('internals.collateral.manager._unit-property')
                                @else
                                <!-- detail property -->
                                @include('internals.collateral.manager._detail-collateral-nonindex')

                                @endif                            
                                <!-- informasi penilaian -->
                                @include('internals.collateral.manager._collateral-detail')

                            <!-- </div> -->
                            <form class="form-horizontal" role="form" method="POST" id="form1" action="{{route('postApprovalCollateral', $collateral['id'])}}">
                                {{ csrf_field() }}
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Catatan Rekomendasi Collateral * :</label>
                                                    <textarea class="form-control" name="remark" placeholder="Tulis Rekomendasi Disini" id="remark">{{ old('remark') }}</textarea>
                                                    <p hidden="" id="validasi_remark" class="text-danger">Kolom Catatan Rekomendasi Harus diisi!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <!-- rekomendasi approval -->
                                        @if($type == 'nonindex')
                                        <input type="hidden" name="eform_id" value="{{$collateral['eform_id']}}">
                                        @endif
                                        <input type="hidden" name="is_approved" id="is_approved">
                                        <input type="hidden" name="dev_id" id="dev_id" value="{{$collateral['developer']['id']}}">
                                        <input type="hidden" name="prop_id" id="prop_id" value="{{$collateral['property']['id']}}">
                                        <div class="text-center">
                                            <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Setujui</a>
                                            <a href="javascript:void(0);" class="btn btn-danger waves-light waves-effect w-md m-b-20" id="btn-reject">Tolak</a>
                                            <a href="{{URL::previous()}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('internals.collateral.manager.detail-information-modal')
@include('internals.collateral._reject-modal')
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.collateral.script')
@include('internals.collateral.manager.append-script')

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
    
    $(document).on('click', "#btn-approve", function(){
        var remark = $("#remark").val();
        // console.log(remark);
        if(remark !== ""){
            // console.log("AYAAN");
            $('#is_approved').attr('value', true);
            $('#form1').submit();
            HoldOn.open(options);
        }else{
            $("#validasi_remark").show();
        }
    })

    $(document).on('click', "#btn-reject", function(){
        console.log("MODAL SHOW PENOLAKAN");
        $('#reject-modal').modal('show');
    })

    $(document).on('click', "#btn-submit", function(){
        var reason = $('#reject-modal #reason').val();
        if(reason !== ""){
            $('#is_approved').attr('value', false);
            $('#remark').val(reason);
            $('#form1').submit();
            HoldOn.open(options);
        }else{
            $("#reject-modal #validasi_penolakan").show();
        }
            
    })
</script>