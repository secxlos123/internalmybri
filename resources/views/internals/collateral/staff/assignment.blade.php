@section('title','MyBRI - Detail Informasi Properti')
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
                        <h4 class="page-title">Detail Informasi Properti</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dasboard</a>
                            </li>
                            <li>
                                <a href="{{route('staff-collateral.index')}}">List Approval Pengajuan Properti Baru</a>
                            </li>
                            <li class="active">
                                Detail Informasi Properti
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
                                @if (\Session::has('error'))
                                 <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                @endif
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
                                <!-- fkonfirmasi penugasan -->
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" method="POST" id="form1" action="{{route('rejectAssignment', $collateral['id'])}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="is_approved" id="is_approved">
                                            <div class="text-center">
                                                <a type="submit" href="{{url('staff-collateral/scoring-form/'. $collateral['developer']['id'].'/'. $collateral['property']['id'])}}" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Lakukan OTS</a>
                                                {{-- <button type="submit"  class="btn btn-orange waves-light waves-effect w-md m-b-20" form="form2" value="Submit">Lakukan OTS</button> --}}
                                                <input type="hidden" name="auditaction" id="auditaction">
                                                @include('form_audit._input_long_lat')
                                                <a href="javascript:void(0)" class="btn btn-danger waves-light waves-effect w-md m-b-20" id="btn-reject">Penolakan Penugasan</a>
                                                <input type="hidden" name="remark" id="remark">
                                                <a href="{{URL::previous()}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                                            </div>
                                        </form>
                                        {{-- {{ Form::open(['route' => ['getLKNAgunan', $collateral['developer']['id'],$collateral['property']['id']],  'method' => 'GET','id'=>'form2']) }}
                                                @include('form_audit._input_long_lat')
                                       {{ Form::close() }} --}}
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

@include('internals.collateral.manager.detail-information-modal')
@include('internals.collateral._reject-modal')
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
// JS for Auditrail
var LongLat ='?hidden-long='+ $('input[name="hidden-long"]').val()+'?&hidden-lat='+$('input[name="hidden-lat"]').val();
var longlatAction = LongLat+'&ket=ots menilai agunan';
    $(document).ready(function(){
        $('#btn-approve').attributes('href', $('#btn-approve').attributes('href') + longlatAction);
        // $('#btn-approve').on('click', function(event){
            // event.preventDefault();
            // window.location = ("{{url('staff-collateral/scoring-form/'. $collateral['developer']['id'].'/'. $collateral['property']['id'])}}"+longlatAction);
            // console.log(LongLat);
            // $('#form2').submit();
        // });
    });

    $(document).on('click', "#btn-reject", function(){
        $('#reject-modal').modal('show');
        // HoldOn.open(options);
    })

    $(document).on('click', "#btn-submit", function(){
        $('#remark').val($('#reject-modal #reason').val());
        $('#auditaction').val('menolak menilai agunan');
        $('#form1').submit();
        // HoldOn.open(options);
    })
</script>