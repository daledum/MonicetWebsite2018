var map = null;

var active_info_window = null;

function info(marker, desc, auto_show_info) {
    var infowindow = new google.maps.InfoWindow({
        content: "<div class='info_window'>" + desc + "</div>"
    });

    if (auto_show_info) {
        infowindow.open(map, marker);
        active_info_window = infowindow;
    } else {
        active_info_window = null;
        google.maps.event.addListener(marker, 'click', function(event) {
            if(active_info_window != null) {
                active_info_window.close();
            }
            infowindow.open(map, marker);
            active_info_window = infowindow;
        });
    }
}


function initialize(container, gmap_items, zoom) {    
    var gmap_arr = [];
    var counter = 0;
    for(var item in gmap_items) {
        gmap_arr[counter] = gmap_items[item];
        counter ++;
    }

    var map_latlng = null;
    var bounds = new google.maps.LatLngBounds();

    if(gmap_arr.length == 0) {
        zoom = 5
        map_latlng = new google.maps.LatLng(37.779398,-25.642089);
    } else {
        var lat_sum = 0;
        var lng_sum = 0;
        for(var i=0; i<gmap_arr.length; i++) {
            lat_sum += gmap_arr[i].latitude;
            lng_sum += gmap_arr[i].longitude;
            bounds.extend(new google.maps.LatLng(gmap_arr[i].latitude, gmap_arr[i].longitude));
        }
        map_latlng = new google.maps.LatLng(lat_sum/gmap_arr.length, lng_sum/gmap_arr.length);
    }

    var opts = {
        zoom: zoom,
        center: map_latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
    };
    map = new google.maps.Map(document.getElementById(container), opts);

    if(gmap_arr.length > 1) {
       map.fitBounds(bounds);
       var listener = google.maps.event.addListener(map, "idle", function() { 
            if (map.getZoom() > 10) map.setZoom(10); 
            google.maps.event.removeListener(listener); 
       });
    }
    
    var icon = '/images/backend/icons_gmaps/c25.png'
    
    for(var i=0; i<gmap_arr.length; i++) {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(gmap_arr[i].latitude, gmap_arr[i].longitude), 
            map: map, 
            title:"",
            icon: icon 
        });

        info(marker, gmap_arr[i].desc, gmap_arr[i].auto_show_info);
    }
    return map;
}


