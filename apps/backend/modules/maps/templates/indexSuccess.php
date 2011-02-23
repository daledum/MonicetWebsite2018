<?php use_helper('I18N', 'Date') ?>

<?php slot('gmap') ?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #map_canvas { height: 100% }
</style>
<script type="text/javascript"
    src="http://maps.google.com/maps/api/js?sensor=true">
</script>
<script type="text/javascript">
  
  var markers = [];
  
  var especiesActivas = [];
  
  function initialize() {
    var latlng = new google.maps.LatLng(38.4105,-28.4326);
    var myOptions = {
      zoom: 7,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
        
    
    $(function() {
      $("#pesquisa").focus(function() {
        $(this).val("");
      });
      $("#pesquisa").autocomplete({
        source: "/admin.php/specieQuery",
        minLength: 2,
        select: function( event, ui ) {
          // ui.item.value
            //alert(ui.item.code);
            // meter na side bar
            // invocar action por ajax para obter spots
            
            $.ajax({
              url: "/admin.php/mapResults",
              //dataType: "jsonp",
              data: {
                specie_id: ui.item.id
              },
              success: function( data ) {
                
                
                if(data == '\n'){
                  alert('Esta espécie não se encontra registada nos avistamentos.');
                  return;
                }
                
                var obj = $.parseJSON(data);
                
                //var obj = JSON.parse(data);
                
                
                if(especiesActivas[obj.id] == true){
                  alert('Esta espécie já se encontra listada!');
                }else{
                  
                  //var obj = $.parseJSON(data);
                
                  markers[obj.id] = [];
                  
                  $.each(obj.spots, function(index, value){
                  
                    var lat = value.lat;
                    if(value.lat > 0){
                      if(obj.baselat < 0){
                        lat *= -1;
                      }
                    }else{
                      if(obj.baselat > 0){
                        lat *= -1;
                      }
                    }
                    
                    var lon = value.lon;
                    if(value.lon > 0){
                      if(obj.baselon < 0){
                        lon *= -1;
                      }
                    }else{
                      if(obj.baselon > 0){
                        lon *= -1;
                      }
                    }
                    
                  
                    var myLatlng = new google.maps.LatLng(lat,value.lon * -1);
                    var image = '/images/backend/icons_gmaps/'+obj.code+'.png';
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        title: obj.code,
                        icon: image
                    });
                    
                    var contentString = 
                    '<div class="title-w">'+obj.name+' - '+obj.code+'</div><br />'+
                    '<div class="text-w">'+
                      '<strong>Empresa:</strong> '+value.company_name+'<br />'+
                      '<strong>Saída:</strong> '+value.gi_code+'<br />'+
                      '<strong>Data:</strong> '+value.date+'&nbsp;&nbsp;&nbsp;<strong>Hora:</strong> '+value.time+'<br />'+
                      // TODO condição para validar utilizador para ver os dados
                      '<strong>Nº Barcos:</strong> '+value.n_vessels+'&nbsp;&nbsp;&nbsp;<strong>Skipper:</strong> '+value.skipper+'&nbsp;&nbsp;&nbsp;<strong>Guia:</strong> '+value.guide+'<br />'+
                      '<strong>Total:</strong> '+value.total+'&nbsp;&nbsp;&nbsp;<strong>Adultos:</strong> '+value.adults+'&nbsp;&nbsp;&nbsp;<strong>Jovens:</strong> '+value.juveniles+'&nbsp;&nbsp;&nbsp;<strong>Crias:</strong> '+value.calves+'<br />'+
                      '<strong>Latitude:</strong> '+value.lat+'&nbsp;&nbsp;&nbsp;<strong>Longitude:</strong> '+value.lon+'<br />'+
                    '</div>';
                    
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    
                    google.maps.event.addListener(marker, 'click', function() {
                      infowindow.open(map,marker);
                    });
                    
                    marker.setMap(map);
                    
                    markers[obj.id].push(marker);
                    
                    $('#pesquisa').val("");
                    
                  });
                  
                  
                  
                  
                  
                  
                  $('#item-list').append('<div id="'+obj.code+'" style="padding: 5px; margin-bottom: 5px;"><a class="icon"><img src="/images/backend/icons_gmaps/' + obj.code + '.png"></a>'+obj.name+' ('+obj.code+') <a href="#" id="show-hide-' + obj.code + '" class="show" type="button"></a><input id="show-hide-' + obj.code + '-val" type="hidden" value="' + obj.id + '" /><a class="remove" id="remove-' + obj.code + '"></a></div>');
                  
                  
                  especiesActivas[obj.id] = true;
                  
                  $('#show-hide-'+obj.code).toggle(
                    function(){
                      removeMarkers(markers[$("#" + $(this).attr('id') + "-val").val()]);
                      $(this).attr('class','hide');
                    },
                    function() {
                      addMarkers(markers[$("#" + $(this).attr('id') + "-val").val()]);
                      $(this).attr('class','show');
                    }
                  );
                  
                  $('#remove-' +obj.code).click(
                    function(){
                      if (confirm('Remover ' + $(this).attr('id').substr(7) + ' ?')) {
                        removeSpecie($(this).attr('id').substr(7), markers[$("#show-hide-" + $(this).attr('id').substr(7) + "-val").val()], $("#show-hide-" + $(this).attr('id').substr(7) + "-val").val());
                      }
                    }
                  );
                  
                }
              }
            });
        },
      });
      
      
      
      
      
    });
        
        
    function addMarkers(markers){
    
      for(var i in markers){
        
        markers[i].setMap(map);
      }
    }
    
    
    function removeMarkers(markers){
      
      for(var i in markers){
        
        markers[i].setMap(null);
      }
    }
    
    function removeSpecie(code,markers,id){
      
      removeMarkers(markers);
      
      $('#'+code).remove();
      
      especiesActivas[id] = false;
      
    }
    
    
        
  }
  
  
  
  
  
</script>

<style type="text/css">

.title-w{
  font-size: 16px;
  font-weight: bold;
}

.text-w{
  font-size: 12px;
  display: inline-block;
}

.show{
  background: transparent url('/images/backend/icons_gmaps/buttons/show.png') no-repeat left top;
}

.hide{
  background: transparent url('/images/backend/icons_gmaps/buttons/hide.png') no-repeat left top;
}

.remove{
  background: transparent url('/images/backend/icons_gmaps/buttons/remove.png') no-repeat left top;
}

.hide, .show, .remove, .icon {
  padding: 10px;
  margin-left: 6px;
  padding: 4px 12px;
}

.icon {
  padding: 4px 5px;
}


  
</style>


<?php end_slot() ?>


<div id="sf_admin_container">
  
  <div id="map_canvas" style="width:70%; height:700px; float: left; margin: 20px 0px;"></div>
  <div style="width:20%; height:700px; float: right; margin: 20px 6% 20px 3%;">
    <div style="border: 1px solid green; height: 660px; padding: 20px;">
      <input type="text" id="pesquisa" name="pesquisa" value="Pesquisar" style="width: 95%; padding: 5px;">
      <div id="item-list" style="margin-top: 20px;"></div>
    </div>
  </div>
</div>
