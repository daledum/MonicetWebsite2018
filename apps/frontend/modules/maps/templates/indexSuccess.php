<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<script type="text/javascript">
  /*
   * inicializa o javascript com a abertura da página
   */
  $(function(){
    initialize('default', 'frontend', 0, 1);
  });
</script>

<div class="map-container">
  <h2><?php echo __('Sightings Map') ?></h2>
  <div class="back-to-home"><a href="<?php echo url_for('@homepage') ?>">« <?php echo __('Back to Home') ?></a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;<b><a href="<?php echo url_for('@maps_time') ?>"><?php echo __('Change to Temporal Map'); ?></a></b></div>
  
  <!-- LANGUAGE -->
  <div id="_ul_languages" style="display: inline-block">
    <?php if($sf_user->getCulture() == "pt"): ?> 
       <div id="_div_en_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=pt', 'sf_culture=en', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
    <?php else: ?>
       <div id="_div_pt_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=en', 'sf_culture=pt', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
    <?php endif ?>
  </div>
  
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
      
      <!-- PERIOD -->
      <div class="filter-item">
          <label><?php echo __('Period') ?>:</label>
          <select id="year" class="filter-select" style="width: 85px;">
          <?php foreach(range($lastYear, $firstYear) as $year): ?>
              <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
          <?php endforeach; ?>
          </select>
          <select id="month" class="filter-select" style="width: 85px;">
              <option value="0">(<?php echo __('All'); ?>)</option>
              <?php foreach($months as $monthId => $monthName): ?>
              <option value="<?php echo $monthId; ?>"><?php echo __($monthName); ?></option>
              <?php endforeach; ?>
          </select>
      </div>
      
      <!-- TAB LIST -->
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1"><?php echo __('Species') ?></a></li>
          <li><a href="#tabs-2"><?php echo __('Layers') ?></a></li>
        </ul>
        
        <!-- SPECIES TAB -->
        <div id="tabs-1">
          <div class="tabs-content-container" style="position: relative;">
            <h2><?php echo __('Choose species') ?>:</h2>
            <select id="pesquisa-select">
              <option></option>
              <?php foreach($speciesList as $specie): ?>
                <option value="<?php echo $specie->getId() ?>"><?php echo $specie->getName() ?> - <?php echo $specie->getCode() ?></option>
              <?php endforeach; ?>
            </select>
            <div id="item-list"></div>
          </div>
        </div>
        
        <!-- LAYERS TAB -->
        <div id="tabs-2">
          <div class="tabs-content-container">
            
            <!-- LAYERS -->
            <h2><?php echo __('Layers') ?>:</h2>
            <div class="layers-item" id="layers-toggle-div1">
              <label><?php echo __('Bathymetry') ?>:</label><input id="layers-toggle1" class="layers-toggle" type="checkbox" value="layer1" name="layer1" />
            </div>
            <br />
            <div class="layers-item" id="layers-toggle-div2">
              <label><?php echo __('Slope') ?>:</label><input id="layers-toggle2" class="layers-toggle" type="checkbox" value="layer2" name="layer2" />
            </div>
            <br />
            <div class="layers-item" id="layers-toggle-div3">
              <label><?php echo __('Bathymetric Lines') ?> (250m):</label><input id="layers-toggle3" class="layers-toggle" type="checkbox" value="layer3" name="layer3" />
            </div>
            <br />
            <div class="layers-item" id="layers-toggle-div4">
              <label><?php echo __('Bathymetric Lines') ?> (1000m):</label><input id="layers-toggle4" class="layers-toggle" type="checkbox" value="layer4" name="layer4" />
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
  <!-- RIGHT SIDEBAR END -->
  
</div>