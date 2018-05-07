@section('title','My BRI - Monitoring')
@include('internals.layouts.head')
@include('internals.layouts.header')
@include('internals.layouts.navigation')
<style>
td.details1-control {
    background: url('assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details1-control {
    background: url('assets/images/details_close.png') no-repeat center center;
}
td.details2-control {
    cursor: pointer;
    color: #17A589;
    font-weight: bold;
}
.tebal{
    font-weight: bold;
}
/* tr.hideclass{
    display: none;
} */
tr.showclass{
    display:table-row;
}
td.details4-control {
    cursor: pointer;
    color: #17A589;
    font-weight: bold;
}
tr.shown td.details4-control {
}
tr.shown td.details2-control {
}

td.details3-control {
    cursor: pointer;
    color: #17A589;
    font-weight: bold;
}
tr.shown td.details3-control {
}
</style>
<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Monitoring</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">Home MyBRI</a>
                            </li>
                            <li class="active">
                                Monitoring
                            </li>
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
                    <div class="card-box">
                    <div id="filter" class="m-b-15">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Produk :</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                               <select class="select2 changekpr">
                               <option>-Pilih Produk-</option>
                               <option value="kpr">KPR</option>
                               <option value="">BRIGUNA</option>
                               </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group kpr box">
                        <label class="col-sm-4 control-label">Developer :</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                               <select class="select2">
                               <option>- Pilih Developer -</option>
                               <option>Rumah.com</option>
                               </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kantor Wilayah :</label>
                        <div class="col-sm-8">
                            {!! Form::select('kanwil', ['' => ''], old('name'), [
                                'class' => 'select2 action_kanwil2',
                                'data-placeholder' => 'Pilih Kantor Wilayah',
                            ]) !!}
                        </div>
                        <input type="hidden" class="form-control" name="branch_id" id="branch_id">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kantor Cabang :</label>
                        <div class="col-sm-8">
                            {!! Form::select('branch', ['' => ''], old('name'), [
                                'class' => 'select2 branch',
                                'data-placeholder' => 'Pilih Kantor Cabang',
                            ]) !!}
                        </div>
                    </div>
            </form>
            <div class="text-right">
                <a href="javascript:void(0);" class="btn btn-orange waves-light waves-effect w-md" id="btn-filter">Filter</a>
            </div>
        </div>
    </div>
</div>
</div>
                        <div class="tab-scroll">
                            <table id="datatable" class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th width="50px;">No. Ref</th>
                                        <th>Nominal</th>
                                        <th width="50px;">Tanggal Pengajuan</th>
                                        <th width="30px;">Aging</th>
                                        <th width="70px;">Status prescreening</th>
                                        <th>Status</th>
                                        <th>Prakarsa</th>
                                        <th>Analisa</th>
                                        <th>Putusan</th>
                                        <th>Disburstment</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('internals.layouts.footer')
    @include('internals.layouts.foot')
    @include('internals.monitoring.select2-script')

    <script type="text/javascript">
$(document).ready(function(){
    $(".changekpr").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>

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
            searching: true,
            "language": {
                "emptyTable": "No data available in table"
            }
        });

        $(document).on('click', "#btn-filter", function(){
            table1.destroy();
            reloadData1($('#from').val(), $('#to').val(), $('#status').val());
        })

        function detail(d){
            var m = '';
            m = '<table width="1000px" cellpadding="2" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
            '<td width="50%">Nomor Referensi</td>'+
            '<td width="50%">:  '+d.ref_number+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">NIK</td>'+
            '<td width="50%">:  '+d.nik+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">Nasabah</td>'+
            '<td width="50%">:  '+d['customer_name']+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">Jenis Kelamin</td>'+
            '<td width="50%">:  '+d['gender']+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">Nomor Hp</td>'+
            '<td width="50%">:  '+d['phone_mobile']+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">Email</td>'+
            '<td width="50%">:  '+d['email']+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">status</td>'+
            '<td width="50%">:  '+d['status']+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">UKER</td>'+
            '<td width="50%">:  '+d['kanwils']+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">Jenis KPR</td>'+
            '<td width="50%">:  '+d['jenis_kpr']+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">Developer</td>'+
            '<td width="50%">:  '+d['developer']+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">Sales</td>'+
            '<td width="50%">:  '+d['sales']+'</td>'+
            '</tr>'+
            '</table>';
            return m;
        }

        function detail2(d){
            var n = '';
            n = '<table width="1000px" cellpadding="2" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
            '<td width="50%">List Aging</td>'+
            '<td width="50%">:  '+d.list_aging+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">Total Aging</td>'+
            '<td width="50%">:  '+d.aging+'</td>'+
            '</tr>'+
            '</table>';
            return n;
        }

        function detail_analis(d){
            var n = '';
            n = '<table width="1000px" cellpadding="2" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
            '<td width="50%">List Aging</td>'+
            '<td width="50%">:  '+d.list_aging+'</td>'+
            '</tr>'+
            '<tr>'+
            '<td width="50%">Total Aging</td>'+
            '<td width="50%">:  '+d.aging+'</td>'+
            '</tr>'+
            '</table>';
            return n;
        }

        function reloadData1(from, to, status)
        {
            table1 = $('#datatable').DataTable({
             processing : true,
             serverSide : true,
             lengthMenu: [
             [ 10, 25, 50, -1 ],
             [ '10', '25', '50', 'All' ]
             ],
             language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/datatables/monitoring',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                        );

                    d.start_date = $('#from').val();
                    d.end_date = $('#to').val();
                    d.status = $('#status').val();
                    d.is_screening = $('#is_screening').val();
                }
            },
            aoColumns : [

            {
                "className":      'details2-control',
                "orderable":      false,
                "data":           'ref_number',
                "defaultContent": ''
            },
            {   data: 'request_amount', name: 'request_amount', bSortable: false  },
            {   data: 'created_at', name: 'created_at', bSortable: false  },
            {
                "className":      'details3-control',
                "orderable":      false,
                "data":           'aging',
                "defaultContent": ''
            },
            {   data: 'prescreening_status', name: 'prescreening_status', className: 'tebal',  bSortable: false  },
            {   data: 'status_sekarang', name: 'status_sekarang', bSortable: false  },
            {   data: 'recomendation', name: 'recomendation', bSortable: false  },
            {   
                "className":      'details4-control',
                "orderable":      false,
                "data":           'catatan_reviewer',
                "defaultContent": ''  
            },
            {   data: 'plafond_usulan', name: 'plafond_usulan', bSortable: false },
            {   data: 'list_disbushr', name: 'list_disbushr', bSortable: false },
],
});
            $('#datatable tbody').on('click', 'td.details2-control', function () {
                var tr = $(this).parents('tr');
                var row = table1.row(tr);
                var data = table1.row().data();
                if ( row.child.isShown() ) {
            // This row is already open - close it
            
            if(row.child().hasClass("showclass2")){
                row.child().removeClass("showclass2");
                row.child(detail(row.data()),"showclass1").show();
            }else if(row.child().hasClass("showclass3")){
                row.child().removeClass("showclass3");
                row.child(detail(row.data()),"showclass1").show();
            }
            else{
                row.child(detail(row.data())).hide();
                row.child().removeClass("showclass1");
            }
        }
        else {
            //$(".showclass1,showclass2").hide();
            //$(".showclass1").removeClass("showclass1");
            //$(".showclass2").removeClass("showclass2");
            row.child(detail(row.data()),'showclass1').show();
        }
    } );
            $('#datatable tbody').on('click', 'td.details3-control', function () {
                var tr = $(this).parents('tr');
                var row = table1.row(tr);
                var data = table1.row().data();
        if ( row.child.isShown() ) {
            // This row is already open - close it
           
            if(row.child().hasClass("showclass1")){
                row.child().removeClass("showclass1");
                row.child(detail2(row.data()),"showclass2").show();
            }else if(row.child().hasClass("showclass3")){
                row.child().removeClass("showclass3");
                row.child(detail2(row.data()),"showclass2").show();
            }
            else{
                row.child(detail2(row.data())).hide();
                row.child().removeClass("showclass2");
            }
        }
        else {
            //$(".showclass1,showclass2").hide();
            //$(".showclass1").removeClass("showclass1");
            //$(".showclass2").removeClass("showclass2");
            row.child(detail2(row.data()),"showclass2").show();
        }
    } );
            $('#datatable tbody').on('click', 'td.details4-control', function () {
                var tr = $(this).parents('tr');
                var row = table1.row(tr);
                var data = table1.row().data();
        if ( row.child.isShown() ) {
            // This row is already open - close it
           
            if(row.child().hasClass("showclass1")){
                row.child().removeClass("showclass1");
                row.child(detail_analis(row.data()),"showclass3").show();
            }else if(row.child().hasClass("showclass2")){
                row.child().removeClass("showclass2");
                row.child(detail_analis(row.data()),"showclass3").show();
            }
            else{
                row.child(detail_analis(row.data())).hide();
                row.child().removeClass("showclass3");
            }
        }
        else {
            //$(".showclass1,showclass2").hide();
            //$(".showclass1").removeClass("showclass1");
            //$(".showclass2").removeClass("showclass2");
            row.child(detail_analis(row.data()),"showclass3").show();
        }
    } );
        }
    
</script>