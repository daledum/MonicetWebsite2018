$(document).ready(function(){
    // Set starting slide to 1
    var startSlide = 1;
    // Get slide number if it exists
    if (window.location.hash) {
        startSlide = window.location.hash.replace('#','');
    }
    // Initialize Slides
    $('#slides').slides({
        pagination: false, // boolean, If you're not using pagination you can set to false, but don't have to
        generatePagination: false, // boolean, Auto generate pagination
        animationComplete: function(current){
            // Set the slide number as a hash
            window.location.hash = '#' + current;
        }
    });
});