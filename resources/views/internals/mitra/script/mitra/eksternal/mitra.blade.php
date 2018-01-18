<script type="text/javascript">
piediv();
chartdiv();
bardiv();
function piediv(){
  var pie;

            var pieData = [
                {
                    "country": "BANK BRI",
                    "visits": 9252
                },
                {
                    "country": "PARTIAL BANK",
                    "visits": 1882
                },
                {
                    "country": "BANK LAINNYA",
                    "visits": 1809
                },/* 
                {
                    "country": "Germany",
                    "visits": 1322
                },
                {
                    "country": "United Kingdom",
                    "visits": 1122
                },
                {
                    "country": "France",
                    "visits": 1114
                },
                {
                    "country": "India",
                    "visits": 984
                },
                {
                    "country": "Spain",
                    "visits": 711
                } */
            ];


            AmCharts.ready(function () {
                // PIE pie

                pie = new AmCharts.AmPieChart();
                // title of the pie
                pie.addTitle("PAYROLL", 16);

                pie.dataProvider = pieData;
                pie.titleField = "country";
                pie.valueField = "visits";
                pie.sequencedAnimation = true;
                pie.startEffect = "elastic";
                pie.innerRadius = "30%";
                pie.startDuration = 2;
                pie.labelRadius = 15;
                pie.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // the following two lines makes the pie 3D
                pie.depth3D = 10;
                pie.angle = 15;

                // WRITE
                pie.write("piediv");
            });
}
function chartdiv(){
	
            var chart;

            var chartData = [
                {
                    "month": 01,
                    "item1": 1,
                    "item2": 5,
                    "item3": 3
                },
                {
                    "month": 02,
                    "item1": 1,
                    "item2": 2,
                    "item3": 6
                },
                {
                    "month": 03,
                    "item1": 2,
                    "item2": 3,
                    "item3": 1
                },
                {
                    "month": 04,
                    "item1": 3,
                    "item2": 4,
                    "item3": 1
                },
                {
                    "month": 05,
                    "item1": 5,
                    "item2": 1,
                    "item3": 2
                },
                {
                    "month": 06,
                    "item1": 3,
                    "item2": 2,
                    "item3": 1
                },
                {
                    "month": 07,
                    "item1": 1,
                    "item2": 2,
                    "item3": 3
                },
                {
                    "month": 08,
                    "item1": 2,
                    "item2": 1,
                    "item3": 5
                },
                {
                    "month": 09,
                    "item1": 3,
                    "item2": 5,
                    "item3": 2
                },
                {
                    "month": 10,
                    "item1": 4,
                    "item2": 3,
                    "item3": 6
                },
                {
                    "month": 11,
                    "item1": 1,
                    "item2": 2,
                    "item3": 4
                },
                {
                    "month": 12,
                    "item1": 3,
                    "item2": 2,
                    "item3": 5
                }
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "month";
                chart.startDuration = 0.5;
                chart.balloon.color = "#000000";

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.fillAlpha = 1;
                categoryAxis.fillColor = "#FAFAFA";
                categoryAxis.gridAlpha = 0;
                categoryAxis.axisAlpha = 0;
                categoryAxis.gridPosition = "start";
                categoryAxis.position = "top";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.title = "NPL";
                valueAxis.dashLength = 5;
                valueAxis.axisAlpha = 0;
                valueAxis.minimum = 1;
                valueAxis.maximum = 6;
                valueAxis.integersOnly = true;
                valueAxis.gridCount = 10;
                valueAxis.reversed = true; // this line makes the value axis reversed
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // Italy graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Item1";
                graph.valueField = "item1";
                graph.hidden = true; // this line makes the graph initially hidden
                graph.balloonText = "NPL Item 1[[category]]: [[value]]";
                graph.lineAlpha = 1;
                graph.bullet = "round";
                chart.addGraph(graph);

                // Germany graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Item2";
                graph.valueField = "item2";
                graph.balloonText = "NPL Item 2 [[category]]: [[value]]";
                graph.bullet = "round";
                chart.addGraph(graph);

                // United Kingdom graph
                var graph = new AmCharts.AmGraph();
                graph.title = "Item3";
                graph.valueField = "item3";
                graph.balloonText = "NPL Item 3 [[category]]: [[value]]";
                graph.bullet = "round";
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorPosition = "mouse";
                chartCursor.zoomable = false;
                chartCursor.cursorAlpha = 0;
                chart.addChartCursor(chartCursor);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                legend.useGraphSettings = true;
                chart.addLegend(legend);

                // WRITE
                chart.write("chartdiv");
            });
}
function bardiv(){
	
            var bar;

            var barData = [
                {
                    "list": "item1",
                    "year2004": 3.5,
                    "year2005": 4.2
                },
                {
                    "list": "item2",
                    "year2004": 1.7,
                    "year2005": 3.1
                },
                {
                    "list": "item3",
                    "year2004": 2.8,
                    "year2005": 2.9
                },
                {
                    "list": "item4",
                    "year2004": 2.6,
                    "year2005": 2.3
                },
                {
                    "list": "item5",
                    "year2004": 1.4,
                    "year2005": 2.1
                },
                {
                    "list": "item6",
                    "year2004": 2.6,
                    "year2005": 4.9
                },
                {
                    "list": "item7",
                    "year2004": 6.4,
                    "year2005": 7.2
                },
                {
                    "list": "item8",
                    "year2004": 8,
                    "year2005": 7.1
                },
                {
                    "list": "item9",
                    "year2004": 9.9,
                    "year2005": 10.1
                }
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                bar = new AmCharts.AmSerialChart();
                bar.dataProvider = barData;
                bar.categoryField = "list";
                bar.color = "#FFFFFF";
                bar.fontSize = 14;
                bar.startDuration = 1;
                bar.plotAreaFillAlphas = 0.2;
                // the following two lines makes bar 3D
                bar.angle = 30;
                bar.depth3D = 60;

                // AXES
                // category
                var categoryAxis = bar.categoryAxis;
                categoryAxis.gridAlpha = 0.2;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridColor = "#FFFFFF";
                categoryAxis.axisColor = "#FFFFFF";
                categoryAxis.axisAlpha = 0.5;
                categoryAxis.dashLength = 5;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "3d"; // This line makes chart 3D stacked (columns are placed one behind another)
                valueAxis.gridAlpha = 0.2;
                valueAxis.gridColor = "#FFFFFF";
                valueAxis.axisColor = "#FFFFFF";
                valueAxis.axisAlpha = 0.5;
                valueAxis.dashLength = 5;
                valueAxis.title = "OS&Debitur";
                valueAxis.titleColor = "#FFFFFF";
                valueAxis.unit = "%";
                bar.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.title = "2004";
                graph1.valueField = "OS&Debitur";
                graph1.type = "column";
                graph1.lineAlpha = 0;
                graph1.lineColor = "#D2CB00";
                graph1.fillAlphas = 1;
                graph1.balloonText = "OS&Debitur [[category]] (2004): <b>[[value]]</b>";
                bar.addGraph(graph1);

                // second graph
                var graph2 = new AmCharts.AmGraph();
                graph2.title = "2005";
                graph2.valueField = "year2005";
                graph2.type = "column";
                graph2.lineAlpha = 0;
                graph2.lineColor = "#BEDF66";
                graph2.fillAlphas = 1;
                graph2.balloonText = "OS&Debitur [[category]] (2005): <b>[[value]]</b>";
                bar.addGraph(graph2);

                bar.write("bardiv");
            });
}
function goto(){
	var key = $("input:radio[name=registrasi_mitra_kerjasama]:checked").val();
 	var url = window.location.href;
	if(key=='registrasi_mitra'){
		url = url.replace("mitra_list", "registrasi_mitra");
		window.location.href = url;
	}else if(key=='cari_calon_mitra'){
		url = url.replace("mitra_list", "calon_mitra");
		window.location.href = url;
	}else if(key=='scoring_mitra'){
		url = url.replace("mitra_list", "scoring_mitra");
		window.location.href = url;
	}else if(key=='registrasi_perjanjian_mitra'){
		url = url.replace("mitra_list", "registrasi_perjanjian");
		window.location.href = url;
	}
}
  var table1 = $('#datatable').DataTable({
            searching: false,
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });
		

   function table_mitra1(mitra,kantor_wilayah,kantor_cabang)
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
                url : '/datatables/mitra_list',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                    d.mitra = mitra;
                    d.anak_perusahaan_wilayah = kantor_wilayah;
                    d.anak_perusahaan_kabupaten = kantor_cabang;
                }
            },
          aoColumns : [
                {   data: 'no', name: 'no', bSortable: false },
                {   data: 'jenis_mitra', name: 'Jenis Mitra', bSortable: false  },
                {   data: 'anak_perusahaan_wilayah', name: 'Kantor Wilayah', bSortable: false },
                {   data: 'anak_perusahaan_kabupaten', name: 'Kantor Cabang', bSortable: false },
                {   data: 'golongan_mitra', name: 'Perihal', bSortable: false }
            ],
      });
    }

  var table2 = $('#datatable2').DataTable({
            searching: false,
            order : [[3, 'asc']],
            "language": {
                "emptyTable": "No data available in table"
            }
        });
	
