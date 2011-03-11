<?php use_helper('I18N', 'Date') ?>

<?php slot('gmap') ?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<script type="text/javascript"
    src="http://maps.google.com/maps/api/js?sensor=true">
</script>
<script type="text/javascript">
  
  var markers = [];
  
  var especiesActivas = [];
  
  var uis = [];
  
  var colors = [];
  
  colors['Ba'] = 'd90000';
  colors['Bb'] = '00e700';
  colors['Be'] = '00e7e7';
  colors['Bm'] = 'e700e7';
  colors['Bp'] = 'e6e6e6';
  colors['Cc'] = 'fdc600';
  colors['Cm'] = 'ddd2de';
  colors['Dc'] = '0094da';
  colors['Dd'] = 'e9e900';
  colors['Em'] = '00d4c2';
  colors['Gg'] = '00dc94';
  colors['Gm'] = '00e697';
  colors['Ha'] = '97e700';
  colors['Kb'] = 'e7a000';
  colors['Lk'] = 'e86800';
  colors['Mb'] = 'e9009f';
  colors['Mm'] = '7600e8';
  colors['Oo'] = '80e600';
  colors['Pc'] = '00e763';
  colors['Pm'] = '006be7';
  colors['Sb'] = '000000';
  colors['Sc'] = 'a9d8ca';
  colors['Sf'] = '000fdc';
  colors['Tt'] = '878787';
  colors['Zc'] = 'c1c1c1';
  colors['Zp'] = 'c37676';
  
  function initialize() {
    var latlng = new google.maps.LatLng(38.4105,-28.4326);
    var myOptions = {
      zoom: 6,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
        
    
    
    /*$("#pesquisa").focus(function() {
      $(this).val("");
    });
    $("#pesquisa").autocomplete({
      source: "/admin.php/specieQuery",
      minLength: 2,
      select: function( event, ui ) {
          
          $.ajax({
            url: "/admin.php/mapResults",
            data: {
              specie_id: ui.item.id,
              company_id: $('#company').val(),
              association_id: $('#association').val(),
              behaviour_id: $('#behaviour').val(),
              sea_state_id: $('#sea_state').val(),
              visibility_id: $('#visibility').val()
            },
            success: function( data ) {
              
              insertSpecieInList(ui)
              
              getResultingDots(data, ui);
              
              uis[ui.item.id] = ui;
              
            }
          });
      },
    });*/
    
    
    
    /*
     * ao seleccionar a espécie, fazo processo de inserção no mapa
     */
    $("#pesquisa-select").change(function(){
      $.ajax({
        url: "/admin.php/specieQuery",
        data: {
          specie_id: $("#pesquisa-select option:selected").val()
        },
        success: function( dat ) {
            
            var j = $.parseJSON(dat);
            var ui = { item: j };
            
            $.ajax({
              url: "/admin.php/mapResults",
              data: {
                specie_id: ui.item.id,
                company_id: $('#company').val(),
                association_id: $('#association').val(),
                behaviour_id: $('#behaviour').val(),
                sea_state_id: $('#sea_state').val(),
                visibility_id: $('#visibility').val()
              },
              success: function( data ) {
                
                if(especiesActivas[ui.item.id] == true){
                  alert('Esta espécie já se encontra listada!');
                  return;
                }else{
                
                  insertSpecieInList(ui);
                  getResultingDots(data, ui);
                  uis[ui.item.id] = ui;
                }
                
              }
            });
        },
      });
    });
    
    
    /*
     * Insere a espécie na lista
     */
    function insertSpecieInList(ui){
    
      $('#item-list').append('<div id="'+ui.item.code+'" class="specie" style="padding: 5px; margin-bottom: 5px;"><a class="icon"><img src="'+getCircleUrl(10,colors[ui.item.code],'bb')+'"></a><div class="specie-name">'+ui.item.name+' ('+ui.item.code+') </div> <div id="specie-count-'+ui.item.code+'" class="specie-count">(0)</div><a href="#" id="show-hide-' + ui.item.code + '" class="show" type="button"></a><input id="show-hide-' + ui.item.code + '-val" type="hidden" value="' + ui.item.id + '" /><a href="#" class="remove" id="remove-' + ui.item.code + '"></a></div>');
      especiesActivas[ui.item.id] = true;
        
      $('#show-hide-'+ui.item.code).toggle(
        function(){
          removeMarkers(markers[$("#" + $(this).attr('id') + "-val").val()]);
          $(this).attr('class','hide');
        },
        function() {
          addMarkers(markers[$("#" + $(this).attr('id') + "-val").val()]);
          $(this).attr('class','show');
        }
      );
      $('#remove-' +ui.item.code).click(
        function(){
          if (confirm('Remover ' + $(this).attr('id').substr(7) + ' ?')) {
            removeSpecie($(this).attr('id').substr(7), markers[$("#show-hide-" + $(this).attr('id').substr(7) + "-val").val()], $("#show-hide-" + $(this).attr('id').substr(7) + "-val").val());
          }
        }
      );
    }
    
    /*
     * Cria o url para os pontos
     */
     function getCircleUrl(size, color, alpha) {
        return "http://chart.apis.google.com/" + 
            "chart?cht=it&chs=" + size + "x" + size + 
            "&chco=" + color + ",00000001,ffffffbb" +
            "&chf=bg,s,00000000|a,s,000000" + alpha + "&ext=.png";
    };
    
    /*
     * retorna a informação para os pontos
     */
    function getResultingDots(data, ui){
      
      if(data == '\n'){
        //alert('Esta espécie não se encontra registada nos avistamentos.');
        return;
      }
      var obj = $.parseJSON(data);
      markers[obj.id] = [];
      var count = 0;
      
      $.each(obj.spots, function(index, value){
      
        var lat = value.lat;
        var lon = -value.lon;
      
        var myLatlng = new google.maps.LatLng(lat,value.lon * -1);
        var image = getCircleUrl(10,colors[ui.item.code],'bb');
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
        
        count = count + 1;
        
      });
      
      $('#specie-count-'+obj.code).html('('+count+')');
      
    }
    
     
    /*
     * mostra informação da espécie
     */
    function addMarkers(markers){
      for(var i in markers){
        markers[i].setMap(map);
      }
    }
    
    /*
     * esconde informação da espécie
     */
    function removeMarkers(markers){
      for(var i in markers){
        markers[i].setMap(null);
      }
    }
    
    /*
     * remove informação da espécie
     */
    function removeSpecie(code,markers,id){
      
      $('#'+code).remove();
      especiesActivas[id] = false;
      removeMarkers(markers);
    }
    
    /*
     * muda a informação ao filtrar filtros
     */
    $('.filter-select').change(function(){
      
      $('.specie input').each(function(index,item){
      
        ui = uis[item.value];
        $('#specie-count-'+ui.item.code).html('(0)');
        removeMarkers(markers[item.value]);
        markers[item.value] = [];
        
        $.ajax({
          url: "/admin.php/mapResults",
          data: {
            specie_id: item.value,
            <?php if($sf_user->isSuperAdmin()): ?>
            company_id: $('#company').val(),
            <?php endif; ?>
            association_id: $('#association').val(),
            behaviour_id: $('#behaviour').val(),
            sea_state_id: $('#sea_state').val(),
            visibility_id: $('#visibility').val()
          },
          success: function( data ) {
            getResultingDots(data, ui);
          }
        });
        
      });
      
    });
    
  }
  
  /*
   * inicializa o javascript com a abertura da página
   */
  $(function(){
    initialize();
  });
  
  
</script>

<style type="text/css">

  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #pg { height: 90% }
  #bd { height: 100% }
  .ct { height: 100% }
  .map-container { height: 100% }
  #map_canvas { 
    height: 90%;
    width:60%;
    float: left;
    margin: 20px 0px; 
  }
  #dv{
    height: 15px;
  }

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

