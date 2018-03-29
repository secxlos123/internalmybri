@section('title','MyBRI - Verifikasi ADK')
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
                            <li><a href="{{route('eform.index')}}">Pengajuan Kredit</a></li>
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

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Catatan Pemutus :</label>
                                            <label class="col-md-5 control-label">{{$detail['catatan_pemutus']}}</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Catatan ADK :</label>
                                            <label class="col-md-5 control-label">{{ $detail['catatan_adk']}}</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- rekomendasi approval -->
            @if($detail['is_send'] == '1' && $detail['is_verified'] == '0')                    
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Cetak Data SPH :</label>
                                                    <div class="col-md-5">
                                                        <a href="{{route('post_sph',['id'=>'sph','eform_id'=> $detail['eform_id']])}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Cetak SPH</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Cetak Form Pengajuan :</label>
                                                    <div class="col-md-5">
                                                        <a href="{{route('post_debitur',['id'=>'debitur','eform_id'=> $detail['eform_id']])}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Cetak Form Pengajuan</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Cetak Data PTK/IPK :</label>
                                                    <div class="col-md-5">
                                                        <a href="{{route('post_pdf',['id'=>'ptk','eform_id'=>$detail['eform_id']])}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Cetak PTK/IPK</a>
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
            <!-- @elseif($detail['is_send'] == '6' && $detail['is_verified'] == '1') -->
            @elseif($detail['is_send'] == '1' && $detail['is_verified'] == '1')
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Cetak Data SPH :</label>
                                                    <div class="col-md-5">
                                                        <a href="{{route('post_sph',['id'=>'sph','eform_id'=> $detail['eform_id']])}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Cetak SPH</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Cetak Form Pengajuan :</label>
                                                    <div class="col-md-5">
                                                        <a href="{{route('post_debitur',['id'=>'debitur','eform_id'=> $detail['eform_id']])}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Cetak Form Pengajuan</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label">Cetak Data PTK/IPK :</label>
                                                    <div class="col-md-5">
                                                        <a href="{{route('post_pdf',['id'=>'ptk','eform_id'=>$detail['eform_id']])}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Cetak PTK/IPK</a>
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
                        <input type="hidden" name="type" value="kirim">
                        <input type="hidden" name="uid" value="{{$detail['uid']}}">
                        <h3 class="panel-title">catatan :</h3>
                        <hr> 
                        <input type="text" name="catat_adk" class="form-control" id="catat_adk" value="<?php echo $detail['catatan_adk']?>">
                        <hr>
                        <a href="{{route('adk.index')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
                        <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" id="btn-approve">Kirim Ke Brinets</button>
                    </form>
                </div>
            @else
                <div class="text-center">
                    <a href="{{route('adk.index')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Kembali</a>
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

    $('#btn-batal').on('click', function(){
        id = $("#id_aplikasi").val();
        uid = $("#uid").val();
        pinca = $("#pinca").val();
        eformId = $("#eform_id").val();
        catatan_adk = $("#catat_adk").val();
        pinca_posisi = $("#pinca_posisi").val();
        // alert(eformId);
        HoldOn.open(options);
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("post_adk") }}',
            data: {
                uid  : uid,
                pinca_name  : pinca,
                id_aplikasi : id,
                eform_id  : eformId,
                type      : 'batal',
                catat_adk : catatan_adk,
                pinca_position  : pinca_posisi
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).done(function(data){
            alert(data.message);
            HoldOn.close();
            if (data.code == 200) {
                location.reload();
            } else {
                $("#catat_adk").focus();
            }
        }).fail(function(errors) {
            alert("Gagal Terhubung ke Server");
            HoldOn.close();
        });
    })

    $('#btn-verifikasi').on('click', function(){
        // alert('tes verifikasi');
        $('#verifikasi').val('1');
    })

    $('#btn-tunda').on('click', function(){
        // alert('tes tunda');
        $('#verifikasi').val('0');
    })

    $('#namafoto').on('change', function() {
        var fn = $("#namafoto").val();
        var regex = /^[0-9a-zA-Z\_]+$/
        var action = regex.test(fn);
        if (action != true) { 
            $("#namafoto").val('');
            alert('inputan harus huruf ataupun angka, tidak boleh menggunakan spesial caracter');
            return false; 
        }
    });

    $('#namafoto2').on('change', function() {
        var fn = $("#namafoto2").val();
        var regex = /^[0-9a-zA-Z\_]+$/
        var action = regex.test(fn);
        if (action != true) { 
            $("#namafoto2").val('');
            alert('inputan harus huruf ataupun angka, tidak boleh menggunakan spesial caracter');
            return false; 
        }
    });

    $('#namafoto3').on('change', function() {
        var fn = $("#namafoto3").val();
        var regex = /^[0-9a-zA-Z\_]+$/
        var action = regex.test(fn);
        if (action != true) { 
            $("#namafoto3").val('');
            alert('inputan harus huruf ataupun angka, tidak boleh menggunakan spesial caracter');
            return false; 
        }
    });

    $('#namafoto4').on('change', function() {
        var fn = $("#namafoto4").val();
        var regex = /^[0-9a-zA-Z\_]+$/
        var action = regex.test(fn);
        if (action != true) { 
            $("#namafoto4").val('');
            alert('inputan harus huruf ataupun angka, tidak boleh menggunakan spesial caracter');
            return false; 
        }
    });

    $('#namafoto5').on('change', function() {
        var fn = $("#namafoto5").val();
        var regex = /^[0-9a-zA-Z\_]+$/
        var action = regex.test(fn);
        if (action != true) { 
            $("#namafoto5").val('');
            alert('inputan harus huruf ataupun angka, tidak boleh menggunakan spesial caracter');
            return false; 
        }
    });

    function printPage() {
        window.print();
    }

    $('#btn-lainnya1').on('click', function(){
        $('#namafoto').val('');
    })

    $('#btn-lainnya2').on('click', function(){
        $('#namafoto2').val('');
    })

    $('#btn-lainnya3').on('click', function(){
        $('#namafoto3').val('');
    })

    $('#btn-lainnya4').on('click', function(){
        $('#namafoto4').val('');
    })

    $('#btn-lainnya5').on('click', function(){
        $('#namafoto5').val('');
    })

    $('#btn-add-foto').on('click', function(){
        $('#result-modal-add-foto').modal('show');
    })

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

    $('#addupload').on('click', function(){
        var countupload = $("#countupload").val();
        var k = '<input type="text" data-placeholder="Nama file" name="namafoto'+countupload+'" id="namafoto'+countupload+'" class="form-control"><input type="file" class="filestyle" data-placeholder="Tidak ada file" name="uploadfoto'+countupload+'"  id="uploadfoto'+countupload+'"><br>';
        $('#tambah').append(k);
        $("#countupload").val(parseInt(countupload)+1);

        child = $('#tambah').children();
        if (child.length >= 1) {
            $('#removeupload').removeClass('hide');
        }
        // when the add file button is clicked append
        $('#namafoto2').on('change', function() {
            var fn = $("#namafoto2").val();
            var regex = /^[0-9a-zA-Z\_]+$/
            var action = regex.test(fn);
            if (action != true) { 
                $("#namafoto2").val('');
                alert('inputan harus huruf ataupun angka, tidak boleh menggunakan spesial caracter');
                return false; 
            }
        });

        $('#namafoto3').on('change', function() {
            var fn = $("#namafoto3").val();
            var regex = /^[0-9a-zA-Z\_]+$/
            var action = regex.test(fn);
            if (action != true) { 
                $("#namafoto3").val('');
                alert('inputan harus huruf ataupun angka, tidak boleh menggunakan spesial caracter');
                return false; 
            }
        });

        $('#namafoto4').on('change', function() {
            var fn = $("#namafoto4").val();
            var regex = /^[0-9a-zA-Z\_]+$/
            var action = regex.test(fn);
            if (action != true) { 
                $("#namafoto4").val('');
                alert('inputan harus huruf ataupun angka, tidak boleh menggunakan spesial caracter');
                return false; 
            }
        });

        $('#namafoto5').on('change', function() {
            var fn = $("#namafoto5").val();
            var regex = /^[0-9a-zA-Z\_]+$/
            var action = regex.test(fn);
            if (action != true) { 
                $("#namafoto5").val('');
                alert('inputan harus huruf ataupun angka, tidak boleh menggunakan spesial caracter');
                return false; 
            }
        });
    });

    $('#removeupload').click(function() {
        var countupload = $("#countupload").val();
        $("#countupload").val(parseInt(countupload)-1);

        child = $('#tambah').children();
        child.last().remove();
        if (child.length <= 1) {
            $('#removeupload').addClass('hide');
        }
    });

    $('#btn-add-foto-lainnya').on('click', function(){
        var count = $("#countupload").val();
        var action = $("#action").val();

        if (action == 'add') {
            if (count <= 6) {
                var form1 = $('#foto_lainnya')[0];
                var data1 = new FormData(form1);
                HoldOn.open(options);
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: '{{ route("foto_lainnya") }}',
                    data: data1,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success: function (result) {
                        $('#result-modal-add-foto').modal('hide');
                        alert(result.message);
                        HoldOn.close();
                        location.reload();
                    },
                    error: function (e) {
                        alert("Gagal Terhubung ke Server");
                        HoldOn.close();
                    }
                });
            } else {
                alert("Add Foto Lainnya harus dibawah sama dengan lima file");
                HoldOn.close();
            }
        } else {
            var form1 = $('#edit_foto_lainnya')[0];
            var data1 = new FormData(form1);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("foto_lainnya") }}',
                data: data1,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (result) {
                    $('#result-modal-add-foto').modal('hide');
                    alert(result.message);
                    HoldOn.close();
                    location.reload();
                },
                error: function (e) {
                    alert("Gagal Terhubung ke Server");
                    HoldOn.close();
                }
            });
        }
    })

    $('#btn-update-ktp').on('click', function(){
        var type = $("#ktp").val();
        // alert(type);
        if (type == 'nomulti') {
            eformId = $("#eform_id").val();
            ktp = $("#val_ktp").val();
            catat_ktp = $("#catatan_ktp").val();
            HoldOn.open(options);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("keterangan") }}',
                data: {
                    eform_id : eformId,
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
        } else {
            var form = $('#form_ktp')[0];
            var data = new FormData(form);
            console.log(data);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("keterangan") }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    $('#result-modal-ktp').modal('hide');
                    alert(data.message);
                    HoldOn.close();
                    location.reload();
                },
                error: function (e) {
                    alert("Gagal Terhubung ke Server");
                    HoldOn.close();
                }
            });
        }
    })

    $('#btn-update-npwp').on('click', function(){
        var type = $("#npwp").val();
        // alert(type);
        if (type == 'nomulti') {
            eformId = $("#eform_id").val();
            catat_npwp = $("#catatan_npwp").val();
            npwp = $("#val_npwp").val();
            HoldOn.open(options);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("keterangan") }}',
                data: {
                    eform_id : eformId,
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
        } else {
            var form1 = $('#form_npwp')[0];
            var data1 = new FormData(form1);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("keterangan") }}',
                data: data1,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (result) {
                    $('#result-modal-npwp').modal('hide');
                    alert(result.message);
                    HoldOn.close();
                    location.reload();
                },
                error: function (e) {
                    alert("Gagal Terhubung ke Server");
                    HoldOn.close();
                }
            });
        }
    })

    $('#btn-update-gaji').on('click', function(){
        var type = $("#gaji").val();
        // alert(type);
        if (type == 'nomulti') {
            eformId = $("#eform_id").val();
            catat_gaji = $("#catatan_gaji").val();
            gaji = $("#val_gaji").val();
            HoldOn.open(options);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("keterangan") }}',
                data: {
                    eform_id : eformId,
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
        } else {
            var form = $('#form_gaji')[0];
            var data = new FormData(form);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("keterangan") }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
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
        }
    })

    $('#btn-update-kk').on('click', function(){
        var type = $("#kk").val();
        // alert(type);
        if (type == 'nomulti') {
            eformId = $("#eform_id").val();
            catat_kk = $("#catatan_kk").val();
            kk = $("#val_kk").val();
            HoldOn.open(options);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("keterangan") }}',
                data: {
                    eform_id : eformId,
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
        } else {
            var form = $('#form_kk')[0];
            var data = new FormData(form);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("keterangan") }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
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
        }
    })

    $('#btn-update-sk_awal').on('click', function(){
        var type = $("#sk_awal").val();
        // alert(type);
        if (type == 'nomulti') {
            eformId = $("#eform_id").val();
            catat_sk_awal = $("#catatan_sk_awal").val();
            sk_awal = $("#val_sk_awal").val();
            HoldOn.open(options);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("keterangan") }}',
                data: {
                    eform_id : eformId,
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
        } else {
            var form = $('#form_sk_awal')[0];
            var data = new FormData(form);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("keterangan") }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
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
        }
    })

    $('#btn-update-sk_akhir').on('click', function(){
        var type = $("#sk_akhir").val();
        // alert(type);
        if (type == 'nomulti') {
            eformId = $("#eform_id").val();
            catat_sk_akhir = $("#catatan_sk_akhir").val();
            sk_akhir = $("#val_sk_akhir").val();
            HoldOn.open(options);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("keterangan") }}',
                data: {
                    eform_id : eformId,
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
        }else{
            var form = $('#form_sk_akhir')[0];
            var data = new FormData(form);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("keterangan") }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
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
        }
    })

    $('#btn-update-rekomendasi').on('click', function(){
        var type = $("#rekomendasi").val();
        // alert(type);
        if (type == 'nomulti') {
            eformId = $("#eform_id").val();
            catat_rekomendasi = $("#catatan_rekomendasi").val();
            rekomendasi = $("#val_rekomendasi").val();
            HoldOn.open(options);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("keterangan") }}',
                data: {
                    eform_id : eformId,
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
        } else {
            var form = $('#form_rekomendasi')[0];
            var data = new FormData(form);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("keterangan") }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
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
        }
    })

    $('#btn-update-skpu').on('click', function(){
        var type = $("#skpu").val();
        // alert(type);
        if (type == 'nomulti') {
            eformId = $("#eform_id").val();
            catat_skpu = $("#catatan_skpu").val();
            skpu = $("#val_skpu").val();
            HoldOn.open(options);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("keterangan") }}',
                data: {
                    eform_id : eformId,
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
        } else {
            var form1 = $('#form_skpu')[0];
            // var form1 = $('form').serialize();
            var data = new FormData(form1);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("keterangan") }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    $('#result-modal-skpu').modal('hide');
                    alert(data.message);
                    HoldOn.close();
                    location.reload();
                },
                error: function (e) {
                    alert("Gagal Terhubung ke Server");
                    HoldOn.close();
                }
            });
        }
    })

    $('#btn-update-couple_ktp').on('click', function(){
        var type = $("#couple_ktp").val();
        // alert(type);
        if (type == 'nomulti') {
            eformId = $("#eform_id").val();
            catat_couple_ktp = $("#catatan_couple_ktp").val();
            couple_ktp = $("#val_couple_ktp").val();
            HoldOn.open(options);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("keterangan") }}',
                data: {
                    eform_id : eformId,
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
        } else {
            var form = $('#form_ktp_pasangan')[0];
            var data = new FormData(form);
            HoldOn.open(options);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{ route("keterangan") }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
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
        }
    })
</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\EForm\ApprovalReq', '#form1'); !!}