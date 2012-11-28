$(document).ready(function() {
    
    $('#observation_photo_company_id').change(function(){
        var photoDate = $('#observation_photo_photo_date_year').val() + '-' + $('#observation_photo_photo_date_month').val() + '-' + $('#observation_photo_photo_date_day').val();
        $('#link_to_sighting_list').attr('href', '/admin.php/sightings/on/' + photoDate + '?company_id=' + $('#observation_photo_company_id').val() );
//        $.ajax({
//            url: window.location.protocol + '//' + window.location.host + '/admin.php/ajax/company/' + $('#observation_photo_company_id').val() + '/sightings/on/' + photoDate,
//            type: 'POST',
//            success: function(transport, html){
//                $('#observation_photo_sighting_id').html(transport);
//                $('#link_to_sighting_list').attr('href', '/admin.php/sightings/on/' + photoDate + '?company_id=' + $('#observation_photo_company_id').val() );
//            }
//        });
    })
  
});


