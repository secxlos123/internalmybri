<script type="text/javascript">

    $(document).ready(function() {
         var table = $('#datatable').dataTable({
            "searching": false,
            "serverSide": true,
            "ajax" : {
                url : '/datatables/customers',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                }
            },
            "aoColumns" : [
                { data: "nik", name: 'nik' },
                { data: "name", name: 'name' },
                { data: "email", name: 'email' },
                { data: "city", name: 'city' },
                { data: "phone", name: 'phone' },
                { data: "gender", name: 'gender' },
                // { data: "action", name: 'action', bSortable: false },
            ],
        });
         $('#datatable_paginate').css("display", "none");
         $('#datatable_info').css("display", "none");
         $('#datatable_length').css("display", "none");
     });

        $('#btn-filter').on('click', function () {
            table.fnDraw();
        });

    var table2 = $('#datatable-property').DataTable({
        searching: false,
        "language": {
            "emptyTable": "No data available in table"
        }
    });

    $(document).on('click', "#btn-filter", function(){
        table2.destroy();
        reloadData1($('#city').val());
    })

    function reloadData1(city)
    {
        table2 = $('#datatable-property').DataTable({
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
            url : '/datatables/collateral',
            data : function(d, settings){
                var api = new $.fn.dataTable.Api(settings);

                d.page = Math.min(
                    Math.max(0, Math.round(d.start / api.page.len())),
                    api.page.info().pages
                    );

                // d.start_date = from;
                // d.end_date = to;
                // d.status = status;
            }
        },
        aoColumns : [
                {   data: 'prop_name', name: 'prop_name', bSortable: false  },
                {   data: 'prop_city_name', name: 'prop_city_name',  bSortable: false  },
                {   data: 'prop_types', name: 'prop_types',  bSortable: false  },
                {   data: 'prop_items', name: 'prop_items', bSortable: true },
                // {   data: 'product_type', name: 'product_type' },
                {   data: 'prop_pic_name', name: 'prop_pic_name', bSortable: false },
                {   data: 'prop_pic_phone', name: 'prop_pic_phone', bSortable: false },
                // {   data: 'staff_name', name: 'staff_name', bSortable: false },
                // {   data: 'status', name: 'status', bSortable: true },
                {   data: 'action', name: 'action', orderable: false, searchable: false}
                ],
            }); 
    }
</script>