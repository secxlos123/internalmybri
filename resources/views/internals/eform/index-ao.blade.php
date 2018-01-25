@section('title','MyBRI - Pengajuan Kredit')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Pengajuan Kredit</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Dashboard</a>
                            </li>
                            <li class="active">
                                Pengajuan Kredit
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" >
                    <div id="alert-delete">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">{{ \Session::get('success') }}</div>
                        @endif
                    </div>
                    <div class="card-box">
                        <div class="add-button">
                            <!-- <a href="#filter" class="btn btn-primary waves-light waves-effect w-md m-b-15" data-toggle="collapse"><i class="mdi mdi-filter"></i> Filter</a> -->
                            <a href="{{route('eform.create')}}" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-plus-circle-outline"></i> Pengajuan Kredit</a>
                            <!-- <a href="#" class="btn btn-primary waves-light waves-effect w-md m-b-15"><i class="mdi mdi-export"></i> Ekspor ke Excel</a> -->
                        </div>
                        <div id="filter" class="m-b-15">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-box">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Tanggal Pengajuan :</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="from" name="start_date">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="to" name="end_date">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Nomor Referensi :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="ref_number" id="ref_number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Nama Customer :</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="customer_name" id="customer_name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Status Pengajuan Kredit :</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="status">
                                                        <option selected="" value="All"> (Semua)</option>
                                                        <option value="Rekomend">Pengajuan</option>
                                                        <option value="Dispose">Disposisi</option>
                                                        <option value="Initiate">Prakarsa</option>
                                                        <option value="Submit">Proses CLF</option>
                                                        <option value="Approval1">Disetujui</option>
                                                        <option value="Approval2">Rekontes Kredit</option>
                                                        <option value="Rejected">Ditolak</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Prescreening :</label>
                                                <div class="col-sm-8">
                                                    <select id="prescreening_filter" class="form-control">
                                                        <option selected="" value="All"> (Semua)</option>
                                                        <option value="1" class="text-success">Hijau</option>
                                                        <option value="2" class="text-warning">Kuning</option>
                                                        <option value="3" class="text-danger">Merah</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Jenis Produk :</label>
                                                <div class="col-sm-8">
                                                    <select id="product_filter" class="form-control">
                                                        <option selected="" value="All"> (Semua)</option>
                                                        <option value="kpr">KPR</option>
                                                        <option value="briguna">BRIGUNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="text-right">
                                            <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Cari</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @If(count($form_notif) > 0)
                            <div class="tab-scroll">
                                <table id="datatable" class="table table-bordered">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>No. Ref</th>
                                            <th>Nasabah</th>
                                            <th>Nominal</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>No. HP</th>
                                            <th>Status Prescreening</th>
                                            <th>id</th>
                                            <th>Status Pengajuan</th>
                                            <th>Umur Pengajuan</th>
                                            <th>Janji Temu</th>
                                            <th>Status Data Nasabah</th>
                                            <th style="width: 100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td> {{ $form_notif['ref_number'] }} </td>
                                            <td> {{ $form_notif['customer_name'] }} </td>
                                            <td> {{ $form_notif['request_amount'] }} </td>
                                            <td> {{ $form_notif['created_at'] }} </td>
                                            <td> {{ $form_notif['mobile_phone'] }} </td>
                                            <td> {!! $form_notif['prescreening_status'] !!} </td>
                                            <td> {{ $form_notif['id'] }} </td>
                                            <td> {{ $form_notif['status'] }} </td>
                                            <td> {{ $form_notif['aging'] }} </td>
                                            <td> {!! $form_notif['appointment_date'] !!} </td>
                                            <td> {{ $form_notif['respon_statused'] }} </td>
                                            <td> {!! $form_notif['action'] !!} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @Else
                                <table id="datatable" class="table table-bordered">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>No. Ref</th>
                                            <th>Nasabah</th>
                                            <th>Nominal</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>No. HP</th>
                                            <th>Status Prescreening</th>
                                            <th>id</th>
                                            <th>Status Pengajuan</th>
                                            <th>Umur Pengajuan</th>
                                            <th>Janji Temu</th>
                                            <th>Status Data Nasabah</th>
                                            <th style="width: 100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            @EndIf
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('internals.eform._result-modal')
@include('internals.eform._delete-modal')
@include('internals.layouts.footer')
@include('internals.layouts.foot')
<script type="text/javascript">
    $(document).ready(function(){
        $("#from").datepicker({
            todayBtn:  1,
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#to').datepicker('setStartDate', minDate);
        });

        $("#to").datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        }).on('changeDate', function (selected) {
                var maxDate = new Date(selected.date.valueOf());
                $('#from').datepicker('setEndDate', maxDate);
            });

    });

    var table1 = $('#datatable').DataTable({
            searching: false,
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });

    $(document).on('click', "#btn-filter", function(){
        table1.destroy();
        reloadData1($('#from').val(), $('#to').val(), $('#status').val());
    })

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
            eformId = $(this).parent().parent().children('td').eq(6).html();

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
            HoldOn.close();

        }
    });

    function reloadData1(from, to, status)
      {
        table1 = $('#datatable').DataTable({
           searching : false,
           processing : true,
           serverSide : true,
           order : [[3, 'asc']],
           lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
           language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/eform-ao',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.start_date = $('#from').val();
                    d.end_date = $('#to').val();
                    d.status = $('#status').val();
                    d.ref_number = $('#ref_number').val();
                    d.customer_name = $('#customer_name').val();
                    d.prescreening = $('#prescreening_filter').val();
                    d.product = $('#product_filter').val();
                }
            },
          aoColumns : [
                {   data: 'ref_number', name: 'ref_number', bSortable: false },
                {   data: 'customer_name', name: 'customer_name', bSortable: false  },
                {   data: 'request_amount', name: 'request_amount', bSortable: false  },
                {   data: 'created_at', name: 'created_at', className: 'hidden' },
                {   data: 'mobile_phone', name: 'mobile_phone', bSortable: false  },
                {   data: 'prescreening_status', name: 'prescreening_status', bSortable: false },
                {   data: 'id', name: 'eforms.id', bSortable: false, className: 'hidden' },
                {   data: 'status', name: 'created_at', bSortable: false },
                {   data: 'aging', name: 'aging' },
                {   data: 'appointment_date'
                    , name: 'appointment_date'
                    , bSortable: false
                    , mRender: function (data, type, full) {
                        return '<p style="font-size: .8em;">'
                                + 'Tanggal: '
                                + full.appointment_date
                                + '<br/><br/>'
                                + 'Di: <br/>'
                                + full.address
                            + '<p>';
                    }
                },
                {   data: 'response_status'
                    , name: 'response_status'
                    , bSortable: false
                    , mRender: function (data, type, full) {
                        text = '-';

                        if (full.response_status == 'approve') {
                            text = 'Telah Disetujui';

                        } else if(full.response_status == 'reject') {
                            text = 'Belum Disetujui';

                        } else if(full.response_status == 'unverified') {
                            text = 'Dalam Proses';

                        }
                        return text;
                    }
                },
                //{   data: 'aging', name: 'aging' },
                {   data: 'action', name: 'action', bSortable: false }
            ],
      });
    }

    //show modal Delete
    $(document).on('click', ".btn-delete", function(){
        eformId = $(this).data('id');
        $('#delete-modal').modal('show');
        $('#delete-modal #id').val(eformId);
    });

     //post Delete
    $(document).on('click', "#btn-delete-this", function(){
        eformId = $('#delete-modal #id').val();
        // console.log(eformId);
        HoldOn.open();

        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: '{{ route("delete-eform") }}',
            data: {
                id : eformId
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }

        }).done(function(data){
            $('#delete-modal').modal('hide');
            $('#btn-filter').click();
            // alert(data.response.descriptions);
            HoldOn.close();
            var body = $("html, body");
                body.stop().animate({scrollTop:0}, 100, 'swing', function() {
                $('#alert-delete').html('<div class="alert alert-success">'+data.response.descriptions+'</div')
                });

        }).fail(function(errors) {
            // alert("Gagal Terhubung ke Server");
            HoldOn.close();
            var body = $("html, body");
                body.stop().animate({scrollTop:0}, 100, 'swing', function() {
                $('#alert-delete').html('<div class="alert alert-danger">Gagal Terhubung ke Server</div')
                });

        });
    });
</script>