@section('title','My BRI - Verifikasi ADK')
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
                        <h4 class="page-title">Verifikasi ADK</h4>
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
                            <a href="#exsummary" data-toggle="tab" aria-expanded="true">Data Eksumary</a>
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
                                    <h3 class="panel-title">Data Eksumary</h3>
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

                                    @if($detail['customer']['personal']['status'] == 2)
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
            @if($detail['is_send'] == '0' && $detail['is_verified'] == '1')                    
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Cetak Data Kredit :</label>
                                                    <div class="col-md-5">
                                                        <a href="{{route('post_pdf',['id'=>'ptk','eform_id'=>$detail['eform_id']])}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Download PTK</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Cetak Data Instansi :</label>
                                                    <div class="col-md-5">
                                                        <a href="{{route('post_sph',['id'=>'sph','eform_id'=> $detail['eform_id']])}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Download SPH</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" role="form" action="{{route('post_adk')}}" method="POST" id="form1">
                    {{ csrf_field() }}
                        <input type="hidden" name="id_aplikasi" value="{{$detail['id_aplikasi']}}">
                        <input type="hidden" name="eform_id" value="{{$detail['eform_id']}}">
                        <input type="hidden" name="uid" value="{{$detail['uid']}}">
                        <h3 class="panel-title">catatan :</h3>
                        <hr> 
                        <input type="text" name="catatan" class="form-control">
                        <hr>
                        <a href="{{route('adk.index')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                        <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Kirim Ke Brinets</button>
                    </form>
                </div>
            @else
                <div class="text-center">
                    <a href="{{route('adk.index')}}" class="btn btn-default">Kembali</a>
                </div>
            @endif
        </div>
    </div>
</div>