.icon{
  margin-left: 0;
  padding: 4px 8px;
}

/* SIDEBAR */

.right-side-bar{
  width: 300px;
  height: 90%;
  float: left;
  margin: 20px 3% 20px 3%;
  background-color: #FFFFFF;
}
.right-side-bar-inner{
  border: 1px solid silver;
  height: 100%;
  padding: 20px;
  position: inherit;
}
.top-container{
  height: 70%;
}
#pesquisa{
  width: 90% !important;
  padding: 5px 2%;
  margin: 15px 2%;
  border: 2px solid silver !important;
}
#pesquisa-select{
  width: 95% !important;
  padding: 5px 2%;
  margin: 15px 2%;
  border: 2px solid silver !important;
}
#item-list{
  margin-top: 5px;
}

.specie-name{
  width: 160px;
  display: inline-block;
  text-align: left;
}

/* FILTROS */

.bottom-container{
  height: 27%;
  border-top: 1px solid silver;
  padding: 10px 5px;
}

.bottom-container h2{
  margin-left: 5px;
  font-size: 16px;
  margin-bottom: 10px;
  font-style: italic;
  font-weight: bold;
}

.filter-item{
  display: inline-block;
}

.filter-item label{
  width: 84px !important;
  margin-top: 4px;
  font-size: 11px;
}

