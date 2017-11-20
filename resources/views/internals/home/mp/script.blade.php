<script type="text/javascript">
    var table1 = $('#datatable').DataTable({
        searching: false,
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#btn-filter", function(){
        table1.destroy();
        reloadData1($('#city').val());
    })

    function reloadData1(from, to, status)
      {
        table1 = $('#datatable').DataTable({
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
                url : '/datatables/eform',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.start_date = from;
                    d.end_date = to;
                    d.status = status;
                }
            },
          aoColumns : [
            {   data: 'ref_number', name: 'ref_number',  bSortable: false },
            {   data: 'customer_name', name: 'customer_name',  bSortable: false  },
            {   data: 'request_amount', name: 'request_amount',  bSortable: false  },
            {   data: 'created_at', name: 'created_at' },
            // {   data: 'product_type', name: 'product_type' },
            // {   data: 'branch_id', name: 'branch_id', bSortable: false, className: 'hidden' },
            {   data: 'prescreening_status', name: 'prescreening_status', bSortable: false },
            {   data: 'ao_name', name: 'ao_name', bSortable: false },
            {   data: 'status', name: 'status', bSortable: false },
            {   data: 'aging', name: 'aging' },
            {   data: 'action', name: 'action', orderable: false, searchable: false},
        ],
      });
      }
</script>