@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script type="text/javascript">
    $('.thumbnail').viewbox();
    var options = {
        theme:"sk-bounce",
        message:'Mohon tunggu sebentar.',
        textColor:"white"
    };

    $('#btn-approve').on('click', function(){
        HoldOn.open(options);
        $('#form1').submit();
        HoldOn.close();
    })

    $('#btn-verifikasi').on('click', function(){
        // alert('tes verifikasi');
        $('#verifikasi').val('1');
    })

    $('#btn-tunda').on('click', function(){
        // alert('tes tunda');
        $('#verifikasi').val('0');
    })

    $('#form1').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { e.preventDefault(); return false; }
    });

    function printPage() {
        window.print();
    }

    $('#btn-ktp').on('click', function(){
        $('#result-modal-ktp').modal('show');
    })

    $('#btn-npwp').on('click', function(){
        $('#result-modal-npwp').modal('show');
    })

    $('#btn-gaji').on('click', function(){
        $('#result-modal-gaji').modal('show');
    })

    $('#btn-kk').on('click', function(){
        $('#result-modal-kk').modal('show');
    })

    $('#btn-sk_awal').on('click', function(){
        $('#result-modal-sk_awal').modal('show');
    })

    $('#btn-sk_akhir').on('click', function(){
        $('#result-modal-sk_akhir').modal('show');
    })

    $('#btn-rekomendasi').on('click', function(){
        $('#result-modal-rekomendasi').modal('show');
    })

    $('#btn-couple_ktp').on('click', function(){
        $('#result-modal-couple_ktp').modal('show');
    })

    $('#btn-skpu').on('click', function(){
        $('#result-modal-skpu').modal('show');
    })

    $('#btn-update-ktp').on('click', function(){
        eformId = $("#eform_id").val();
        ktp = $("#ktp").val();
        catat_ktp = $("#catatan_ktp").val();
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("keterangan") }}',
            data: {
                eform : eformId,
                type  : ktp,
                catatan_ktp : catat_ktp
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            // console.log(data);
            $('#result-modal-ktp').modal('hide');
            alert(data.message);
            HoldOn.close();
            location.reload();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })

    $('#btn-update-npwp').on('click', function(){
        eformId = $("#eform_id").val();
        catat_npwp = $("#catatan_npwp").val();
        npwp = $("#npwp").val();
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("keterangan") }}',
            data: {
                eform : eformId,
                type  : npwp,
                catatan_npwp : catat_npwp
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            // console.log(data);
            $('#result-modal-npwp').modal('hide');
            alert(data.message);            
            HoldOn.close();
            location.reload();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })

    $('#btn-update-gaji').on('click', function(){
        eformId = $("#eform_id").val();
        catat_gaji = $("#catatan_gaji").val();
        gaji = $("#gaji").val();
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("keterangan") }}',
            data: {
                eform : eformId,
                type  : gaji,
                catatan_gaji : catat_gaji
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            // console.log(data);
            $('#result-modal-gaji').modal('hide');
            alert(data.message);            
            HoldOn.close();
            location.reload();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })

    $('#btn-update-kk').on('click', function(){
        eformId = $("#eform_id").val();
        catat_kk = $("#catatan_kk").val();
        kk = $("#kk").val();
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("keterangan") }}',
            data: {
                eform : eformId,
                type  : kk,
                catatan_kk : catat_kk
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            // console.log(data);
            $('#result-modal-kk').modal('hide');
            alert(data.message);            
            HoldOn.close();
            location.reload();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })

    $('#btn-update-sk_awal').on('click', function(){
        eformId = $("#eform_id").val();
        catat_sk_awal = $("#catatan_sk_awal").val();
        sk_awal = $("#sk_awal").val();
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("keterangan") }}',
            data: {
                eform : eformId,
                type  : sk_awal,
                catatan_sk_awal : catat_sk_awal
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            // console.log(data);
            $('#result-modal-sk_awal').modal('hide');
            alert(data.message);            
            HoldOn.close();
            location.reload();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })

    $('#btn-update-sk_akhir').on('click', function(){
        eformId = $("#eform_id").val();
        catat_sk_akhir = $("#catatan_sk_akhir").val();
        sk_akhir = $("#sk_akhir").val();
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("keterangan") }}',
            data: {
                eform : eformId,
                type  : sk_akhir,
                catatan_sk_akhir : catat_sk_akhir
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            // console.log(data);
            $('#result-modal-sk_akhir').modal('hide');
            alert(data.message);            
            HoldOn.close();
            location.reload();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })

    $('#btn-update-rekomendasi').on('click', function(){
        eformId = $("#eform_id").val();
        catat_rekomendasi = $("#catatan_rekomendasi").val();
        rekomendasi = $("#rekomendasi").val();
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("keterangan") }}',
            data: {
                eform : eformId,
                type  : rekomendasi,
                catatan_rekomendasi : catat_rekomendasi
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            // console.log(data);
            $('#result-modal-rekomendasi').modal('hide');
            alert(data.message);            
            HoldOn.close();
            location.reload();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })

    $('#btn-update-skpu').on('click', function(){
        eformId = $("#eform_id").val();
        catat_skpu = $("#catatan_skpu").val();
        skpu = $("#skpu").val();
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("keterangan") }}',
            data: {
                eform : eformId,
                type  : skpu,
                catatan_skpu : catat_skpu
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            // console.log(data);
            $('#result-modal-skpu').modal('hide');
            alert(data.message);            
            HoldOn.close();
            location.reload();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })

    $('#btn-update-couple_ktp').on('click', function(){
        eformId = $("#eform_id").val();
        catat_couple_ktp = $("#catatan_couple_ktp").val();
        couple_ktp = $("#couple_ktp").val();
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("keterangan") }}',
            data: {
                eform : eformId,
                type  : couple_ktp,
                catatan_couple_ktp : catat_couple_ktp
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            // console.log(data);
            $('#result-modal-couple_ktp').modal('hide');
            alert(data.message);            
            HoldOn.close();
            location.reload();
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })
</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\EForm\ApprovalReq', '#form1'); !!}