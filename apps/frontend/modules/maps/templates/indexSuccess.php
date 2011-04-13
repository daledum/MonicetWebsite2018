<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<script type="text/javascript">
  
  
  /*
   * inicializa o javascript com a abertura da página
   */
  $(function(){
    initialize('default', 'frontend');
  });
  
  
</script>

<div class="map-container">
  <h2><?php echo __('Sightings Map') ?></h2>
  <div class="back-to-home"><a href="<?php echo url_for('@homepage') ?>">« <?php echo __('Back to Home') ?></a></div>
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
        <h2><?php echo __('Filters') ?>:</h2>
        <div class="filter-item">
          <label><?php echo __('Association') ?>:</label>
            <select id="association" class="filter-select">
              <option></option>
              <?php foreach($associations as $association): ?>
                <option value="<?php echo $association->getId(); ?>"><?php echo $association->getDescription(); ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        <div class="filter-item">
          <label><?php echo __('Behaviour') ?>:</label>
            <select id="behaviour" class="filter-select">
              <option></option>
              <?php foreach($behaviours as $behaviour): ?>
                <option value="<?php echo $behaviour->getId(); ?>"><?php echo $behaviour->getDescription(); ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        <div class="filter-item">
          <label><?php echo __('Sea State') ?>:</label>
            <select id="sea-state" class="filter-select">
              <option></option>
              <?php foreach($sea_states as $sea_state): ?>
                <option value="<?php echo $sea_state->getId(); ?>"><?php echo $sea_state->getDescription(); ?></option>
              <?php endforeach; ?>
          </select>
        </div>
        <div class="filter-item">
          <label><?php echo __('Visibility') ?>:</label>
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