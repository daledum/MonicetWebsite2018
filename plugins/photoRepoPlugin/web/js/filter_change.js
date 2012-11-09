$(document).ready(function(){
    $('#catalog_filter_specie_id, #catalog_filter_photo_date_from, #catalog_filter_photo_date_to, #catalog_filter_island, #catalog_filter_photographer_id, #catalog_filter_company_id').change(function(){
       $('#catalog-filter-form').submit();
    });
    $(".fancybox").fancybox();
});