function table_mitra2(mitra,kantor_wilayah,kantor_cabang)
      {
		 table2 = $('#datatable2').DataTable({
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
                url : '/datatables/mitra_list',
                data : function(d, settings){
                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                    d.mitra = mitra;
                    d.anak_perusahaan_wilayah = kantor_wilayah;
                    d.anak_perusahaan_kabupaten = kantor_cabang;
                }
            },
          aoColumns : [
                {   data: 'no', name: 'no', bSortable: false },
                {   data: 'jenis_mitra', name: 'Jenis Mitra', bSortable: false  },
                {   data: 'anak_perusahaan_wilayah', name: 'Kantor Wilayah', bSortable: false },
                {   data: 'anak_perusahaan_kabupaten', name: 'Kantor Cabang', bSortable: false },
                {   data: 'golongan_mitra', name: 'Perihal', bSortable: false },
                {   data: 'status', name: 'status', orderable: false, searchable: false}
            ],
      });
    }

 $(document).on('click', "#btn-search", function(){
        table1.destroy();
        table_mitra1($('#mitra_search').val(),$('#wilayah_search').val(),$('#kantor_cabang_search').val());
    })

 $(document).on('click', "#btn-search2", function(){
        table2.destroy();
        table_mitra2($('#mitra_search2').val(),$('#wilayah_search2').val(),$('#kantor_cabang_search2').val());
    })
</script>