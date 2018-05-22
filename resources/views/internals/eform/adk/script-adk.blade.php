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

        reloadData1();
    });

    /*var table1 = $('#datatable').DataTable({
            searching: false,
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });

    $(document).on('click', "#btn-filter", function(){
        table1.destroy();
        reloadData1($('#from').val(), $('#to').val(), $('#status').val());
    })*/

    function reloadData1()
    {
        table1 = $('#datatable').DataTable({
            searching : true,
            processing : true,
            serverSide : false,
            // order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '/internal/datatables/adk-list';,
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);
                    // console.log(settings.json.data);
                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                }
            },
            aoColumns : [
                {data: 'tgl_pengajuan', name: 'tgl_pengajuan', bSortable: true},
                {data: 'cif', name: 'cif', bSortable: true},
                {data: 'id_aplikasi', name: 'id_aplikasi', bSortable: true},
                {data: 'ref_number', name: 'ref_number', bSortable: true},
                {data: 'fid_tp_produk', name: 'fid_tp_produk', bSortable: true},
                {data: 'nama_pegawai', name: 'nama_pegawai', bSortable: true},
                {data: 'namadeb', name: 'namadeb', bSortable: true},
                {data: 'request_amount', name: 'request_amount', bSortable: true},
                {data: 'STATUS', name: 'STATUS', bSortable: true },
                {data: 'status_screening', name: 'status_screening', bSortable: true },
                {data: 'eform_id', name: 'eform_id', bSortable: false, className: 'hidden' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        // setInterval (function test() {
        //     location.reload();
        // }, 1000);
    }
</script>