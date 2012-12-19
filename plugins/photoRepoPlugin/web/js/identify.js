$(document).ready(function(){
    //initial state
    var field_group = '#identify_form_choices_smooth, #identify_form_choices_irregular, #identify_form_choices_cutted_point, #identify_form_choices_cutted_point_left, #identify_form_choices_cutted_point_right, #identify_form_choices_marks';
    var opposite_to_smooth = '#identify_form_choices_irregular, #identify_form_choices_cutted_point, #identify_form_choices_cutted_point_left, #identify_form_choices_cutted_point_right, #identify_form_choices_marks';
    
    //define complete caracterization as default
    $('#identify_form_choices_same').attr('checked','checked');
    $('#identify_form_choices_best').attr('checked','checked');
    $('#identify_form_choices_same_body_part').attr('checked','checked');
    $(field_group).removeAttr("checked");
    $(field_group).attr("disabled", "disabled");
    
    //switch between complete or partial
    $('#identify_form_choices_same').change(function(){
        if($('#identify_form_choices_same').attr('checked') == true){
            $(field_group).removeAttr("checked");
            $(field_group).attr("disabled", "disabled");
        } else {
            $(field_group).removeAttr("disabled");
        }
    });
    //switch between smoth and irregular
    $('#identify_form_choices_smooth').change(function(){
        if($('#identify_form_choices_smooth').attr('checked') == true){
            $(opposite_to_smooth).removeAttr("checked");
            $(opposite_to_smooth).attr("disabled", "disabled");
        } else {
            $(opposite_to_smooth).removeAttr("disabled");
        }
    });
    
    // first ajax request
    var args = $('#identify_form').serialize() + '&_rd=' + Math.random();
    $.ajax({
        url: window.location.protocol + '//' + window.location.host+'/admin.php/ajax/observation-photo/possible-matches?' + args,
        type: 'POST',
        success: function(transport, html){
            //alert(transport);
            $('#ajax_wrapper_droper').html(transport);
            $('#carousel_results').liquidcarousel({height:165, duration:800, hidearrows: false});
        }
    });
    
    // every ajax request on form change
    $('#identify_form input').change(function(){
        var args = $('#identify_form').serialize() + '&_rd=' + Math.random();
        $.ajax({
            url: window.location.protocol + '//' + window.location.host+'/admin.php/ajax/observation-photo/possible-matches?' + args,
            type: 'POST',
            success: function(transport, html){
                //alert(transport);
                $('#ajax_wrapper_droper').html(transport);
                $('#carousel_results').liquidcarousel({height:165, duration:800, hidearrows: false});
            }
        });
    });
        
});