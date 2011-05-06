
var markers = [];

var datasets = [];

var layers = [];

var especiesActivas = [];

var uis = [];

var colors = [];

var zindexvalue = 0;

colors['Ba'] = 'b7b10b';
colors['Bb'] = '4f884f';
colors['Be'] = 'a6ffed';
colors['Bm'] = '737373';
colors['Bp'] = '232323';
colors['Cc'] = '61390e';
colors['Cm'] = '909a70';
colors['Dc'] = '9a8670';
colors['Dd'] = '9cff32';
colors['Em'] = '9886ae';
colors['Gg'] = '117566';
colors['Gma'] = 'ffe432';
colors['Gme'] = 'e1e5c0';
colors['Ha'] = 'ff9494';
colors['Kb'] = 'c7c7cd';
colors['Lk'] = '00e4ff';
colors['Mb'] = '9805ff';
colors['Md'] = 'ffbedd';
colors['Mm'] = 'c1ffea';
colors['Mn'] = 'f4abff';
colors['Oo'] = '5fb9d3';
colors['Pc'] = '236375';
colors['Pm'] = '5fd3c1';
colors['Sb'] = 'ff8932';
colors['Sc'] = '0e7015';
colors['Sf'] = 'd01b52';
colors['Tt'] = 'ff3232';
colors['Zc'] = '0511ff';
colors['Zp'] = '90b3fb';




/*
 * Função que inicializa o mapa, os pontos, filtros, etc...
 * 
 * Valores para map_type: 'default' ou 'time'
 */
