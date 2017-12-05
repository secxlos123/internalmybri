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
                url : '/datatables/adk-list',
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
                {data: 'ref_number', name: 'ref_number', bSortable: false},
                {data: 'customer_name', name: 'customer_name', bSortable: false},
                {data: 'request_amount', name: 'request_amount', bSortable: false},
                {data: 'created_at', name: 'created_at' },
                {data: 'mobile_phone', name: 'mobile_phone', bSortable: false  },
                {data: 'status', name: 'created_at', bSortable: false },
                {data: 'response_status', name: 'response_status', bSortable: false, mRender: function (data, type, full) {
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
                {data: 'aging', name: 'aging' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
      });
    }
</script>