function initChart(series, categories, yAxis, tooltip) {
  var chart = new Highcharts.Chart({
      chart: {
         renderTo: 'chart-image',
         defaultSeriesType: 'line',
      },
      title: {
         text: 'Saídas com Avistamentos',
      },
      xAxis: {
         categories: categories
      },
      yAxis: yAxis,
      legend: {
          enabled: true
      },
      tooltip: tooltip,
      series: series
   });

}

function updateChart() {
  $("#chart-loading").show();
  var categories = [];
  var series = [];
  $.ajax({
      url: "/admin.php/departureChartResults?_=" + Math.floor(Math.random()*1000001),
      data: {"year": $("#year").val(), "month": $("#month").val(), "chart-type": $("#chart-type").val(), "company_id": $("#company_id").val()},
      success: function(rsp) {
          var jsonRsp = $.parseJSON(rsp);
          
          if ($("#chart-type").val() == 0) {
              var yAxis = { title: { text: 'Percentagem de avistamentos' }, min: 0, max: 100 };
              var tooltip = { formatter: function() { return this.y +'%'; } };
          }
          else {
              var yAxis = { title: { text: 'Média de avistamentos' }, min: 0 };
              var tooltip = { formatter: function() { return this.y; } };
          }
          
          initChart(jsonRsp.series, jsonRsp.categories, yAxis, tooltip);
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