function initialize(map_type, env, scale1, scale2) {
  
  
  if(map_type == 'default'){
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
   * ao seleccionar a espécie, faz o processo de inserção no mapa
   */
  $("#pesquisa-select").change(function(){
    
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
    
    
    
    if(map_type == 'default'){
      
      $('#item-list').append('<div id="'+ui.item.code+'" class="specie" style="padding: 5px; margin-bottom: 5px;"><a class="icon"><img src="'+getCircleUrl(ui.item.code)+'"></a><div class="specie-name">'+ui.item.name+' ('+ui.item.code+') </div> <div id="specie-count-'+ui.item.code+'" class="specie-count">(0)</div><a href="#" id="show-hide-' + ui.item.code + '" class="show" type="button"></a><input id="show-hide-' + ui.item.code + '-val" type="hidden" value="' + ui.item.id + '" /><a href="#" class="remove" id="remove-' + ui.item.code + '"></a></div>');
      especiesActivas[ui.item.id] = true;
      
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
          if (confirm('Remover ' + $(this).attr('id').substr(7) + ' ?')) {
            removeSpecie($(this).attr('id').substr(7), markers[$("#show-hide-" + $(this).attr('id').substr(7) + "-val").val()], $("#show-hide-" + $(this).attr('id').substr(7) + "-val").val());
          }
        }
      );
    }else if(map_type == 'time'){
      
      $('#item-list').append('<div id="'+ui.item.code+'" class="specie" style="padding: 5px; margin-bottom: 5px;"><a class="icon"><img src="'+TimeMapTheme.getCircleUrl(ui.item.code)+'"></a><div class="specie-name">'+ui.item.name+' ('+ui.item.code+') </div> <div id="specie-count-'+ui.item.code+'" class="specie-count">(0)</div><a href="#" id="show-hide-' + ui.item.code + '" class="show" type="button"></a><input id="show-hide-' + ui.item.code + '-val" type="hidden" value="' + ui.item.id + '" /><a href="#" class="remove" id="remove-' + ui.item.code + '"></a></div>');
      especiesActivas[ui.item.id] = true;
      
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
          if (confirm('Remover ' + $(this).attr('id').substr(7) + ' ?')) {
            removeDS($(this).attr('id').substr(7), $("#show-hide-" + $(this).attr('id').substr(7) + "-val").val());
          }
        }
      );
    }
  }
  
  
  if(map_type == 'default'){
    /*
     * Cria o url para os pontos
     */
    /*function getCircleUrl(size, color, alpha) {
        return "http://chart.apis.google.com/" + 
            "chart?cht=it&chs=" + size + "x" + size + 
            "&chco=" + color + ",00000001,ffffffbb" +
            "&chf=bg,s,00000000|a,s,000000" + alpha + "&ext=.png";
    };*/
    
    function getCircleUrl(code) {
      return '/images/backend/icons_gmaps/'+code+'.png';
    }
    
  }else if(map_type == 'time'){
    /*
     * Cria o url para os pontos
     */
    /*TimeMapTheme.getCircleUrl = function(size, color, alpha) {
        return "http://chart.apis.google.com/" + 
            "chart?cht=it&chs=" + size + "x" + size + 
            "&chco=" + color + ",00000001,ffffffbb" +
            "&chf=bg,s,00000000|a,s,000000" + alpha + "&ext=.png";
    };*/
    TimeMapTheme.getCircleUrl = function(code) {
      return '/images/backend/icons_gmaps/'+code+'.png';
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
    var obj = $.parseJSON(data);
    markers[obj.id] = [];
    var count = 0;
    
    $.each(obj.spots, function(index, value){
    
      var lat = value.lat;
      var lon = -value.lon;
    
      var myLatlng = new google.maps.LatLng(lat,value.lon * -1);
      var image = getCircleUrl(ui.item.code);
      var marker = new google.maps.Marker({
          position: myLatlng,
          title: obj.code,
          icon: image
      });
      
      var contentString = 
      '<div class="title-w">'+obj.name+' - '+obj.code+'</div><br />'+
      '<div class="text-w">'+
        '<strong>Data:</strong> '+value.date+'&nbsp;&nbsp;&nbsp;<strong>Hora:</strong> '+value.time+'<br />'+
        //'<strong>Empresa:</strong> '+value.company_name+'<br />'+
        //'<strong>Saída:</strong> '+value.gi_code+'<br />'+
        // TODO condição para validar utilizador para ver os dados
        //'<strong>Nº Barcos:</strong> '+value.n_vessels+'&nbsp;&nbsp;&nbsp;<strong>Skipper:</strong> '+value.skipper+'&nbsp;&nbsp;&nbsp;<strong>Guia:</strong> '+value.guide+'<br />'+
        '<strong>Nº Barcos:</strong> '+value.n_vessels+'<br />'+
        '<strong>Total:</strong> '+value.total+'&nbsp;&nbsp;&nbsp;<strong>Adultos:</strong> '+value.adults+'&nbsp;&nbsp;&nbsp;<strong>Jovens:</strong> '+value.juveniles+'&nbsp;&nbsp;&nbsp;<strong>Crias:</strong> '+value.calves+'<br />'+
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
    var obj = $.parseJSON(data);
    
    datasets[obj.id] = tm.createDataset(
      obj.id,
      {
        title: obj.name
      }
    );
    
    var count = 0;
    
    $.each(obj.spots, function(index, value){
    
      var lat = value.lat;
      var lon = -value.lon;
      
      var contentString = 
      '<div class="title-w">'+obj.name+' - '+obj.code+'</div><br />'+
      '<div class="text-w">'+
        //'<strong>Empresa:</strong> '+value.company_name+'<br />'+
        //'<strong>Saída:</strong> '+value.gi_code+'<br />'+
        '<strong>Data:</strong> '+value.date+'&nbsp;&nbsp;&nbsp;<strong>Hora:</strong> '+value.time+'<br />'+
        // TODO condição para validar utilizador para ver os dados
        //'<strong>Nº Barcos:</strong> '+value.n_vessels+'&nbsp;&nbsp;&nbsp;<strong>Skipper:</strong> '+value.skipper+'&nbsp;&nbsp;&nbsp;<strong>Guia:</strong> '+value.guide+'<br />'+
        '<strong>Nº Barcos:</strong> '+value.n_vessels+'<br />'+
        '<strong>Total:</strong> '+value.total+'&nbsp;&nbsp;&nbsp;<strong>Adultos:</strong> '+value.adults+'&nbsp;&nbsp;&nbsp;<strong>Jovens:</strong> '+value.juveniles+'&nbsp;&nbsp;&nbsp;<strong>Crias:</strong> '+value.calves+'<br />'+
        '<strong>Latitude:</strong> '+value.lat+'&nbsp;&nbsp;&nbsp;<strong>Longitude:</strong> '+value.lon+'<br />'+
      '</div>';
      
      TimeMap.themes['theme1'] = TimeMapTheme.createCircleTheme({ color : colors[obj.code], eventColor : '#'+colors[obj.code], code : obj.code });
      
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
        datasets[ui.item.id].clear();
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
          visibility_id: $('#visibility').val()
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
  
  
  $('#layers-toggle1').click(function(){
    
    if ($('#layers-toggle1:checked').val() !== undefined) {
      
      $('#layers-toggle-div1').append('<div id="loading"></div>');
      
      layers[1] = new google.maps.GroundOverlay("http://www.monicet.net/js/gmaps_kml/Composite_1.png", 
      new google.maps.LatLngBounds(
          new google.maps.LatLng(35.888348, -32.964967),
          new google.maps.LatLng(40.378169, -22.935368)
          ));
          
      layers[5] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/islandskml.kml');
      
      layers[1].setMap(map);
      layers[5].setMap(map);
      
    }else{
      layers[5].setMap(null);
      delete layers[5];
      layers[1].setMap(null);
      delete layers[1];
      
    }
    
    window.setTimeout(function() {
      $('#loading').remove();
    }, 6000);
    
  });
  
  
  $('#layers-toggle2').click(function(){
    
    if ($('#layers-toggle2:checked').val() !== undefined) {
      
      $('#layers-toggle-div2').append('<div id="loading"></div>');
      
      layers[2] = new google.maps.GroundOverlay("http://www.monicet.net/js/gmaps_kml/Slope.png", 
      new google.maps.LatLngBounds(
          new google.maps.LatLng(35.888348, -32.964967),
          new google.maps.LatLng(40.378169, -22.935368)
          ));
      
      layers[5] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/islandskml.kml');
      
      layers[2].setMap(map);
      layers[5].setMap(map);
      
    }else{
      layers[5].setMap(null);
      delete layers[5];
      layers[2].setMap(null);
      delete layers[2];
    }
    
    window.setTimeout(function() {
      $('#loading').remove();
    }, 6000);
    
  });
  
  $('#layers-toggle3').click(function(){
    
    if ($('#layers-toggle3:checked').val() !== undefined) {
      
      $('#layers-toggle-div3').append('<div id="loading"></div>');
      
      layers[3] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/lines250m.kmz');
      
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
  
  
  $( "#tabs" ).tabs();

  
  
  
}