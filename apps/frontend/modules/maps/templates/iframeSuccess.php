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
  
  .filter-item {
    width: 100%
  }
</style>
<div id="sf_admin_container" class="map-container">
  <div id="tabs">
    
    <ul>
      <li><a href="#tabs-1">Mapa</a></li>
      <li><a href="#tabs-2">Espécies</a></li>
      <li><a href="#tabs-3">Filtros</a></li>
      <li><a href="#tabs-4">Camadas</a></li>
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
    
    <div id="tabs-3" class="right-container">
      <div class="right-side-bar">
        <div class="tabs-content-container">
          <h2><?php echo __('Period') ?>:</h2>
          <div class="filter-item">
            <label>Ano:</label>
            <select id="year" name="year" class="filter-select" style="width: 85px;">
              <?php foreach(range($lastYear, $firstYear) as $year): ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filter-item">
            <label>Mês</label>
            <select id="month" name="month" class="filter-select" style="width: 85px;">
                <option value="0">(<?php echo __('All'); ?>)</option>
              <?php foreach($months as $monthId => $monthName): ?>
                <option value="<?php echo $monthId; ?>"><?php echo __($monthName); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <h2>Filtros:</h2>
          <div class="filter-item">
            <label>Associação:</label>
            <select id="association" name="association" class="filter-select">
              <option></option>
              <?php foreach($associations as $association): ?>
                <option value="<?php echo $association->getId(); ?>"><?php echo $association->getDescription(); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filter-item">
            <label>Comportamento:</label>
            <select id="behaviour" name="behaviour" class="filter-select">
              <option></option>
              <?php foreach($behaviours as $behaviour): ?>
                <option value="<?php echo $behaviour->getId(); ?>"><?php echo $behaviour->getDescription(); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filter-item">
            <label>Estado do mar:</label>
            <select id="sea-state" name="sea-state" class="filter-select">
              <option></option>
              <?php foreach($sea_states as $sea_state): ?>
                <option value="<?php echo $sea_state->getId(); ?>"><?php echo $sea_state->getDescription(); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filter-item">
            <label>Visibilidade:</label>
            <select id="visibility" name="visibility" class="filter-select">
              <option></option>
              <?php foreach($visibilities as $visibility): ?>
                <option value="<?php echo $visibility->getId(); ?>"><?php echo $visibility->getDescription(); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filter-item">
            <label>Validação:</label>
            <select id="valid" name="valid" class="filter-select">
              <option value="-1" selected="selected">Ambas</option>
              <option value="0">Não Válidas</option>
              <option value="1">Válidas</option>
            </select>
          </div>
          <div class="filter-item">
            <label>Focar na ilha:</label>
            <select id="island" name="island">
                <?php foreach($islands as $text => $value): ?>
                  <option value="<?php echo $value; ?>"><?php echo $text; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
    </div>
    
    <div id="tabs-4" class="right-container">
      <div class="right-side-bar">
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
</div>
<input type="hidden" id="company" value="<?php print $company; ?>" />