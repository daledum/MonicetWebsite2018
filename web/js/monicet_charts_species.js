function initChart(series, categories, chartType, plotOptions, yAxisText, tooltip) {
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
      tooltip: tooltip,
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
      data: {"year": $("#year").val(), "month": $("#month").val(), "company_id": $("#company_id").val()},
      success: function(rsp) {
          var jsonRsp = $.parseJSON(rsp);
          var chartType = 'column';
          
          if ($("#chart-type").val() == 0) {
              var plotOptions = { column: { pointPadding: 0.2, borderWidth: 0 }, series: { pointPadding: 0.1, groupPadding: 0.1, borderWidth: 0, shadow: false } };
              var yAxisText = 'Quantidade';
              var tooltip = { formatter: function() { return '<b>'+ this.x + '</b><br/>' + this.series.name +': '+ this.y; } };
          }
          else {
              var plotOptions = { column: { stacking: 'percent' }, series: { pointPadding: 0.1, groupPadding: 0.1, borderWidth: 0, shadow: false } };
              var yAxisText = 'Percentagem';
              var tooltip = { formatter: function() { return '<b>'+ this.x + '</b><br/>' + this.series.name +': '+ Math.round(this.percentage*100)/100 + '%'; } };
          }
          
          initChart(jsonRsp.series, jsonRsp.categories, chartType, plotOptions, yAxisText, tooltip);
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
