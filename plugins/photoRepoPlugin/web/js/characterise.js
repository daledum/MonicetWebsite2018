$(document).ready(function(){
    
    function testFilled (element_str) {
        var result = false;
        $(element_str).each(function(index, domEle){
            if( $(domEle).attr('checked') == true ){
                result = true
            }
            if ($(domEle).is("#mark_content") ) {
                if($.trim($(domEle).html()) != "Sem marcas adicionadas") {
                    result = true
                }
            }
        });
        return result;
    };   
    
    // deal with combination of fields on Tail mark Form
    $('#observation_photo_tail_mark_is_wide').change(function(){
        if($('#observation_photo_tail_mark_is_wide').attr('checked') == true) { 
            $('#observation_photo_tail_mark_is_deep').removeAttr("checked");
            $('#observation_photo_tail_mark_is_deep').attr("disabled", "disabled");
        } else {
            $('#observation_photo_tail_mark_is_deep').removeAttr("disabled");
            $('#observation_photo_tail_mark_to_cell_id').removeAttr("disabled");
        }
    });
    $('#observation_photo_tail_mark_is_deep').change(function(){
        if($('#observation_photo_tail_mark_is_deep').attr('checked') == true) { 
            $('#observation_photo_tail_mark_is_wide').removeAttr("checked");
            $('#observation_photo_tail_mark_is_wide').attr("disabled", "disabled");
            $('#observation_photo_tail_mark_to_cell_id').attr("disabled", "disabled");
            $('#observation_photo_tail_mark_to_cell_id').attr("value", "");
        } else {
            $('#observation_photo_tail_mark_is_wide').removeAttr("disabled");
            $('#observation_photo_tail_mark_to_cell_id').removeAttr("disabled");
        }
    });
    // deal with combination of fields on Dorsal Left mark Form
    $('#observation_photo_dorsal_left_mark_is_wide').change(function(){
        if($('#observation_photo_dorsal_left_mark_is_wide').attr('checked') == true) { 
            $('#observation_photo_dorsal_left_mark_is_deep').removeAttr("checked");
            $('#observation_photo_dorsal_left_mark_is_deep').attr("disabled", "disabled");
        } else {
            $('#observation_photo_dorsal_left_mark_is_deep').removeAttr("disabled");
            $('#observation_photo_dorsal_left_mark_to_cell_id').removeAttr("disabled");
        }
    });
    $('#observation_photo_dorsal_left_mark_is_deep').change(function(){
        if($('#observation_photo_dorsal_left_mark_is_deep').attr('checked') == true) { 
            $('#observation_photo_dorsal_left_mark_is_wide').removeAttr("checked");
            $('#observation_photo_dorsal_left_mark_is_wide').attr("disabled", "disabled");
            $('#observation_photo_dorsal_left_mark_to_cell_id').attr("disabled", "disabled");
            $('#observation_photo_dorsal_left_mark_to_cell_id').attr("value", "");
        } else {
            $('#observation_photo_dorsal_left_mark_is_wide').removeAttr("disabled");
            $('#observation_photo_dorsal_left_mark_to_cell_id').removeAttr("disabled");
        }
    });
    // deal with combination of fields on Dorsal Right mark Form
    $('#observation_photo_dorsal_right_mark_is_wide').change(function(){
        if($('#observation_photo_dorsal_right_mark_is_wide').attr('checked') == true) { 
            $('#observation_photo_dorsal_right_mark_is_deep').removeAttr("checked");
            $('#observation_photo_dorsal_right_mark_is_deep').attr("disabled", "disabled");
        } else {
            $('#observation_photo_dorsal_right_mark_is_deep').removeAttr("disabled");
            $('#observation_photo_dorsal_right_mark_to_cell_id').removeAttr("disabled");
        }
    });
    $('#observation_photo_dorsal_right_mark_is_deep').change(function(){
        if($('#observation_photo_dorsal_right_mark_is_deep').attr('checked') == true) { 
            $('#observation_photo_dorsal_right_mark_is_wide').removeAttr("checked");
            $('#observation_photo_dorsal_right_mark_is_wide').attr("disabled", "disabled");
            $('#observation_photo_dorsal_right_mark_to_cell_id').attr("disabled", "disabled");
            $('#observation_photo_dorsal_right_mark_to_cell_id').attr("value", "id");
        } else {
            $('#observation_photo_dorsal_right_mark_is_wide').removeAttr("disabled");
            $('#observation_photo_dorsal_right_mark_to_cell_id').removeAttr("disabled");
        }
    });
    
    
    
    $('#observation_photo_tail_is_smooth').change(function(){
        if($('#observation_photo_tail_is_smooth').attr('checked') == true) { 
            var any_filled = testFilled('#observation_photo_tail_is_irregular, #observation_photo_tail_is_cutted_point_left, #observation_photo_tail_is_cutted_point_right, #mark_content');
            if (any_filled) {
                alert('Para poder seleccionar a opção "Lisa" não pode ter nenhuma amarca adicionada nem ter qualquer outra opção activa.')
                $('#observation_photo_tail_is_smooth').removeAttr("checked");
            } else {
                //disable fields
                $('#observation_photo_tail_is_irregular').attr("disabled", "disabled");
                $('#observation_photo_tail_is_cutted_point_left').attr("disabled", "disabled");
                $('#observation_photo_tail_is_cutted_point_right').attr("disabled", "disabled");
            }
        } else {
            $('#observation_photo_tail_is_irregular').removeAttr("disabled");
            $('#observation_photo_tail_is_cutted_point_left').removeAttr("disabled");
            $('#observation_photo_tail_is_cutted_point_right').removeAttr("disabled");
        }
    });
    
    
    $('#observation_photo_dorsal_left_is_smooth').change(function(){
        if($('#observation_photo_dorsal_left_is_smooth').attr('checked') == true) { 
            var any_filled = testFilled('#observation_photo_dorsal_left_is_irregular, #observation_photo_dorsal_left_is_cutted_point, #mark_content');
            if (any_filled) {
                alert('Para poder seleccionar a opção "Lisa" não pode ter nenhuma amarca adicionada nem ter qualquer outra opção activa.')
                $('#observation_photo_dorsal_left_is_smooth').removeAttr("checked");
            } else {
                //disable fields
                $('#observation_photo_dorsal_left_is_irregular').attr("disabled", "disabled");
                $('#observation_photo_dorsal_left_is_cutted_point').attr("disabled", "disabled");
            }
        } else {
            $('#observation_photo_dorsal_left_is_irregular').removeAttr("disabled");
            $('#observation_photo_dorsal_left_is_cutted_point').removeAttr("disabled");
        }
    });
    
    $('#observation_photo_dorsal_right_is_smooth').change(function(){
        if($('#observation_photo_dorsal_right_is_smooth').attr('checked') == true) { 
            var any_filled = testFilled('#observation_photo_dorsal_right_is_irregular, #observation_photo_dorsal_right_is_cutted_point, #mark_content');
            if (any_filled) {
                alert('Para poder seleccionar a opção "Lisa" não pode ter nenhuma amarca adicionada nem ter qualquer outra opção activa.')
                $('#observation_photo_dorsal_right_is_smooth').removeAttr("checked");
            } else {
                //disable fields
                $('#observation_photo_dorsal_right_is_irregular').attr("disabled", "disabled");
                $('#observation_photo_dorsal_right_is_cutted_point').attr("disabled", "disabled");
            }
        } else {
            $('#observation_photo_dorsal_right_is_irregular').removeAttr("disabled");
            $('#observation_photo_dorsal_right_is_cutted_point').removeAttr("disabled");
        }
    });
});