$(document).ready(function() {
    //alert($('#observation_photo_id').val());
    // selecção inicial
    var photoDate = $('#observation_photo_photo_date_year').val() + '-' + $('#observation_photo_photo_date_month').val() + '-' + $('#observation_photo_photo_date_day').val();
    $.ajax({
        url: window.location.protocol + '//' + window.location.host+'/admin.php/ajax/filter-sightings?id=' + $('#observation_photo_id').val() + '&ob_date=' + photoDate + '&specie_id=' + $('#observation_photo_specie_id').val() + '&company_id=' + $('#observation_photo_company_id').val() + '&vessel_id='+ $('#observation_photo_vessel_id').val(),
        type: 'POST',
        success: function(transport, html){
            $('#observation_photo_sighting_id').html(transport);
        }
    });
        
    $('#observation_photo_photo_date_month, #observation_photo_photo_date_day, #observation_photo_photo_date_year, #observation_photo_specie_id, #observation_photo_company_id, #observation_photo_vessel_id').change(function(){
        var photoDate = $('#observation_photo_photo_date_year').val() + '-' + $('#observation_photo_photo_date_month').val() + '-' + $('#observation_photo_photo_date_day').val();
        $.ajax({
            url: window.location.protocol + '//' + window.location.host+'/admin.php/ajax/filter-sightings?id=' + $('#observation_photo_id').val() + '&ob_date=' + photoDate + '&specie_id=' + $('#observation_photo_specie_id').val() + '&company_id=' + $('#observation_photo_company_id').val() + '&vessel_id='+ $('#observation_photo_vessel_id').val(),
            type: 'POST',
            success: function(transport, html){
                $('#observation_photo_sighting_id').html(transport);
            }
        });
    });

    var empty_notes = true;
    if($('#observation_photo_notes').val() != '') {
        empty_notes = false;
    }

    $('#observation_photo_sighting_id').change(function(){
        if($('#observation_photo_sighting_id').val()){
            $.ajax({
                url: window.location.protocol + '//' + window.location.host+'/admin.php/ajax/sighting/' + $('#observation_photo_sighting_id').val(),
                type: 'POST',
                dataType: 'json',
                success: function(transport, html){
                    $('#observation_photo_behaviour_id').val(transport.behaviour_id);
                    if(empty_notes) {
                        $('#observation_photo_notes').val(transport.comments);
                    }
                }
            });
        }
    });
});

