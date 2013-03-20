
var markers = [];

var datasets = [];

var layers = [];

var especiesActivas = [];

var uis = [];

var colors = [];

var speciesColors = [];

var zindexvalue = 0;

var colorIndex = 0;

colors[0] = '9cff32';
colors[1] = 'ff3232';
colors[2] = 'a6ffed';
colors[3] = '737373';
colors[4] = 'ffbedd';
colors[5] = '61390e';
colors[6] = '0511ff';
colors[7] = '9a8670';
colors[8] = 'b7b10b';
colors[9] = '9886ae';
colors[10] = '117566';
colors[11] = 'ffe432';
colors[12] = 'e1e5c0';
colors[13] = 'ff9494';
colors[14] = 'c7c7cd';
colors[15] = '00e4ff';
colors[16] = '9805ff';
colors[17] = '232323';
colors[18] = 'c1ffea';
colors[19] = 'f4abff';
colors[20] = '5fb9d3';
colors[21] = '236375';
colors[22] = '5fd3c1';
colors[23] = 'ff8932';
colors[24] = '0e7015';
colors[25] = 'd01b52';
colors[26] = '4f884f';
colors[27] = '909a70';
colors[28] = '90b3fb';




/*
 * Função que inicializa o mapa, os pontos, filtros, etc...
 * 
 * Valores para map_type: 'default' ou 'time'
 */
