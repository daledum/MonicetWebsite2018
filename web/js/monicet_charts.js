function initChart(series, categories, chatType, stacking) {
  var chart = new Highcharts.Chart({
    chart: {
      renderTo: 'chart-image',
      defaultSeriesType: chatType
    },
    title: {
      text: ' '
    },
    xAxis: {
      categories: categories
    },
    yAxis: {
      plotLines: [{
        value: 0,
        width: 1
      }],
      title: {
        text: ' '
      },
      min: 0,
    },
    tooltip: {
      formatter: function() {
        return '' + this.series.name + ': ' + this.y;
      }
    },
    plotOptions: {
      series: {
        stacking: stacking
      }
    },
    credits: {
      enabled: false
    },
    series: series
  });

}

function updateChart() {
  $("#chart-loading").show();
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
          var stacking = 'normal';
          $('.line-chart').hide();
          $('.bar-chart').show();
          
          if ($("input[name='chart-type']:checked").val() == 2) {
              chartType = 'line';
              stacking = null;
              $('.line-chart').show();
              $('.bar-chart').hide();
          }
          initChart(jsonRsp.series, jsonRsp.categories, chartType, stacking);
          $("#chart-loading").hide();
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
