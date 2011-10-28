$(document).ready(function() {
  var url = window.location.href.split('/');
  
  $.ajax({
    type: "get",
    url: url[0] + "//" + url[2] + "/" + url[3] + "/watch_info/coordAjax",
    data: { company_id: $("#watch_info_company_id").val() },
    success: function(msg){
      $("#watch_info_base_latitude").val($(msg).find('#id_latitude').val());
      $("#watch_info_base_longitude").val($(msg).find('#id_longitude').val());
    }
  });
  
  
  
  
  
  $('#watch_info_company_id').change(function(){
    $.ajax({
      type: "get",
      url: url[0] + "//" + url[2] + "/" + url[3] + "/watch_info/coordAjax",
      data: { company_id: $("#watch_info_company_id").val() },
      success: function(msg){
        $("#watch_info_base_latitude").val($(msg).find('#id_latitude').val());
        $("#watch_info_base_longitude").val($(msg).find('#id_longitude').val());
      }
    });
  });
});