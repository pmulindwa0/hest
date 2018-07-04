$(document).ready(function () {

    var line1 = [['MUST', 4], ['MUBS', 86], ['MUK', 23], ['GULU', 5], ['MUNI', 6]];

    $('#chart1').jqplot([line1], {
        title: 'Students per University',
        seriesDefaults: {
            renderer: $.jqplot.BarRenderer,
            rendererOptions: {
                // Set the varyBarColor option to true to use different colors for each bar.
                // The default series colors are used.
                varyBarColor: true
            }
        },
        series: [
            {
                pointLabels: {
                    show: true
                    // labels:['fourteen', 'thirty two', 'fourty one', 'fourty four', 'fourty']
                }
            }],
        axesDefaults: {
            tickRenderer: $.jqplot.CanvasAxisTickRenderer,
            tickOptions: {
                fontFamily: 'Georgia',
                fontSize: '10pt',
                angle: -30
            }
        },
        axes: {
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer
            }
        }
    });

});