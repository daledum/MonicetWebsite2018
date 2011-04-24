function initChart(series, categories, chatType) {
  var chart = new Highcharts.Chart({
    chart: {
      renderTo: 'chart-image',
      defaultSeriesType: chatType
    },
    title: {
      text: ' '
    },
    xAxis: {
      categories: categories,
      title: {
        text: null
      }
    },
    yAxis: {
      min: 0,
      title: {
        text: null,
        align: 'high'
      }
    },
    tooltip: {
      formatter: function() {
        return '' + this.series.name + ': ' + this.y;
      }
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    legend: {
    /*  layout: 'horizontal',
      align: 'right',
      verticalAlign: 'bottom',
      x: 0,
      y: 0,
      floating: false,
      borderWidth: 1,
      backgroundColor: '#FFFFFF',
      shadow: true*/
    },
    credits: {
      enabled: false
    },
    series: series
  });
}

function updateChart() {
  var categories = [];
  var series = [];
  $.ajax({
      url: "/index.php/chartResults?_=" + Math.floor(Math.random()*1000001),
      data: {"year": $("#year").val(), "month": $("#month").val(), 
             "association": $("#association").val(), 
             "behaviour": $("#behaviour").val(),
             "sea_state": $("#sea-state").val(),
             "visibility": $("#visibility").val(),
             "type": $("input[name='chart-type']:checked").val()},
      success: function(rsp) {
          var jsonRsp = $.parseJSON(rsp);
          var chartType = 'bar';
          if ($("input[name='chart-type']:checked").val() == 2) {
              chartType = 'line';
          }
          initChart(jsonRsp.series, jsonRsp.categories, chartType);
      }
  });
}

$(function() {
  updateChart();

  $("input[name='chart-type']").change(function() {
     if ($(this).val() == '2') {
         $("#month").attr('disabled', 'disabled');
     } else {
         $("#month").attr('disabled', '');
     }
  });

  $(".chart-container .left-sidebar input, .chart-container .left-sidebar select").change(function(){
    updateChart();
  });
});
