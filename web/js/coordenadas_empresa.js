$(document).ready(function() {
  var url = window.location.href.split('/');
  
  $.ajax({
    type: "get",
    url: url[0] + "//" + url[2] + "/" + url[3] + "/general_info/coordAjax",
    data: { company_id: $("#general_info_company_id").val() },
    success: function(msg){
      $("#general_info_base_latitude").val($(msg).find('#id_latitude').val());
      $("#general_info_base_longitude").val($(msg).find('#id_longitude').val());
    }
  });
  
  
  
  
  
  $('#general_info_company_id').change(function(){
    $.ajax({
      type: "get",
      url: url[0] + "//" + url[2] + "/" + url[3] + "/general_info/coordAjax",
      data: { company_id: $("#general_info_company_id").val() },
      success: function(msg){
        $("#general_info_base_latitude").val($(msg).find('#id_latitude').val());
        $("#general_info_base_longitude").val($(msg).find('#id_longitude').val());
      }
    });
  });
});