<script>
$(function(){
  initialize('default', 'frontend', 0, 1, null);
});  
</script>
<style type="text/css">
  .left-container {
    width: 100%;
    height: 100%;
  }
  
  .right-container {
    width: 100%;
    height: 100%;
  }
  
  .right-side-bar {
    width: 100%;
    height: 100%;
    background-image: none;
    background-color: #69c2ce;
    padding: 0px !important;
  }
  
  .container-div, .container-side {
    height: 100%;
    width: 100%;
    padding: 0px;
  }
  
  #map_canvas {
    margin: 0px;
    height: 100%;
  }
  
  .map-container {
    height: 100%;
  }
  
  #tabs {
    height: 100%;
  }
  
  .ui-tabs-panel {
    height: 90%;
  }
  
  .ui-tabs-nav {
    height: 9%;
  }
  
  .ui-corner-top {
    height: 100%;
  }
  
  .specie-name {
    width: auto;
  }
</style>
<div id="sf_admin_container" class="map-container">
  
  <div id="tabs">
    
    <ul>
      <li><a href="#tabs-1">Mapa</a></li>
      <li><a href="#tabs-2">Espécies</a></li>
    </ul>
    
    
    <div id="tabs-1" class="left-container">
      <div id="map-container-div" class="container-div">
        <div id="map_canvas"></div>
      </div>
    </div>
    
    <div id="tabs-2" class="right-container">
      <div class="right-side-bar">
    
        <div class="tabs-content-container" style="position: relative;">
          <h2>Escolha uma espécie:</h2>
          <select id="pesquisa-select">
            <option></option>
            <?php foreach($speciesList as $specie): ?>
              <option value="<?php echo $specie->getId() ?>"><?php echo $specie->getName() ?> - <?php echo $specie->getCode() ?></option>
            <?php endforeach; ?>
          </select>
          <div id="item-list"></div>
        </div>
      </div>
    </div>
  
  </div>
  
</div>

<input type="radio" style="display: none;" id="chart-type" name="chart-type" value="<?php print $chart_type; ?>" checked="checked" />
<input type="hidden" id="year" value="<?php print $year; ?>" />
<input type="hidden" id="month" value="<?php print $month; ?>" />
<input type="hidden" id="company" value="<?php print $company; ?>" />
<input type="hidden" id="association" value="<?php print $association; ?>" />
<input type="hidden" id="behaviour" value="<?php print $behaviour; ?>" />
<input type="hidden" id="sea-state" value="<?php print $sea_state; ?>" />
<input type="hidden" id="visibility" value="<?php print $visibility; ?>" />
<input type="hidden" id="valid" value="<?php print $valid; ?>" />