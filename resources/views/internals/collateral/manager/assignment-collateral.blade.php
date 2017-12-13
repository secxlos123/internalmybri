@section('title','My BRI - Form Penugasan Collateral Properti')
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
                        <h4 class="page-title">Penugasan Collateral Properti</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dasboard</a>
                            </li>
                            <li>
                                <a href="{{route('collateral.index')}}">List Approval Pengajuan Properti Baru</a>
                            </li>
                            <li class="active">
                                Penugasan Collateral Properti
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
                                <h5 class="m-t-0 header-title"><b>Form Penugasan Collateral Appraisal</b></h5>
                                <!-- <p class="text-muted m-b-30 font-13">
                                    No. Contact Agen / Sales : 
                                </p> -->
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

                                <!-- form penugasan -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Penugasan Collateral Appraisal</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!-- assignment form -->
                                        <form role="role" method="POST" action="{{route('postAssignment', $collateral['id'])}}" id="form-assignment">
                                        {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-horizontal" role="form">
                                                        <!-- <div class="form-group" id="kanwil_select">
                                                            <label class="col-md-5 control-label">Pilih Kantor Wilayah * :</label>
                                                            <div class="col-md-7">
                                                                {!! Form::select('kanwil', ['' => ''], old('kanwil'), [
                                                                    'class' => 'select2 kanwil',
                                                                    'data-placeholder' => 'Pilih Kantor Wilayah'
                                                                ]) !!}
                                                            </div>
                                                        </div> -->
                                                             <input type="hidden" name="kanwil" id="kanwil" value="{{$collateral['property']['region_id']}}">
                                                        <div class="form-group" id="staff_select">
                                                            <label class="col-md-5 control-label">Nama Staff * :</label>
                                                            <div class="col-md-7">
                                                                {!! Form::select('staff_id', ['' => ''], old('staff_id'), [
                                                                    'class' => 'select2 staff_id',
                                                                    'data-placeholder' => 'Pilih Nama Staff',
                                                                    'id' => 'staff_id'
                                                                ]) !!}
                                                            </div>
                                                            <input type="hidden" name="staff_name" id="staff_name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">AO Cabang </label>
                                                            <div class="col-md-7">
                                                                <input type="checkbox" name="ao_select" class="checkbox checkbox-single checkbox-primary" value="0" id="ao_select">
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="office" hidden="">
                                                            <label class="col-md-5 control-label">Pilih Kantor Cabang * :</label>
                                                            <div class="col-md-7">
                                                                {!! Form::select('offices', ['' => ''], old('offices'), [
                                                                    'class' => 'select2 offices',
                                                                    'data-placeholder' => 'Pilih Kantor Cabang'
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group" hidden="" id="ao_id">
                                                            <label class="col-md-5 control-label">Nama AO * :</label>
                                                            <div class="col-md-7">
                                                                {!! Form::select('ao_id', ['' => ''], old('ao_id'), [
                                                                    'class' => 'select2 ao_id',
                                                                    'data-placeholder' => 'Pilih Nama AO'
                                                                ]) !!}
                                                            </div>
                                                            <input type="hidden" name="ao_name" id="ao_name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Catatan Penugasan * </label>
                                                            <div class="col-md-7">
                                                                <textarea class="form-control" rows="5" name="remark" maxlength="250"></textarea>
                                                            </div>
                                                        </div>
                                                        @if(($collateral['status'] == 'baru')&&(!empty($collateral['remark'])))
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Keterangan : </label>
                                                            <div class="col-md-7">
                                                                <p>Penugasan sebelumnya telah ditolak dikarenakan {{$collateral['remark']}}</p>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group pull-right">
                                                        <button class="btn btn-orange waves-effect waves-light" type="submit">Tugaskan</button>
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
        </div>
    </div>
</div>

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
        get_offices();
        
        $('.staff_id').select2({
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

        $('.staff_id').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();
            $('#staff_name').val(text);
        });

        $('#ao_select').on('change', function () {
            if(this.checked){
                $('#office').removeAttr('hidden');
                $('#ao_id').removeAttr('hidden');
                $('#staff_select').attr('hidden', true);
                $('#kanwil_select').attr('hidden', true);
            }else{
                $('#office').attr('hidden', true);
                $('#ao_id').attr('hidden', true);
                $('#staff_select').removeAttr('hidden');
                $('#kanwil_select').removeAttr('hidden');
            }
        });
        //get offices
        function get_offices() {
            $('.offices').empty().select2({
                witdh : '100%',
                allowClear: true,
                ajax: {
                    url: `/offices`,
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            name: params.term,
                            page: params.page || 1,
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;

                        return {
                            results: data.offices.data,
                            pagination: {
                                more: (params.page * data.offices.per_page) < data.offices.total
                            }
                        };
                    },
                    cache: true
                },
            });
        }

        //select2 ao_name
        $('.offices').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();

            $('#ao_name').val(text);
            // console.log(text);
            $('.ao_id').select2({
                witdh : '100%',
                allowClear: true,
                ajax: {
                    url: '/getAO',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            offices : id,
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

        $('.ao_id').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();

            $('#ao_name').val(text);
        });

        // $('.kanwil').select2({
        //     witdh : '100%',
        //     allowClear: true,
        //     ajax: {
        //         url: '{{route("getKanwil")}}',
        //         dataType: 'json',
        //         delay: 250,
        //         data: function (params) {
        //             return {
        //                 name: params.term,
        //                 page: params.page || 1
        //             };
        //         },
        //         processResults: function (data, params) {
        //             params.page = params.page || 1;
        //             // console.log(data);
        //             return {
        //                 results: data.kanwil.data,
        //                 pagination: {
        //                     more: (params.page * data.kanwil.per_page) < data.kanwil.total
        //                 }
        //             };
        //         },
        //         cache: true
        //     },
        // });

        // $('.kanwil').on('change', function () {
            var id = $('#kanwil').val();
            $('.staff_id').select2({
                    witdh : '100%',
                    allowClear: true,
                    ajax: {
                        url: '/getStaff',
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                region_id : id,
                                name: params.term,
                                page: params.page || 1
                            };
                        },
                        processResults: function (data, params) {
                            params.page = params.page || 1;
                            // console.log(data);
                            return {
                                results: data.staffs.data,
                                pagination: {
                                    more: (params.page * data.staffs.per_page) < data.staffs.total
                                }
                            };
                        },
                        cache: true
                    },
            });
        });
    // });
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Collateral\AssignmentRequest', '#form-assignment'); !!}