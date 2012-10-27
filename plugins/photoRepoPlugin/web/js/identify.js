$(document).ready(function(){
    $( "#carousel" ).rcarousel( {
        visible: 7,
        step: 6,
        margin: 6,
        width: 165, 
        height: 165,
        navigation: {next: "#ui-carousel-next", prev: "#ui-carousel-prev"}
    } );
    
    $('.checkbox_item').each(function(index, domEle){
       $(domEle).change(function(){
         var html = $("#selected_checkboxes").html();
         if($(domEle).attr('checked') == true) {
             $("#selected_checkboxes").html(html + ',#' + $(domEle).attr('id'))
         } else {
             var substr = '#' + $(domEle).attr('id')
             html = html.replace((',' + substr),'');
             $("#selected_checkboxes").html(html)
         }
       }); 
    });
    
    $("#ui-carousel-next, #ui-carousel-prev").click(function(){
        $($("#selected_checkboxes").html()).each(function(index, domEle){
            //$(domEle).attr('checked', 'checked');
        });
    });
//    $("#ui-carousel-next, #ui-carousel-prev").click(function(){
//        var selected_checkboxes = []
//        $('.checkbox_item').each(function(index, domEle){
//            if($(domEle).attr('checked') == true) { 
//                selected_checkboxes.push($(domEle).attr('id'));
//                //alert(index + ' # ' + $(domEle).attr('id') );
//            }
//        });
//        //alert(selected_checkboxes);
//        $.each(selected_checkboxes, function(index, domElem){
//            //alert(document.getElementById(domElem));
//            //alert($('#'+domElem).get(0));
//            ($('#'+domElem).get(0)).attr('checked', 'checked');
//        });
//    });
});