.filter-item select{
  width: 175px;
  font-size: 11px;
}

.specie-count{
  display: inline-block;
  width: 30px;
  text-align: center;
}
/* FILTROS */

/* SIDEBAR */ 
</style>


<?php end_slot() ?>


<div id="sf_admin_container" class="map-container">
  
  <div id="map_canvas"></div>
  <div class="right-side-bar">
    <div class="top-container">
      <?php /*<input type="text" id="pesquisa" name="pesquisa" value="Pesquisar">*/ ?>
      <select id="pesquisa-select">
        <option></option>
        <?php foreach($speciesList as $specie): ?>
          <option value="<?php echo $specie->getId() ?>"><?php echo $specie->getCode() ?> - <?php echo $specie->getName() ?></option>
        <?php endforeach; ?>
      </select>
      <div id="item-list"></div>
    </div>
    <div class="bottom-container">
      <h2>Filtros:</h2>
      <div class="filter-item">
        <?php if($sf_user->isSuperAdmin()): ?>
        <label>Empresa:</label>
        <select id="company" class="filter-select">
          <option></option>
            <?php foreach($companies as $company): ?>
              <option value="<?php echo $company->getId(); ?>"><?php echo $company->getName(); ?></option>
            <?php endforeach; ?>
        </select>
        <?php endif; ?>
      </div>
      <div class="filter-item">
        <label>Associação:</label>
          <select id="association" class="filter-select">
            <option></option>
            <?php foreach($associations as $association): ?>
              <option value="<?php echo $association->getId(); ?>"><?php echo $association->getDescription(); ?></option>
            <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-item">
        <label>Comportamento:</label>
          <select id="behaviour" class="filter-select">
            <option></option>
            <?php foreach($behaviours as $behaviour): ?>
              <option value="<?php echo $behaviour->getId(); ?>"><?php echo $behaviour->getDescription(); ?></option>
            <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-item">
        <label>Estado do Mar:</label>
          <select id="sea-state" class="filter-select">
            <option></option>
            <?php foreach($sea_states as $sea_state): ?>
              <option value="<?php echo $sea_state->getId(); ?>"><?php echo $sea_state->getDescription(); ?></option>
            <?php endforeach; ?>
        </select>
      </div>
      <div class="filter-item">
        <label>Visibilidade:</label>
          <select id="visibility" class="filter-select">
            <option></option>
            <?php foreach($visibilities as $visibility): ?>
              <option value="<?php echo $visibility->getId(); ?>"><?php echo $visibility->getDescription(); ?></option>
            <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
</div>
