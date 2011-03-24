
var markers = [];

var datasets = [];

var layers = [];

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



/*
 * Função que inicializa o mapa, os pontos, filtros, etc...
 * 
 * Valores para map_type: 'default' ou 'time'
 */
function initialize(map_type) {
  
  
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
          Timeline.DateTime.DAY,
          Timeline.DateTime.MONTH
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
  
    $('#item-list').append('<div id="loading" style="padding-left: 10px; padding-top: 5px; margin-bottom: 5px;"><img src="/images/backend/icons_gmaps/loading.gif"></div>');
    
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
              visibility_id: $('#visibility').val()
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
      
      $('#item-list').append('<div id="'+ui.item.code+'" class="specie" style="padding: 5px; margin-bottom: 5px;"><a class="icon"><img src="'+getCircleUrl(10,colors[ui.item.code],'bb')+'"></a><div class="specie-name">'+ui.item.name+' ('+ui.item.code+') </div> <div id="specie-count-'+ui.item.code+'" class="specie-count">(0)</div><a href="#" id="show-hide-' + ui.item.code + '" class="show" type="button"></a><input id="show-hide-' + ui.item.code + '-val" type="hidden" value="' + ui.item.id + '" /><a href="#" class="remove" id="remove-' + ui.item.code + '"></a></div>');
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
      
      $('#item-list').append('<div id="'+ui.item.code+'" class="specie" style="padding: 5px; margin-bottom: 5px;"><a class="icon"><img src="'+TimeMapTheme.getCircleUrl(10,colors[ui.item.code],'bb')+'"></a><div class="specie-name">'+ui.item.name+' ('+ui.item.code+') </div> <div id="specie-count-'+ui.item.code+'" class="specie-count">(0)</div><a href="#" id="show-hide-' + ui.item.code + '" class="show" type="button"></a><input id="show-hide-' + ui.item.code + '-val" type="hidden" value="' + ui.item.id + '" /><a href="#" class="remove" id="remove-' + ui.item.code + '"></a></div>');
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
    function getCircleUrl(size, color, alpha) {
        return "http://chart.apis.google.com/" + 
            "chart?cht=it&chs=" + size + "x" + size + 
            "&chco=" + color + ",00000001,ffffffbb" +
            "&chf=bg,s,00000000|a,s,000000" + alpha + "&ext=.png";
    };
  }else if(map_type == 'time'){
    /*
     * Cria o url para os pontos
     */
    TimeMapTheme.getCircleUrl = function(size, color, alpha) {
        return "http://chart.apis.google.com/" + 
            "chart?cht=it&chs=" + size + "x" + size + 
            "&chco=" + color + ",00000001,ffffffbb" +
            "&chf=bg,s,00000000|a,s,000000" + alpha + "&ext=.png";
    };
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
            icon: TimeMapTheme.getCircleUrl(opts.size, opts.color, opts.alpha),
            iconShadow: null,
            iconShadowSize: [0,0],
            iconSize: [opts.size, opts.size],
            iconAnchor: [opts.size/2, opts.size/2],
            eventIcon: TimeMapTheme.getCircleUrl(opts.eventIconSize, opts.color, opts.eventAlpha),
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
        '<strong>Empresa:</strong> '+value.company_name+'<br />'+
        '<strong>Saída:</strong> '+value.gi_code+'<br />'+
        '<strong>Data:</strong> '+value.date+'&nbsp;&nbsp;&nbsp;<strong>Hora:</strong> '+value.time+'<br />'+
        // TODO condição para validar utilizador para ver os dados
        '<strong>Nº Barcos:</strong> '+value.n_vessels+'&nbsp;&nbsp;&nbsp;<strong>Skipper:</strong> '+value.skipper+'&nbsp;&nbsp;&nbsp;<strong>Guia:</strong> '+value.guide+'<br />'+
        '<strong>Total:</strong> '+value.total+'&nbsp;&nbsp;&nbsp;<strong>Adultos:</strong> '+value.adults+'&nbsp;&nbsp;&nbsp;<strong>Jovens:</strong> '+value.juveniles+'&nbsp;&nbsp;&nbsp;<strong>Crias:</strong> '+value.calves+'<br />'+
        '<strong>Latitude:</strong> '+value.lat+'&nbsp;&nbsp;&nbsp;<strong>Longitude:</strong> '+value.lon+'<br />'+
      '</div>';
      
      TimeMap.themes['theme1'] = TimeMapTheme.createCircleTheme({ color : colors[obj.code], eventColor : '#'+colors[obj.code] });
      
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
  
  
  $('#layers-toggle').click(function(){
    
    if ($('#layers-toggle:checked').val() !== undefined) {
      
      $('#layers-toggle-div').append('<div id="loading" style="padding-left: 10px; display: inline-block;"><img src="/images/backend/icons_gmaps/loading.gif"></div>');
      
      layers[0] = new google.maps.GroundOverlay("http://www.monicet.net/js/gmaps_kml/Composite.png", 
      new google.maps.LatLngBounds(
          new google.maps.LatLng(35.663833, -33.4665),
          new google.maps.LatLng(40.602833, -22.4335)
          ));
      layers[1] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/islands.kml');
      //layers[2] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/lines.kml');
      layers[3] = new google.maps.KmlLayer('http://www.monicet.net/js/gmaps_kml/mainlines.kml');
      
      layers[0].setMap(map);
      layers[1].setMap(map);
      //layers[2].setMap(map);
      layers[3].setMap(map);
      
      
      
    }else{
      layers[0].setMap(null);
      layers[1].setMap(null);
      //layers[2].setMap(null);
      layers[3].setMap(null);
      
      delete layers[0];
      delete layers[1];
      //delete layers[2];
      delete layers[3];
    }
    
    window.setTimeout(function() {
      $('#loading').remove();
    }, 6000);
    
  });
  
  
}