<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<script type="text/javascript">
  
  
  /*
   * inicializa o javascript com a abertura da página
   */
  $(function(){
    initialize('default');
  });
  
  
</script>

<style>
.filter-item label {
    display: inline-block;
    font-size: 11px;
    margin-top: 4px;
    width: 109px !important;
}

.bottom-container h2{
    margin-bottom: 0px;
}

#layers-toggle{
  border: none;
  padding: 0px;
  margin: 0px;
  width: 10px;
}

.map-container{
  height: 92%;
}

#map-container-div{
  margin-left: auto;
  margin-right: auto;
  height:100%;
  width: 94%;
  display:inline-block;
  float: left;
  padding-bottom: 15px;
  background-image: url("/images/frontend/background-map.png");
  background-repeat: repeat-x;
}

#map_canvas{
  width: 100% !important;
  margin: 15px 0px;
  height: 97%;
}

.right-side-bar{
  margin-left: auto;
  margin-right: auto;
  display: inline-block;
  margin: 0px !important;
  padding: 15px 0px !important;
  width: 300px;
  float: left;
  height: 97%;
  background-color: transparent;
  background-image: url("/images/frontend/filters-background.png");
  background-repeat: repeat-x;
}

.map-sides{
  margin-left: auto;
  margin-right: auto;
  width: 15px;
  display: inline-block;
  float: left;
  height: 532px;
}

.map-left{
  background-image: url("/images/frontend/map-left.png");
}

.map-right{
  background-image: url("/images/frontend/map-right.png");
}

.filters-sides{
  margin-left: auto;
  margin-right: auto;
  width: 10px;
  display: inline-block;
  float: left;
  height: 532px;
}

.filters-left{
  background-image: url("/images/frontend/filters-left.png");
}

.filters-right{
  background-image: url("/images/frontend/filters-right.png");
}

.left-container{
  display: inline-block;
  margin: auto;
  width: 60%;
  height: 100%;
}

.right-container{
  display: inline-block;
  margin: auto;
  width: 320px;
  height: 100%;
}



</style>

<div class="map-container">
  <div id="_ul_languages" style="display: inline-block">
    <?php if($sf_user->getCulture() == "pt"): ?> 
       <div id="_div_en_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=pt', 'sf_culture=en', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
    <?php else: ?>
       <div id="_div_pt_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=en', 'sf_culture=pt', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
    <?php endif ?>
  </div>
  <div class="left-container">
    <div class="map-sides map-left"></div>
    <div id="map-container-div">
      <div id="map_canvas"></div>
    </div>
    <div class="map-sides map-right"></div>
  </div>
  <div class="right-container">
    <div class="filters-sides filters-left"></div>
    <div class="right-side-bar">
      <div class="top-container" style="position: relative;">
        <select id="pesquisa-select">
          <option></option>
          <?php foreach($speciesList as $specie): ?>
            <option value="<?php echo $specie->getId() ?>"><?php echo $specie->getCode() ?> - <?php echo $specie->getName() ?></option>
          <?php endforeach; ?>
        </select>
        <div id="item-list"></div>
        <div class="filter-item" id="layers-toggle-div" style="position: absolute; bottom: 5px; left: 5px;">
          <label>Layers:</label>
          <input id="layers-toggle" type="checkbox" value="layer" name="layer" />
        </div>
      </div>
      <div class="bottom-container">
        <h2>Filtros:</h2>
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
    <div class="filters-sides filters-right"></div>
  </div>
</div>