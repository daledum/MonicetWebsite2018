<div id="converter">

    <div id="convertFromDMStoDD">
     <h2>If you don't want to use the saved base coordinates of your company and would like to write different values in the degrees-minutes-seconds (DMS) format, please convert them to decimal here:<br/></h2><br>
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
        </table><br>
        <input type="submit" value="Convert" />
        </form>
    </div>
</div>

<script>
 
    $('#convert').submit(function () {

     $('#latDec').val(Geo.parseDMS($('#latDMS').val()).toFixed(5));
     $('#lonDec').val(Geo.parseDMS($('#lonDMS').val()).toFixed(5));
     $('#latDMS').val(Geo.toLat($('#latDec').val(),'dms',1));
     $('#lonDMS').val(Geo.toLon($('#lonDec').val(),'dms',1));

     return false;
    });

</script>
