<?php use_helper('I18N', 'Date') ?>

<?php slot('gmap') ?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<script type="text/javascript">
  /*
   * inicializa o javascript com a abertura da página
   */
  $(function(){
    initGeneralInfo();
  });
</script>

<style type="text/css">

  /* BACKEND SPECIFIC STYLING */
  
  /* PAGE */
  
  html { height: 100%; }
  body { height: 100%; margin: 0px; padding: 0px; }
  #pg { height: 90%; }
  #bd { height: 600px; }
  .ct { height: 563px; }
  
  /* PAGE END */
  
  /* MAP */
  
  .map-container{
    text-align: center;
  }
  
  #map-container-div{
    height: 518px;
  }
  
  /* MAP END */
  
  /* RIGHT SIDE BAR */
  
  .right-side-bar{
    border-top: 1px solid #729158;
    border-bottom: 1px solid #729158;
    background-image: none;
    background-color: #ecffe7;
    height: 500px;
  }
  
  .filters-left{
    border-left: 1px solid #729158;
    border-top: 1px solid #729158;
    border-bottom: 1px solid #729158;
    background-image: none;
    background-color: #ecffe7;
  }
  
  .filters-right{
    border-right: 1px solid #729158;
    border-top: 1px solid #729158;
    border-bottom: 1px solid #729158;
    background-image: none;
    background-color: #ecffe7;
  }
  
  .right-container{
    width: 322px;
  }
  
  .filters-sides{
    height: 530px;
  }
  
  #sf_admin_container ul li a {
    background: none;
    padding-left: 10px;
  }
  
  /* RIGHT SIDE BAR END */
  
  #loading{
    background-image: url("/images/backend/icons_gmaps/loading_backend.gif");
  }
  
  
  /* TABS STYLES */

  .ui-tabs{
    padding: 0px;
  }
  
  .ui-state-active{
    background-image: none;
    background-color: #729158;
  }
  
  .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
      background: #729158;
      border: 1px solid #729158;
      color: #FFFFFF;
      font-weight: bold;
  }
  
  .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
      background: #FAFAF4;
      border: 1px solid #729158;
      color: #459E00;
      font-weight: bold;
  }
  
  .ui-tabs-panel{
    border-top: 1px solid #729158 !important;
  }
  
  /* TABS STYLES END */
  
</style>


<?php end_slot() ?>

<div id="sf_admin_container" class="map-container">
  <h1 style="text-align: left;">Mapa de Avistamentos</h1>
  
  <!-- MAP CONTAINER -->
  <div class="left-container">
    <div class="container-side container-left"></div>
    <div id="map-container-div" class="container-div">
      <div id="map_canvas"></div>
    </div>
    <div class="container-side container-right"></div>
  </div>
  
  <!-- RIGHT SIDEBAR -->
  <div class="right-container">
    <div class="filters-sides filters-left"></div>
    <div class="right-side-bar">
      
      <!-- TAB LIST -->
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Espécies</a></li>
          <li><a href="#tabs-3">Camadas</a></li>
        </ul>
        
        <!-- SPECIES TAB -->
        <div id="tabs-1">
          <div class="tabs-content-container" style="position: relative;">
            <div id="item-list"></div>
          </div>
        </div>
        
        <!-- LAYERS TAB -->
        <div id="tabs-3">
          <div class="tabs-content-container">
            
            <!-- LAYERS -->
            <h2>Camadas:</h2>
            <div class="layers-item" id="layers-toggle-div1">
              <label>Batimetria:</label><input id="layers-toggle1" class="layers-toggle" type="checkbox" value="layer1" name="layer1" />
            </div>
            <br />
            <div class="layers-item" id="layers-toggle-div2">
              <label>Inclinação do Fundo:</label><input id="layers-toggle2" class="layers-toggle" type="checkbox" value="layer2" name="layer2" />
            </div>
            <br />
            <div class="layers-item" id="layers-toggle-div3">
              <label>Linhas Batimétricas (250m):</label><input id="layers-toggle3" class="layers-toggle" type="checkbox" value="layer3" name="layer3" />
            </div>
            <br />
            <div class="layers-item" id="layers-toggle-div4">
              <label>Linhas Batimétricas (1000m):</label><input id="layers-toggle4" class="layers-toggle" type="checkbox" value="layer4" name="layer4" />
            </div>
            
            <!-- LEGENDS -->
            <div id="layers-legend-bathymetry">
              <?php echo image_tag('layers/bathlegend-'.$sf_user->getCulture().'.png', array('width' => '200')); ?>
            </div>
            <div id="layers-legend-slope">
              <?php echo image_tag('layers/slopelegend-'.$sf_user->getCulture().'.png', array('width' => '200')); ?>
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
    <div class="filters-sides filters-right"></div>
  </div>
</div>