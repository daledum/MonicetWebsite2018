$(document).ready(function(){
    
    $('#carousel_results').liquidcarousel({height:165, duration:800, hidearrows: false});
    
    $('.carousel_selector').each(function(index, domElem){
        // creates a carousel for eache selector option and hides all carousels except the first
        $('#'+$(domElem).val()).liquidcarousel({height:175, duration:800, hidearrows: false});
        if( index != 0 ) {
            $('#'+$(domElem).val()).hide('fast');
            $('#empty_'+$(domElem).val()).hide('fast');
        }
        
    });
    
    
    // switches visibility to selected carousel
    $('#priority_selector').change(function(domElem){
        var visible = $(this).val();
        $('.carousel_selector').each(function(index, domElem){
            $('#'+$(domElem).val()).hide('slow');
            $('#empty_'+$(domElem).val()).hide('slow');
            //alert($('#'+$(domElem).val()).html());
        });
        $('#'+visible).show('slow');
        $('#empty_'+visible).show('slow');
    });
    
});