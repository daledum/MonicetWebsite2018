$(document).ready(function(){
    //initial state
    var field_group = '#identify_form_choices_smooth, #identify_form_choices_irregular, #identify_form_choices_cutted_point, #identify_form_choices_cutted_point_left, #identify_form_choices_cutted_point_right, #identify_form_choices_complete_marks, #identify_form_choices_depth';
    var opposite_to_smooth = '#identify_form_choices_irregular, #identify_form_choices_cutted_point, #identify_form_choices_cutted_point_left, #identify_form_choices_cutted_point_right, #identify_form_choices_complete_marks, #identify_form_choices_depth';
    
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
            if($('.mark_click_listener').length > 0){
                $('#identify_form_choices_complete_marks').attr('checked', true);
                $('#identify_form_choices_depth').attr('checked', true);
            } else {
                $('#identify_form_choices_complete_marks').attr("disabled", "disabled");;
                $('#identify_form_choices_depth').attr("disabled", "disabled");;
            }
            var description = $('#identify_description');
            if( (description.html().indexOf("Lisa") !== -1) ){
                $(opposite_to_smooth).removeAttr("checked");
                $(opposite_to_smooth).attr("disabled", "disabled");
                $('#identify_form_choices_smooth').attr('checked', true);
            }
        }
    });
    //switch between smooth and irregular
    $('#identify_form_choices_smooth').change(function(){
        if($('#identify_form_choices_smooth').attr('checked') == true){
            $(opposite_to_smooth).removeAttr("checked");
            $(opposite_to_smooth).attr("disabled", "disabled");
        } else {
            $(opposite_to_smooth).removeAttr("disabled");
            if($('.mark_click_listener').length > 0){
                $('#identify_form_choices_complete_marks').attr('checked', true);
                $('#identify_form_choices_depth').attr('checked', true);
            } else {
                $('#identify_form_choices_complete_marks').attr("disabled", "disabled");;
                $('#identify_form_choices_depth').attr("disabled", "disabled");;
            }
        }
    });
    
        
    // first ajax request
    send_ajax_request();
    
    // every ajax request on form change
    $('#identify_form input').change(function(){
        send_ajax_request();
    });
        
    $('.mark_click_listener').each(function(){
        var html = $(this).html()
        //$(this).html('<b>' + html + '</b>');
        
        $(this).click(function(){
            var id_str_parts = $(this).attr('id').split('_');
            var id = id_str_parts[2];
            if($("#identify_form_marks option[value='" + id +"']").attr("selected")){
                $("#identify_form_marks option[value='" + id +"']").removeAttr("selected");
                html = html.replace("<b>", "");
                html = html.replace("</b>", "");
                $(this).html(html);
            } else {
                $("#identify_form_marks option[value='" + id +"']").attr("selected", "selected");
                $(this).html('<b>' + html + '</b>');
            }
            send_ajax_request();
        });
   });
});


function send_ajax_request(){
    var args = $('#identify_form').serialize() + '&_rd=' + Math.random();
    $.ajax({
        url: window.location.protocol + '//' + window.location.host+'/admin.php/ajax/observation-photo/possible-matches?' + args,
        type: 'POST',
        success: function(transport, html){
            //alert(transport);
            $('#carousel_results').html(transport);
            $('#carousel_results').liquidcarousel({height:165, duration:600, hidearrows: false});
        }
    });
}