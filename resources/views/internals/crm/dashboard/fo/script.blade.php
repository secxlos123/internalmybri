<script type="text/javascript">
// var chartPemasar;
// // initMorris();
// getMorris();
// // getMorrisOffline();
//
// // function initMorris() {
// //    chartPemasar = Morris.Bar({
// //        barGap:4,
// //        barSizeRatio:0.55,
// //        element: 'morris-bar-stacked',
// //        data: data,
// //        xkey: 'pemasar',
// //        ykeys: ['a', 'c', 'd', 'b'],
// //        stacked: false,
// //        labels: ['Prospek', 'On Progress', 'Batal', 'Done'],
// //        hideHover: 'auto',
// //        resize: true, //defaulted to true
// //        gridLineColor: '#eeeeee',
// //        barColors: ['blue','orange', 'red','green']
// //    });
// // }
//
// function setMorris(data) {
//   chartPemasar.setData(data);
//   console.log(data);
//   chartPemasar = Morris.Bar({
//       barGap:4,
//       barSizeRatio:0.55,
//       element: 'morris-bar-stacked',
//       data: data,
//       xkey: 'pemasar',
//       ykeys: ['a', 'c', 'd', 'b'],
//       stacked: false,
//       labels: ['Prospek', 'On Progress', 'Batal', 'Done'],
//       hideHover: 'auto',
//       resize: true, //defaulted to true
//       gridLineColor: '#eeeeee',
//       barColors: ['blue','orange', 'red','green']
//   });
// }
//
// function getMorris() {
//   $.ajax({
//       url: "{{url('chartMarketing')}}",
//       type: "GET",
//       dataType: "json",
//       success: function (data) {
//           console.log(data);
//           setMorris(data);
//       },
//   })
// }

!function($) {
  "use strict";
  var MorrisCharts = function() {};
  //creates Stacked chart
  MorrisCharts.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
    Morris.Bar({
      barGap:4,
      barSizeRatio:0.55,
      element: element,
      data: data,
      xkey: xkey,
      ykeys: ykeys,
      stacked: false,
      labels: labels,
      hideHover: 'auto',
      resize: true, //defaulted to true
      gridLineColor: '#eeeeee',
      barColors: lineColors
    });
  },

  MorrisCharts.prototype.init = function(bulan, pemasar, product) {
    console.log(bulan);
    console.log(pemasar);
    console.log(product);
    var data = {
      "_token": "{{ csrf_token() }}",
      "bulan": (bulan != "Semua")? bulan : "",
      "pemasar": (pemasar != "Semua")? pemasar : "",
      "product": (product != "Semua")? product : ""
    };
    console.log(data);
    $.ajax({
      url: "{{url('chartMarketing')}}",
      type: "POST",
      data: data,
      dataType: "json",
      success: function (data) {
        console.log(data);
        MorrisCharts.prototype.createStackedChart('morris-bar-stacked', data, 'Nama', ['Prospek', 'On Progress', 'Batal', 'Done'], ['Prospek', 'On Progress', 'Batal', 'Done'], ['blue','orange', 'red','green']);
      },
    });
    $.ajax({
      url: "{{url('chartProperty')}}",
      type: "GET",
      dataType: "json",
      success: function (data) {
        var $stckedData = data;

        MorrisCharts.prototype.createStackedChart('chart-all', $stckedData, 'month', ['value'], ['Properti Baru'], ['#00529C']);
      },
    });
  },
  //init
  $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),
//initializing
function($) {
  "use strict";

  $('#m-bulan').on('change', function(){
    var bulan =  $('#m-bulan').val();
    var pemasar = $('#m-pemasar').val();
    var product = $('#m-product').val();
    // var data = [
    //   "bulan" : bulan,
    //   "pemasar" : pemasar,
    //   "product" : product
    // ];
      $("#morris-bar-stacked").empty();
      $.MorrisCharts.init(bulan, pemasar, product);
      console.log();
  });

  $('#m-pemasar').on('change', function(){
    var bulan =  $('#m-bulan').val();
    var pemasar = $('#m-pemasar').val();
    var product = $('#m-product').val();
    // var data = [
    //   "bulan" : bulan,
    //   "pemasar" : pemasar,
    //   "product" : product
    // ];
      $("#morris-bar-stacked").empty();
      $.MorrisCharts.init(bulan, pemasar, product);
      console.log(bulan, pemasar, product);
  });

  $('#m-product').on('change', function(){
    var bulan =  $('#m-bulan').val();
    var pemasar = $('#m-pemasar').val();
    var product = $('#m-product').val();
    // var data = [
    //   "bulan" : bulan,
    //   "pemasar" : pemasar,
    //   "product" : product
    // ];
      $("#morris-bar-stacked").empty();
      $.MorrisCharts.init(bulan, pemasar, product);
      console.log(bulan, pemasar, product);
  });
  $.MorrisCharts.init();
  // console.log('test');
}(window.jQuery);


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
