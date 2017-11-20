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
        //creating Stacked chart
        var $stckedData  = [
            { y: 'Januari', a: 45 },
            { y: 'Februari', a: 75, },
            { y: 'Maret', a: 100 },
            { y: 'April', a: 75, },
            { y: 'Mei', a: 100 },
            { y: 'Juni', a: 75, },
            { y: 'Juli', a: 50, },
            { y: 'Agustus', a: 75, },
            { y: 'September', a: 50, },
            { y: 'Oktober', a: 75, },
            { y: 'November', a: 100 },
            { y: 'Desember', a: 100 }
        ];
        this.createStackedChart('property-bar-stacked', $stckedData, 'y', ['a'], ['Property Baru'], ['#00529C']);
    },
    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),
//initializing 
function($) {
    "use strict";
    $.MorrisCharts.init();
}(window.jQuery);