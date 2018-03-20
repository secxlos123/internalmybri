<script type="text/javascript">
    !function($) {
        "use strict";
        var MorrisCharts = function() {};
    //creates Stacked chart
    MorrisCharts.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            stacked: true,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barColors: lineColors
        });
    },
    MorrisCharts.prototype.init = function() {
        $.ajax({
            url: "{{url('chartEform')}}",
            type: "GET",
            dataType: "json",
            data:{
                    startChart : $('#from_chart').val(),
                    endChart : $('#to_chart').val()
            },
            success: function (data) {
                var $stckedData = data;
                MorrisCharts.prototype.createStackedChart('morris-bar-stacked', $stckedData, 'month', ['value'], ['Pengajuan Baru'], ['#00529C']);
            },
        })
    },
    MorrisCharts.prototype.reload = function(){
        $("#morris-bar-stacked").empty();
          MorrisCharts.prototype.init();
    },
    //init
    $.MorrisCharts = new MorrisCharts,
    $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),
//initializing
function($) {
    "use strict";
    $.MorrisCharts.init();
    $(document).on('click', "#btn-filter-chart", function(){
        $.MorrisCharts.reload();
    })
}(window.jQuery);

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
$('#from_chart').datepicker({
        format: "yyyy-mm-dd",
        endDate: new Date(),
     autoclose: true,
     clearBtn: true,
     todayHighlight: true,
});
$('#from').datepicker({
        format: "yyyy-mm-dd",
        endDate: new Date(),
     autoclose: true,
     clearBtn: true,
     todayHighlight: true,
});
</script>
