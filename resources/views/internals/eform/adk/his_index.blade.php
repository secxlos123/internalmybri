@section('title','My BRI - Riwayat Paket Kredit')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Riwayat Paket Kredit</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li><a href="{{url('/')}}">Dashboard</a></li>
                            <li class="active">Riwayat Paket Kredit</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                    @endif
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                    @endif
                    
                    <div class="card-box">
                        <a href="#" class="btn btn-info waves-effect waves-light bottom-margin" id="btn-refresh">Refresh</a>
                        <div class="table-responsive">
                            <table id="datatable-histori" class="table table-bordered" width="100%">
                                <thead class="bg-primary">
                                    <tr>
                                        <td align="center">Tanggal Pengajuan</td>
                                        <td align="center">CIF</td>
                                        <td align="center">ID Aplikasi</td>
                                        <td align="center">No Referensi</td>
                                        <td align="center">Produk</td>
                                        <td align="center">Nama Pemrakarsa</td>
                                        <td align="center">Tanggal Analisa</td>
                                        <td align="center">Nama Pemutus</td>
                                        <td align="center">Tanggal Putusan</td>
                                        <td align="center">Nama Debitur</td>
                                        <td align="center">Tanggal Pencairan</td>
                                        <td align="center">Nomor Rekening</td>
                                        <td align="center">Plafond</td>
                                        <td align="center">Status</td>
                                        <td align="center">Status Prescreening</td>
                                        <td align="center">Eform</td>
                                        <td align="center">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('internals.eform._result-modal')
