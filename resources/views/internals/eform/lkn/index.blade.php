@section('title','MyBRI - Form LKN')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script> -->
<style type="text/css">
    .card-box > a {
    height: 350px;
    width: 100%;
    padding-top: 50px;
}
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Laporan Kunjungan Nasabah dan Rekomendasi Pengajuan Kredit</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{route('indexAO')}}">Pengajuan Kredit</a>
                            </li>
                            <li class="active">
                                Form LKN
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            @if($recontest == 1)
                <form id="formLKN" method="POST" action="{{route('postLKN', $id)}}" enctype="multipart/form-data">
            @else
                <form id="formLKN" method="POST" action="{{route('postLKNRecontest', $id)}}" enctype="multipart/form-data">
            @endif
                {{ csrf_field() }}

                <!--KPR-->
                <div class="row">
                    <div class="col-md-12">
                        @if (\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        @endif
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Pengajuan</h3>
                            </div>
                            @if($recontest == 1)
                                @include('internals.eform.lkn._kpr')
                            @else
                                @include('internals.eform.recontest._kpr-recontest')
                            @endif
                        </div>
                    </div>
                </div>

                <!--Visits-->
                <div class="row">
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Kunjungan</h3>
                            </div>
                            @if($recontest == 1)
                                @include('internals.eform.lkn._visit')
                            @else
                                @include('internals.eform.recontest._visit-recontest')
                            @endif
                        </div>
                    </div>
                </div>

                <!--income-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Penghasilan Per-Bulan</h3>
                            </div>
                            @include('internals.eform.lkn._income')
                        </div>
                    </div>
                </div>

                @if(!empty($eformData['customer']['personal']['couple_nik']))
                <!--couple income-->
                <div class="row" id="couple_income">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Penghasilan Pasangan Per-Bulan</h3>
                            </div>
                            @include('internals.eform.lkn._income-partners')
                        </div>
                    </div>
                </div>
                @endif

            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Keluarga</h3>
                        </div>
                        @include('internals.eform.lkn._family')
                    </div>
                </div>
            </div> -->

            <!--kpp-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">KPP</h3>
                        </div>
                        @if($recontest == 1)
                            @include('internals.eform.lkn._kpp-type')
                        @else
                            @include('internals.eform.recontest._kpp-recontest')
                        @endif
                    </div>
                </div>
            </div>

            <!--mutation-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mutasi Rekening</h3>
                        </div>
                        @if($recontest == 1)
                            @include('internals.eform.lkn._mutation')
                        @else
                            @include('internals.eform.recontest._mutation-recontest')
                        @endif
                    </div>
                    <br>
                    <a href="javascript:void(0)" class="btn btn-info" title="Tambah Rekening" id="add_account">+ Tambah Rekening Bank</a>
                </div>
            </div>
        </div>

        <!--Hanya muncul jika properti bekas-->
        @if(($eformData['kpr']['status_property'] != 1) || ($eformData['kpr']['developer_id'] == 1))
        <!--investigation-->
        <div class="row" id="investigate">
            <div class="col-md-12">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Investigasi Jual Beli</h3>
                    </div>
                    @if($recontest == 1)
                        @include('internals.eform.lkn._investigate')
                    @else
                        @include('internals.eform.recontest._investigate-recontest')
                    @endif
                </div>
            </div>
        </div>
        @endif

        <!--common-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dokumen Pendukung</h3>
                    </div>
                    @if($recontest == 1)
                        @include('internals.eform.lkn._common')
                    @else
                        @include('internals.eform.recontest._common-recontest')
                    @endif
                </div>
            </div>
        </div>

        <!--analist-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Analisa</h3>
                    </div>
                    @include('internals.eform.lkn._analist')
                </div>
            </div>
        </div>

        <!--recommend-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Rekomendasi AO</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Dengan ini saya meyakini kebenaran data nasabah dan merekomendasikan permohonan kredit untuk dapat diproses lebih lanjut</p>
                                    @if ($errors->has('job')) <p class="help-block">{{ $errors->first('job') }}</p> @endif
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" id="yes" value="yes" name="recommended" checked="">
                                            <label for="yes"> Ya </label>
                                        </div>
                                        <div class="radio radio-pink radio-inline">
                                            <input type="radio" id="no" value="no" name="recommended">
                                            <label for="no"> Tidak </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <textarea class="form-control" name="recommendation" placeholder="Tulis Rekomendasi">{{ old('recommendation') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            @include('form_audit._input_long_lat')
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <a href="#" onclick="goPrev()" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                        <a href="#" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="saveBtn"><i class="mdi mdi-content-save"></i> Simpan</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- Modals Save -->
<div id="save" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Apakah Anda yakin ingin menyimpan form LKN ini ?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tolak</button>
                <button type="button" id="btnSave" class="btn btn-orange waves-effect waves-light">Rekomen</button>
            </div>
        </div>
    </div>
</div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.eform.lkn.lkn-script')
@include('internals.eform.lkn.render-mutation')
@if($recontest == 0)
    @include('internals.eform.recontest.script-recontest')
@endif
<!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&callback=initMap"></script> -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\EForm\LKNRequest', '#formLKN'); !!}
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>
    <script src="{{asset('assets/js/jquery.gmaps.js')}}"></script>

    <script type="text/javascript">
        var options = {
           theme:"sk-bounce",
           message:'Mohon tunggu sebentar.',
           textColor:"white"
       };
       $(document).ready(function() {
         $('#saveBtn').on('click', function(e) {
            HoldOn.open(options);
            $("#formLKN").submit();
            HoldOn.close();
        });
       // $('.status_property')..select2('readonly',true);
       npwp_masking($('#npwp_number'));
   });

       function npwp_masking(element) {
         $(element).val($(element).val().replace(/[^\d+]/gi, ""));
         $(element).inputmask("9{0,2}.9{0,3}.9{0,3}.9{0,1}-9{0,3}.9{0,3}");
     }
 </script>
