$(document).ready(function(){
    $('.to_zoom')
        .wrap('<span style="display:inline-block"></span>')
        .css('display', 'block')
        .parent()
        .zoom({
            grab: true,
            icon: true
        });
});