function initialize(map_type, env, scale1, scale2, g_info_id) {
  
  
  if(map_type == 'default' || map_type == 'ginfo'){
      
    /*
     * inicializa mapa normal
     */
    var latlng = new google.maps.LatLng(38.4105,-28.4326);
    var myOptions = {
      zoom: 6,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    centerMapOnIsland($('#island').val());
  }else if(map_type == 'time'){
    
    s1 = '';
    s2 = '';
    
    if(scale1 == 1){
      s1 = Timeline.DateTime.DAY;
    }else{
      if(scale1 == 2){
        s1 = Timeline.DateTime.WEEK;
      }else{
        if(scale1 == 3){
          s1 = Timeline.DateTime.MONTH;
        }
      }
    }
    
    if(scale2 == 2){
      s2 = Timeline.DateTime.WEEK;
    }else{
      if(scale2 == 3){
        s2 = Timeline.DateTime.MONTH;
      }else{
        if(scale2 == 4){
          s2 = Timeline.DateTime.YEAR;
        }
      }
    }
    
    /*
     * inicializa TimeMap
     */
    var tm = TimeMap.init({
      mapId: "map",
      timelineId: "timeline",
      datasets: [
        {
          data: {
            type: "basic"
          }
        }
      ],
      bandIntervals: [
          s1,
          s2
      ]

    });
    
    /*
     * aplica opções ao GoogleMap do TimeMap
     */
    var latlng = new google.maps.LatLng(38.4105,-28.4326);
    var myOptions = {
      zoom: 6,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = tm.getNativeMap();
    map.setOptions(myOptions);
    
  }else{
    alert("parametro de entrada incorrecto!!");
    return;
  }
  
  
  
  /*
   * INSERIR DADOS DEFAULT OU DE GENERAL INFO
   */
  if(map_type == 'ginfo'){
    $.ajax({
      url: "/admin.php/generalInfoResults",
      data: {
        general_info_id: g_info_id,
        valid: $('#valid').val(),
        environment: env
      },
      success: function( data ) {
        
        var g_info = $.parseJSON(data);
        
        $.each(g_info.species, function(index, specie) {
          
          $('#item-list').append('<div id="loading"></div>');
          var ui = { item: specie };
          insertSpecieInList(ui);
          getResultingDotsGInfo(specie, ui);
          uis[ui.item.id] = ui;
          speciesColors[ui.item.id] = colorIndex;
          colorIndex++;
          $('#loading').remove();
          
        });
        
        
        var count = 0;
        var latitudes = [];
        var longitudes = [];
        var totalLats = 0;
        var totalLons = 0;
        $.each(g_info.species, function(index, specie) {
          $.each(specie.spots, function(index, value){
            latitudes.push(Math.abs(value.lat));
            longitudes.push(Math.abs(value.lon));
            count++;
          });
        });
        $.each(latitudes, function(index, value){
          totalLats = totalLats + parseFloat(value);
        });
        $.each(longitudes, function(index, value){
          totalLons = totalLons + parseFloat(value);
        });
        var lat = totalLats/count;
        var lon = totalLons/count;
        var latlng = new google.maps.LatLng(lat,-lon);
        var myOptions = {
          zoom: 10,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.SATELLITE
        };
        map.setOptions(myOptions);
        
      }
    });
  }
  else{
    $.ajax({
      url: "/index.php/specieQuery",
      data: {
        specie_id: 8,
        environment: env
      },
      success: function( dat ) {
          
          var j = $.parseJSON(dat);
          var ui = { item: j };
          
          $.ajax({
            url: "/index.php/mapResults",
            data: {
              specie_id: ui.item.id,
              company_id: $('#company').val(),
              association_id: $('#association').val(),
              behaviour_id: $('#behaviour').val(),
              sea_state_id: $('#sea_state').val(),
              visibility_id: $('#visibility').val(),
              valid: $('#valid').val(),
              environment: env,
  
              year: $('#year').val(),
              month: $('#month').val(),
  
              environment: env
            },
            success: function( data ) {
              
              $('#loading').remove();
              
              if(especiesActivas[ui.item.id] == true){
                alert('Esta espécie já se encontra listada!');
                return;
              }else{
                insertSpecieInList(ui);
                if(map_type == 'default'){
                  getResultingDotsDefault(data, ui);  
                }else if(map_type == 'time'){
                  getResultingDotsTime(data, ui);
                }
                
                uis[ui.item.id] = ui;
                speciesColors[ui.item.id] = colorIndex;
                
                try{
                  var obj = $.parseJSON(data);
                }
                catch(e){
                  colorIndex++;
                  return;
                }
                
                
                var count = 0;
                var latitudes = [];
                var longitudes = [];
                var totalLats = 0;
                var totalLons = 0;
                
                $.each(obj.spots, function(index, value){
                  latitudes.push(Math.abs(value.lat));
                  longitudes.push(Math.abs(value.lon));
                  count++;
                });
                
                $.each(latitudes, function(index, value){
                  totalLats = totalLats + parseFloat(value);
                });
                
                $.each(longitudes, function(index, value){
                  totalLons = totalLons + parseFloat(value);
                });
                
                var lat = totalLats/count;
                var lon = totalLons/count;
                
                
                var latlng = new google.maps.LatLng(lat,-lon);
                var myOptions = {
                  zoom: 10,
                  center: latlng,
                  mapTypeId: google.maps.MapTypeId.SATELLITE
                };
                map.setOptions(myOptions)
                
                colorIndex++;
              }
              
            }
          });
      }
    });
  }
  
  
  
  
  
  /*
   * ao seleccionar a espécie, faz o processo de inserção no mapa
   */
  $("#pesquisa-select").change(function(){
    
    if ($(this).val() == '') return;
    
    $('#item-list').append('<div id="loading"></div>');
    
    $.ajax({
      url: "/index.php/specieQuery",
      data: {
        specie_id: $("#pesquisa-select option:selected").val()
      },
      success: function( dat ) {
          
          var j = $.parseJSON(dat);
          var ui = { item: j };
          
          $.ajax({
            url: "/index.php/mapResults",
            data: {
              specie_id: ui.item.id,
              company_id: $('#company').val(),
              association_id: $('#association').val(),
              behaviour_id: $('#behaviour').val(),
              sea_state_id: $('#sea_state').val(),
              visibility_id: $('#visibility').val(),
              valid: $('#valid').val(),
              environment: env,
              
              
              month: $('#month').val(),
              year: $('#year').val()
            },
            success: function( data ) {
              
              $('#loading').remove();
              
              if(especiesActivas[ui.item.id] == true){
                alert('Esta espécie já se encontra listada!');
                return;
              }else{
                insertSpecieInList(ui);
                if(map_type == 'default'){
                  getResultingDotsDefault(data, ui);  
                }else if(map_type == 'time'){
                  getResultingDotsTime(data, ui);
                }
                
                uis[ui.item.id] = ui;
                
                colorIndex++;
              }
              
            }
          });
      }
    });
  });
  
  
  /*
   * Insere a espécie na lista
   */
  function insertSpecieInList(ui){
    
    
    
    if(map_type == 'default' || map_type == 'ginfo'){
      
      if(map_type == 'ginfo'){
        $('#item-list').append('<div id="'+ui.item.code+'" class="specie" style="padding: 5px; margin-bottom: 5px;"><a class="icon"><img src="'+getCircleUrl(colorIndex)+'"></a><div class="specie-name">'+ui.item.name+' ('+ui.item.code+') </div> <div id="specie-count-'+ui.item.code+'" class="specie-count">(0)</div><a href="#" id="show-hide-' + ui.item.code + '" class="show" type="button"></a><input id="show-hide-' + ui.item.code + '-val" type="hidden" value="' + ui.item.id + '" /></div>');
      }else{
        $('#item-list').append('<div id="'+ui.item.code+'" class="specie" style="padding: 5px; margin-bottom: 5px;"><a class="icon"><img src="'+getCircleUrl(colorIndex)+'"></a><div class="specie-name">'+ui.item.name+' ('+ui.item.code+') </div> <div id="specie-count-'+ui.item.code+'" class="specie-count">(0)</div><a href="#" id="show-hide-' + ui.item.code + '" class="show" type="button"></a><input id="show-hide-' + ui.item.code + '-val" type="hidden" value="' + ui.item.id + '" /><a href="#" class="remove" id="remove-' + ui.item.code + '"></a></div>');
      }
      
      especiesActivas[ui.item.id] = true;
      speciesColors[ui.item.id] = colorIndex;
      /*
       * definições para esconder, mostrar e eliminar as especies para mapa normal
       */
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
          removeSpecie($(this).attr('id').substr(7), markers[$("#show-hide-" + $(this).attr('id').substr(7) + "-val").val()], $("#show-hide-" + $(this).attr('id').substr(7) + "-val").val());
        }
      );
    }else if(map_type == 'time'){
      
      $('#item-list').append('<div id="'+ui.item.code+'" class="specie" style="padding: 5px; margin-bottom: 5px;"><a class="icon"><img src="'+TimeMapTheme.getCircleUrl(colorIndex)+'"></a><div class="specie-name">'+ui.item.name+' ('+ui.item.code+') </div> <div id="specie-count-'+ui.item.code+'" class="specie-count">(0)</div><a href="#" id="show-hide-' + ui.item.code + '" class="show" type="button"></a><input id="show-hide-' + ui.item.code + '-val" type="hidden" value="' + ui.item.id + '" /><a href="#" class="remove" id="remove-' + ui.item.code + '"></a></div>');
      especiesActivas[ui.item.id] = true;
      speciesColors[ui.item.id] = colorIndex;
      /*
       * definições para esconder, mostrar e eliminar as especies para mapa temporal
       */
      
      $('#show-hide-'+ui.item.code).toggle(
        function(){
          hideDS(ui.item.id);
          tm.refreshTimeline();
          $(this).attr('class','hide');
        },
        function() {
          showDS(ui.item.id);
          tm.refreshTimeline();
          $(this).attr('class','show');
        }
      );
      $('#remove-' +ui.item.code).click(
        function(){
          removeDS($(this).attr('id').substr(7), $("#show-hide-" + $(this).attr('id').substr(7) + "-val").val());
        }
      );
    }
  }
  
  
  if(map_type == 'default' || map_type == 'ginfo'){
    /*
     * Cria o url para os pontos
     */
    function getCircleUrl(code) {
      return '/images/backend/icons_gmaps/c'+code+'.png';
    }
    
  }else if(map_type == 'time'){
    /*
     * Cria o url para os pontos
     */
    TimeMapTheme.getCircleUrl = function(code) {
      return '/images/backend/icons_gmaps/c'+code+'.png';
    }
    
    
    /*
     * cria o tema para os pontos e barras no tempo
     */
    TimeMapTheme.createCircleTheme = function(opts) {
        var defaults = {
                size:12,
                color:'1f77b4',
                alpha:'ff',
                eventIconSize:15,
                eventAlpha:'ff'
            };
        opts = $.extend(defaults, opts);
        return new TimeMapTheme({
            icon: TimeMapTheme.getCircleUrl(opts.code),
            iconShadow: null,
            iconShadowSize: [0,0],
            iconSize: [opts.size, opts.size],
            iconAnchor: [opts.size/2, opts.size/2],
            eventIcon: TimeMapTheme.getCircleUrl(opts.code),
            color: opts.color,
            eventColor: '#'+opts.color
        });
    };
  }
  
  /*
   * retorna a informação para os pontos
   */
  function getResultingDotsDefault(data, ui){
    
    if(data == '\n'){
      //alert('Esta espécie não se encontra registada nos avistamentos.');
      return;
    }
    
    try{
      var obj = $.parseJSON(data);
    }
    catch(e){
      uis[ui.item.id] = ui;
      speciesColors[ui.item.id] = colorIndex;
      colorIndex++;
      return;
    }
    markers[obj.id] = [];
    var count = 0;
    
    var specieColor = colorIndex;
    if(speciesColors[obj.id] !== undefined) specieColor = speciesColors[obj.id];
    
    $.each(obj.spots, function(index, value){
    
      var lat = value.lat;
      var lon = -value.lon;
    
      var myLatlng = new google.maps.LatLng(lat,value.lon * -1);
      var image = getCircleUrl(specieColor);
      var marker = new google.maps.Marker({
          position: myLatlng,
          title: obj.code,
          icon: image
      });
      
      
      var contentString = 
      '<div class="title-w">'+obj.name+' - '+obj.code+'</div><br />'+
      '<div class="text-w">'+
        '<strong>Data:</strong> '+value.date+'&nbsp;&nbsp;&nbsp;<strong>Hora:</strong> '+value.time+'<br />';
      if(env == 'backend'){
        contentString += '<strong>Empresa:</strong> '+value.company_name+'<br />'+
        '<strong>Saída:</strong> '+value.gi_code+'<br />'+
        '<strong>Nº Barcos:</strong> '+value.n_vessels+'&nbsp;&nbsp;&nbsp;<strong>Skipper:</strong> '+value.skipper+'&nbsp;&nbsp;&nbsp;<strong>Guia:</strong> '+value.guide+'<br />';
      }
      contentString += '<strong>Total:</strong> '+value.total+'&nbsp;&nbsp;&nbsp;<strong>Adultos:</strong> '+value.adults+'&nbsp;&nbsp;&nbsp;<strong>Jovens:</strong> '+value.juveniles+'&nbsp;&nbsp;&nbsp;<strong>Crias:</strong> '+value.calves+'<br />'+
        '<strong>Latitude:</strong> '+value.lat+'&nbsp;&nbsp;&nbsp;<strong>Longitude:</strong> '+value.lon+'<br />'+
      '</div>';
      
      
      google.maps.event.addListener(marker, 'click', function() {
        
        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          zIndex: zindexvalue++
        });
        
        infowindow.open(map,marker);
      });
      
      marker.setMap(map);
      markers[obj.id].push(marker);
      
      count = count + 1;
      
    });
    
    $('#specie-count-'+obj.code).html('('+count+')');
    
  }
  
  
  function getResultingDotsTime(data, ui){
      
    if(data == '\n'){
      //alert('Esta espécie não se encontra registada nos avistamentos.');
      return;
    }
    
    try{
      var obj = $.parseJSON(data);
    }
    catch(e){
      uis[ui.item.id] = ui;
      speciesColors[ui.item.id] = colorIndex;
      colorIndex++;
      return;
    }
    
    datasets[obj.id] = tm.createDataset(
      obj.id,
      {
        title: obj.name
      }
    );
    
    var count = 0;
    
    var specieColor = colorIndex;
    if(speciesColors[obj.id] !== undefined) specieColor = speciesColors[obj.id];
    
    $.each(obj.spots, function(index, value){
    
      var lat = value.lat;
      var lon = -value.lon;
      
      var contentString = 
      '<div class="title-w">'+obj.name+' - '+obj.code+'</div><br />'+
      '<div class="text-w">'+
        '<strong>Data:</strong> '+value.date+'&nbsp;&nbsp;&nbsp;<strong>Hora:</strong> '+value.time+'<br />';
      if(env == 'backend'){
        contentString += '<strong>Empresa:</strong> '+value.company_name+'<br />'+
        '<strong>Saída:</strong> '+value.gi_code+'<br />'+
        '<strong>Nº Barcos:</strong> '+value.n_vessels+'&nbsp;&nbsp;&nbsp;<strong>Skipper:</strong> '+value.skipper+'&nbsp;&nbsp;&nbsp;<strong>Guia:</strong> '+value.guide+'<br />';
      }
      contentString += '<strong>Total:</strong> '+value.total+'&nbsp;&nbsp;&nbsp;<strong>Adultos:</strong> '+value.adults+'&nbsp;&nbsp;&nbsp;<strong>Jovens:</strong> '+value.juveniles+'&nbsp;&nbsp;&nbsp;<strong>Crias:</strong> '+value.calves+'<br />'+
        '<strong>Latitude:</strong> '+value.lat+'&nbsp;&nbsp;&nbsp;<strong>Longitude:</strong> '+value.lon+'<br />'+
      '</div>';
      
      TimeMap.themes['theme1'] = TimeMapTheme.createCircleTheme({ color : colors[specieColor], eventColor : '#'+colors[specieColor], code : specieColor });
      
      datasets[obj.id].loadItem({
        "start" : value.date+" "+value.time,
        "point" : {                   
          "lat" : lat,
          "lon" : lon
        },
        "title" : obj.code,
        "options" : {
          "infoHtml" : contentString,
          "theme": "theme1"
        }
      });
      
      var map = tm.getNativeMap();
      map.setOptions(myOptions);
      
      count = count + 1;
      
    });
    
    datasets[obj.id].changeTheme(TimeMap.themes['theme1']);
    
    tm.hideDatasets();
    tm.showDatasets();
    tm.refreshTimeline();
    
    $('#specie-count-'+obj.code).html('('+count+')');
    
  }
  
  
  /*
   * retorna a informação para os pontos (general info)
   */
  function getResultingDotsGInfo(obj, ui){
    
    
    markers[obj.id] = [];
    var count = 0;
    
    var specieColor = colorIndex;
    if(speciesColors[obj.id] !== undefined) specieColor = speciesColors[obj.id];
    
    $.each(obj.spots, function(index, value){
    
      var lat = value.lat;
      var lon = -value.lon;
    
      var myLatlng = new google.maps.LatLng(lat,value.lon * -1);
      var image = getCircleUrl(specieColor);
      var marker = new google.maps.Marker({
          position: myLatlng,
          title: obj.code,
          icon: image
      });
      
      var contentString = 
      '<div class="title-w">'+obj.name+' - '+obj.code+'</div><br />'+
      '<div class="text-w">'+
        '<strong>Data:</strong> '+value.date+'&nbsp;&nbsp;&nbsp;<strong>Hora:</strong> '+value.time+'<br />';
      if(env == 'backend'){
        contentString += '<strong>Empresa:</strong> '+value.company_name+'<br />'+
        '<strong>Saída:</strong> '+value.gi_code+'<br />'+
        '<strong>Nº Barcos:</strong> '+value.n_vessels+'&nbsp;&nbsp;&nbsp;<strong>Skipper:</strong> '+value.skipper+'&nbsp;&nbsp;&nbsp;<strong>Guia:</strong> '+value.guide+'<br />';
      }
      contentString += '<strong>Total:</strong> '+value.total+'&nbsp;&nbsp;&nbsp;<strong>Adultos:</strong> '+value.adults+'&nbsp;&nbsp;&nbsp;<strong>Jovens:</strong> '+value.juveniles+'&nbsp;&nbsp;&nbsp;<strong>Crias:</strong> '+value.calves+'<br />'+
        '<strong>Latitude:</strong> '+value.lat+'&nbsp;&nbsp;&nbsp;<strong>Longitude:</strong> '+value.lon+'<br />'+
      '</div>';
      
      
      google.maps.event.addListener(marker, 'click', function() {
        
        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          zIndex: zindexvalue++
        });
        
        infowindow.open(map,marker);
      });
      
      marker.setMap(map);
      markers[obj.id].push(marker);
      
      count = count + 1;
      
    });
    
    $('#specie-count-'+obj.code).html('('+count+')');
    
  }
  
  
   
  /*
   * mostra informação da espécie (mapa default)
   */
  function addMarkers(markers){
    for(var i in markers){
      markers[i].setMap(map);
    }
  }
  
  /*
   * esconde informação da espécie (mapa default)
   */
  function removeMarkers(markers){
    for(var i in markers){
      markers[i].setMap(null);
    }
  }
  
  /*
   * remove informação da espécie (mapa default)
   */
  function removeSpecie(code,markers,id){
    
    $('#'+code).remove();
    especiesActivas[id] = false;
    removeMarkers(markers);
    delete speciesColors[id];
  }
  
  /*
   * esconde informação da espécie (mapa time)
   */
  function hideDS(id){
    tm.hideDataset(id);
    tm.refreshTimeline();
  }
  
  /*
   * mostra informação da espécie (mapa time)
   */
  function showDS(id){
    tm.showDataset(id);
    tm.refreshTimeline();
  }
  
  /*
   * remove informação da espécie (mapa time)
   */
  function removeDS(code,id){
    $('#'+code).remove();
    especiesActivas[id] = false;
    tm.deleteDataset(id);
    delete speciesColors[id];
  }
  
  /*
   * muda a informação ao filtrar filtros
   */
  $('.filter-select').change(function(){
    
    $('.specie input').each(function(index,item){
    
      ui = uis[item.value];
      $('#specie-count-'+ui.item.code).html('(0)');
      if(map_type == 'default'){
        removeMarkers(markers[item.value]);
        markers[item.value] = [];
      }else if(map_type == 'time'){
        try{
          datasets[ui.item.id].clear();
        }
        catch(e){
          
        }
        
        tm.refreshTimeline();
      }
      
      $.ajax({
        url: "/index.php/mapResults",
        data: {
          specie_id: item.value,
          company_id: $('#company').val(),
          association_id: $('#association').val(),
          behaviour_id: $('#behaviour').val(),
          sea_state_id: $('#sea_state').val(),
          visibility_id: $('#visibility').val(),
          valid: $('#valid').val(),
          environment: env,
          
          month: $('#month').val(),
          year: $('#year').val()
        },
        success: function( data ) {
          if(map_type == 'default'){
            getResultingDotsDefault(data, ui);
          }else if(map_type == 'time'){
            getResultingDotsTime(data, ui);
          }
          
        }
      });
      
    });
    
  });
  
  
  
  initLayers();
  updateMapWithRequest();
  
  $( "#tabs" ).tabs();
  
  
  function initLayers(){
    
    $('#layers-toggle1').click(function(){
      
      if ($('#layers-toggle1:checked').val() !== undefined) {
        
        $('#layers-toggle-div1').append('<div id="loading"></div>');
  
        // desactivar a camada de inclinação do fundo
        if (layers[2]) {
          $('#layers-toggle2').attr('checked',false);
          layers[2].setMap(null);
          delete layers[2];
          layers[5].setMap(null);
          delete layers[5];
        }
  
        // activar a camada da batimetria e as ilhas
        layers[1] = new google.maps.GroundOverlay("http://www.monicet.net/js/gmaps_kml/Composite_1.png", 
        new google.maps.LatLngBounds(
            new google.maps.LatLng(35.888348, -32.964967),
            new google.maps.LatLng(40.378169, -22.935368)
            ));    
        layers[5] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/islandskml.kml');
        layers[1].setMap(map);
        layers[5].setMap(map);
                
        // mostrar a legenda
        $('#layers-legend-bathymetry').attr('style', 'display: block;');
        $('#layers-legend-slope').attr('style', 'display: none;');
        
      }else{
        layers[5].setMap(null);
        delete layers[5];
        layers[1].setMap(null);
        delete layers[1];
        $('#layers-legend-bathymetry').attr('style', 'display: none;');
        
      }
      
      window.setTimeout(function() {
        $('#loading').remove();
      }, 6000);
      
    });
    
    
    $('#layers-toggle2').click(function(){
      
      if ($('#layers-toggle2:checked').val() !== undefined) {
        
        $('#layers-toggle-div2').append('<div id="loading"></div>');
  
        // desactivar a camada de batimetria
        if (layers[1]) {
          $('#layers-toggle1').attr('checked',false);
          layers[1].setMap(null);
          delete layers[1];
          layers[5].setMap(null);
          delete layers[5];
        }
  
        // activar a camada de inclinação do fundo e as ilhas
        layers[2] = new google.maps.GroundOverlay("http://www.monicet.net/js/gmaps_kml/Slope.png", 
        new google.maps.LatLngBounds(
            new google.maps.LatLng(35.888348, -32.964967),
            new google.maps.LatLng(40.378169, -22.935368)
            ));
        layers[5] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/islandskml.kml');
        layers[2].setMap(map);
        layers[5].setMap(map);
        
        // mostrar a legenda
        $('#layers-legend-slope').attr('style', 'display: block;');
        $('#layers-legend-bathymetry').attr('style', 'display: none;');
        
      }else{
        layers[5].setMap(null);
        delete layers[5];
        layers[2].setMap(null);
        delete layers[2];
        $('#layers-legend-slope').attr('style', 'display: none;');
      }
      
      window.setTimeout(function() {
        $('#loading').remove();
      }, 6000);
      
    });
    
    $('#layers-toggle3').click(function(){
      
      if ($('#layers-toggle3:checked').val() !== undefined) {
        
        $('#layers-toggle-div3').append('<div id="loading"></div>');
        
        layers[3] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/linhas250m.kmz');
        
        layers[3].setMap(map);
        
      }else{
        layers[3].setMap(null);
        delete layers[3];
      }
      
      window.setTimeout(function() {
        $('#loading').remove();
      }, 6000);
      
    });
    
    
    $('#layers-toggle4').click(function(){
      
      if ($('#layers-toggle4:checked').val() !== undefined) {
        
        $('#layers-toggle-div4').append('<div id="loading"></div>');
        
        layers[4] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/mainlines.kml');
        
        layers[4].setMap(map);
        
      }else{
        layers[4].setMap(null);
        delete layers[4];
      }
      
      window.setTimeout(function() {
        $('#loading').remove();
      }, 6000);
      
    });
    
    
    $('#island').change(function(){
      centerMapOnIsland($(this).val());
    });
    
  }
  
  function centerMapOnIsland(island){
    if (island == 'smiguel') {
      map.setOptions({center: new google.maps.LatLng(37.772886,-25.486908)});
    }
    else if (island == 'smaria') {
      map.setOptions({center: new google.maps.LatLng(36.980615,-25.114746)});
    }
    else if (island == 'terceira') {
      map.setOptions({center: new google.maps.LatLng(38.728376,-27.207642)});
    }
    else if (island == 'pico') {
      map.setOptions({center: new google.maps.LatLng(38.483695,-28.328247)});
    }
    else if (island == 'faial') {
      map.setOptions({center: new google.maps.LatLng(38.591114,-28.690796)});
    }
    else if (island == 'sjorge') {
      map.setOptions({center: new google.maps.LatLng(38.655488,-28.026123)});
    }
    else if (island == 'graciosa') {
      map.setOptions({center: new google.maps.LatLng(39.061849,-28.015137)});
    }
    else if (island == 'flores') {
      map.setOptions({center: new google.maps.LatLng(39.453161,-31.212158)});
    }
    else if (island == 'corvo') {
      map.setOptions({center: new google.maps.LatLng(39.702961,-31.103668)});
    }
  }
  
  function updateMapWithRequest(){
    // function to get url params
    $.urlParam = function(name){
        var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (!results){ 
            return null; 
        }
        return results[1] || 0;
    }
    
    var request_zoom = $.urlParam('zoom');
    var request_lat = $.urlParam('lat');
    var request_lng = $.urlParam('lng');
    
    //
    if( request_zoom != null && (request_zoom+"").match(/^\d+$/) ){
        map.setOptions({zoom: parseInt(request_zoom)});  
    }
    if( request_lat != null && request_lng != null ){
        map.setOptions({center: new google.maps.LatLng(request_lat,request_lng)});  
    }
  }
  
}
