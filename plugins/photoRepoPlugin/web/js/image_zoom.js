//$(document).ready(function(){
//    $('.to_zoom')
//        .wrap('<span style="display:inline-block"></span>')
//        .css('display', 'block')
//        .parent()
//        .zoom({
//            grab: true,
//            icon: true
//        });
//});
$(document).ready(function(){
   $("#photo-to-zoom").gzoom({
        sW: 730,
        sH: '100%',
        lW: '200%',
        lH: 1050,
        lighbox : false
    }); 
});