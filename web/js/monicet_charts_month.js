function initChart(series, categories, chatType, stacking) {
  var chart = new Highcharts.Chart({
    chart: {
         renderTo: 'chart-image',
         defaultSeriesType: 'column'
      },
      title: {
         text: 'Stacked column chart'
      },
      xAxis: {
         categories: categories
      },
      yAxis: {
         min: 0,
         title: {
            text: ' '
         },
         stackLabels: {
            enabled: true,
            style: {
               fontWeight: 'bold',
               color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            }
         }
      },
      tooltip: {
         formatter: function() {
            return '<b>'+ this.x +'</b><br/>'+
                this.series.name +': '+ this.y +'<br/>'+
                'Total: '+ this.point.stackTotal;
         }
      },
      plotOptions: {
         column: {
            stacking: 'normal',
            dataLabels: {
               enabled: true,
               color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
         }
      },
       series: series
  });

}

function updateChart() {
  $("#chart-loading").show();
  var categories = [];
  var series = [];
  $.ajax({
      url: "/index.php/monthChartResults?_=" + Math.floor(Math.random()*1000001),
      data: {"year": $("#year").val(), "month": $("#month").val(), 
             "type": $("input[name='chart-type']:checked").val()},
      success: function(rsp) {
          var jsonRsp = $.parseJSON(rsp);
          var chartType = 'bar';
          var stacking = 'normal';
          alert(rsp);
          if ($("input[name='chart-type']:checked").val() == 2) {
              chartType = 'line';
              stacking = null;
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