@include('internals.layouts.footer')
@include('internals.layouts.foot')
@include('internals.eform.adk.script-his-adk')
<script type="text/javascript">
    $(document).on('click', "#btn-refresh", function(){
        location.reload();
    });
    //show modal CRS
    $(document).on('click', "#btn-prescreening", function(){
        HoldOn.open();
        if ( $(this).attr('data-verified') != 1 ) {
            // notif for verification
            $("#result-modal .modal-body")
                .html(
                    $('.modal-text-base').html()
                );
            $('#result-modal').modal('show');
            $("#result-modal .custom-dialog").attr('style', 'margin: 50px auto; width: 300px;');
            HoldOn.close();
        } else if ( $(this).attr('data-screening') == 1 ) {
            eformId = $(this).parent().parent().children('td').eq(15).html();
            // alert(eformId);
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: '{{ route("detailPrescreening") }}',
                data: {
                    eform : eformId
                },
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            }).done(function(data){
                $("#result-modal .modal-body").html($('.modal-body-base').html());
                // sicd.bikole: 1 = hijau; 2 = kuning; dst = merah
                contents = data.response.contents;
                $('.card-box.m-t-30.remove-class-prescreening').remove();

                if (contents.eform.prescreening_status == "Hijau") {
                    warna = '<p class="text-success form-control-static">Hijau</p>';
                } else if (contents.eform.prescreening_status == "Kuning") {
                    warna = '<p class="text-warning form-control-static">Kuning</p>';
                } else if (contents.eform.prescreening_status == "Merah") {
                    warna = '<p class="text-danger form-control-static">Merah</p>';
                }

                pefindo_warna = '<p class="text-warning form-control-static">Kuning</p>';
                if (contents.eform.pefindo_score >= 250 && contents.eform.pefindo_score <= 573) {
                    pefindo_warna = '<p class="text-danger form-control-static">Merah</p>';
                } else if (contents.eform.pefindo_score >= 677 && contents.eform.pefindo_score <= 900 ) {
                    pefindo_warna = '<p class="text-success form-control-static">Hijau</p>';
                }

                $("#result-modal .modal-body #prescreening-id").html(contents.eform.id);
                $("#result-modal .modal-body #prescreening-nik").html(contents.eform.nik);
                $("#result-modal .modal-body #prescreening-name").html(contents.eform.customer_name);
                $("#result-modal .modal-body #prescreening-result").html(warna);
                $("#result-modal .modal-body #prescreening-color").html(pefindo_warna);
                $("#result-modal .modal-body #prescreening-score").html(contents.eform.pefindo_score);
                $("#result-modal .modal-body #prescreening-notice").html(contents.eform.ket_risk);

                uploadscore = contents.eform.uploadscore;
                html = '';
                assets = "{{asset('assets/images/download.png')}}";
                if ( uploadscore != null || uploadscore != '') {
                    split = uploadscore.split(',');
                    $.each(split, function(key, value) {
                        if (value != ''){
                            html += '<a href="'+value+'" target="_blank"><img src="'+assets+'" width="50" class="img-responsive"></a><br/>';
                        }
                    })
                } else {
                    html = '<p class="form-control-static">-</p>';
                }

                $("#result-modal .modal-body #prescreening-image").html(html);
                base = $("#result-modal .modal-body .card-box.m-t-30.after-this");
                html = '';
                $.each(contents.dhn, function(key, dhn) {
                    if (dhn.warna == "Hijau") {
                        warna = '<p class="text-success form-control-static">Hijau</p>';
                    } else if (dhn.warna == "Kuning") {
                        warna = '<p class="text-warning form-control-static">Kuning</p>';
                    } else if (dhn.warna == "Merah") {
                        warna = '<p class="text-danger form-control-static">Merah</p>';
                    }

                    html += '<div class="card-box m-t-30 remove-class-prescreening"><h4 class="m-t-min30 m-b-30 header-title custom-title" id="success"> DHN </h4><div class="row"><div class="col-md-6"><div class="form-horizontal" role="form"><div class=""><label class="col-md-6 control-label"> Hasil DHN </label><div class="col-md-6 dhn-color">'+warna+'</div></div></div></div></div></div>';
                })

                $.each(contents.sicd, function(key, sicd) {
                    if (sicd.bikole == 1 || sicd.bikole == '-' || sicd.bikole == null || sicd.bikole == '') {
                        warna = '<p class="text-success form-control-static">Hijau</p>';
                    } else if (sicd.bikole == 2) {
                        warna = '<p class="text-warning form-control-static">Kuning</p>';
                    } else if (sicd.bikole >= 3) {
                        warna = '<p class="text-danger form-control-static">Merah</p>';
                    }

                    html += '<div class="card-box m-t-30 remove-class-prescreening"><h4 class="m-t-min30 m-b-30 header-title custom-title" id="success"> SICD </h4><div class="row"><div class="col-md-6"><div class="form-horizontal" role="form"><div class=""><label class="col-md-6 control-label"> Nama Nasabah </label><div class="col-md-6"><p class="form-control-static">'+(sicd.nama_debitur==null ? '-' : sicd.nama_debitur)+'</p></div></div><div class=""><label class="col-md-6 control-label"> NIK </label><div class="col-md-6"><p class="form-control-static">'+(sicd.no_identitas==null ? '-' : sicd.no_identitas)+'</p></div></div><div class=""><label class="col-md-6 control-label"> Tanggal Lahir </label><div class="col-md-6"><p class="form-control-static">'+(sicd.tgl_lahir==null ? '-' : sicd.tgl_lahir)+'</p></div></div><div class=""><label class="col-md-6 control-label"> Kolektibilitas </label><div class="col-md-6"><p class="form-control-static">'+(sicd.bikole==null ? '-' : sicd.bikole)+'</p></div></div><div class=""><label class="col-md-6 control-label"> Hasil SICD </label><div class="col-md-6">'+warna+'</div></div></div></div></div></div>';
                })

                $(html).insertAfter(base);
                $("#result-modal .custom-dialog").attr('style', 'margin: 50px auto; width: 1000px;');
                $('#result-modal').modal('show');
                HoldOn.close();
            }).fail(function(errors) {
                alert("Gagal Terhubung ke Server");
                HoldOn.close();
            });
        } else {
            // window.location = $(this).attr('data-url');
            // notif for verification
            $("#result-modal .modal-body")
                .html(
                    $('.modal-text-base-none').html()
                );
            $('#result-modal').modal('show');
            $("#result-modal .custom-dialog").attr('style', 'margin: 50px auto; width: 300px;');
            HoldOn.close();
        }
    });
</script>