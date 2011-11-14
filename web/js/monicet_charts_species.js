function initChart(series, categories, chartType, plotOptions, yAxisText) {
  var chart = new Highcharts.Chart({
      chart: {
         renderTo: 'chart-image',
         defaultSeriesType: chartType
      },
      title: {
         text: 'Gráfico de Espécies'
      },
      xAxis: {
         categories: categories
      },
      yAxis: {
         min: 0,
         title: {
            text: yAxisText
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
                this.series.name +': '+ this.y
         }
      },
      plotOptions: plotOptions,
      series: series
   });

}

function updateChart() {
  $("#chart-loading").show();
  var categories = [];
  var series = [];
  $.ajax({
      url: "/admin.php/speciesChartResults?_=" + Math.floor(Math.random()*1000001),
      data: {"year": $("#year").val(), "month": $("#month").val()},
      success: function(rsp) {
          var jsonRsp = $.parseJSON(rsp);
          var chartType = 'column';
          
          if ($("#chart-type").val() == 0) {
              var plotOptions = { column: { pointPadding: 0.2, borderWidth: 0 } };
              var yAxisText = 'Quantidade';
          }
          else {
              var plotOptions = { column: { stacking: 'percent' } };
              var yAxisText = 'Percentagem';
          }
          
          initChart(jsonRsp.series, jsonRsp.categories, chartType, plotOptions, yAxisText);
          $("#chart-loading").hide();
      }
  });
}

$(function() {
  updateChart();

  $(".chart-container .left-sidebar input, .chart-container .left-sidebar select").change(function(){
    updateChart();
  });
});
