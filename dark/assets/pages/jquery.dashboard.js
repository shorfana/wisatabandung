
/**
* Theme: SimpleAdmin Admin Template
* Author: Coderthemes
* Morris Chart
*/

!function($) {
    "use strict";

    var Dashboard = function() {};

    //creates line chart
    Dashboard.prototype.createLineChart = function(element, data, xkey, ykeys, labels, opacity, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Line({
          element: element,
          data: data,
          xkey: xkey,
          ykeys: ykeys,
          labels: labels,
          fillOpacity: opacity,
          pointFillColors: Pfillcolor,
          pointStrokeColors: Pstockcolor,
          behaveLikeLine: true,
          gridLineColor: '#eef0f2',
          hideHover: 'auto',
          lineWidth: '3px',
          pointSize: 0,
          preUnits: '$',
          resize: true, //defaulted to true
          lineColors: lineColors
        });
    },

    //creates Stacked chart
    Dashboard.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            stacked: true,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#ffffff',
            barColors: lineColors
        });
    },

    Dashboard.prototype.init = function() {

        //create line chart
        var $data  = dataExplicit;
        this.createLineChart('dashboard-line-chart', $data, 'y', ['a', 'b'], ['FALDI', 'Tablets'],['0.1'],['#ffffff'],['#999999'], ['#ffffff', '#23b195']);

        //creating Stacked chart
        var $stckedData  = dataExplicit;
        this.createStackedChart('dashboard-bar-stacked', $stckedData, 'y', ['a', 'b'], ['FALDI', 'Series B'], ['#458bc4', '#458bc4']);

    },
    //init
    $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Dashboard.init();
}(window.jQuery);
