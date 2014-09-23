<div id="choose_coordinates">
    <div id="map_canvas">
    </div>
</div>

<script>
      var map;
      var marker = null;

      //when I edit a company form, the map is centered on previous data (if new company, map is centered on Ponta Delgada)
      var company_lat = 37.742242;
      var company_long = -25.67495;
      if( $("#company_base_latitude").val() && $("#company_base_longitude").val() ){
          company_lat = $("#company_base_latitude").val();
          company_long = $("#company_base_longitude").val();
      }

      function initialize() {

          var mapOptions = {
          center: new google.maps.LatLng(company_lat,company_long),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

          google.maps.event.addListener(map, 'click', function(event) {

          //call function to create marker and pass values to form fields
          $("#company_base_latitude").val(event.latLng.lat());
          $("#company_base_longitude").val(event.latLng.lng());

          //delete the old marker
          if(marker){ 
            marker.setMap(null); 
          }
          //create the new marker
          marker = new google.maps.Marker({ position: event.latLng, map: map});
          });
      }  

      google.maps.event.addDomListener(window, 'load', initialize);
</script>
