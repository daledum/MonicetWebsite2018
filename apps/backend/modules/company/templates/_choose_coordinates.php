<div id="choose_coordinates">
    <div id="map_canvas">
    </div>
    <div id="convertFromDMStoDD">
     <h2>If you don't want to use the map and you have your coordinates in the degrees-minutes-seconds (DMS) format, please convert them to decimal here:<br/></h2><br>
     <p>If you remove the N, S, E or W from the end, please put a minus in front of the latitude value, if in the Southern Hemisphere and in front of the longitude value, if in the Western Hemisphere.<br/></p><br>
        <form name="convert" id="convert">
        <table class="note">
            <tr>
                <td>Latitude</td>
                <td>Longitude</td>
            </tr>
            <tr>
                <td><input type="text" name="latDMS" id="latDMS" value="52°12′17.0″N" class="note w8"></td>
                <td><input type="text" name="lonDMS" id="lonDMS" value="000°08′26.0″E" class="note w8"></td>
            </tr>
            <tr>
                <td><input type="text" name="latDec" id="latDec" value="52.20472" class="note w8"></td>
                <td><input type="text" name="lonDec" id="lonDec" value="0.14056" class="note w8"></td>
            </tr>
        </table>
        <input type="submit" value="Convert" />
        </form>
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

    $('#convert').submit(function () {

     $('#latDec').val(Geo.parseDMS($('#latDMS').val()).toFixed(5));
     $('#lonDec').val(Geo.parseDMS($('#lonDMS').val()).toFixed(5));
     $('#latDMS').val(Geo.toLat($('#latDec').val(),'dms',1));
     $('#lonDMS').val(Geo.toLon($('#lonDec').val(),'dms',1));

     return false;
    });
    
</script>
