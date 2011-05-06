<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<script type="text/javascript">
  /*
   * inicializa o javascript com a abertura da página
   */
  $(function() {
    initialize('time','frontend', $('#scale1').val(), $('#scale2').val());

    $("#scale2").change(function() {
       var sc2 = parseInt($(this).val());
       $("#scale1").val(sc2 - 1);
       $("#scale1 option").each(function() {
         if (parseInt($(this).val()) >= sc2) {
             $(this).hide();
         } else {
             $(this).show();
         }
       });
    });
    
  });
</script>

<div id="sf_admin_container" class="map-container">

  <h2><?php echo __('Sightings Temporal Map') ?></h2>
  <div class="back-to-home"><a href="<?php echo url_for('@homepage') ?>">« <?php echo __('Back to Home') ?></a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;<b><a href="<?php echo url_for('@maps') ?>"><?php echo __('Change to Normal Map'); ?></a></b></div>
  
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
    <div class="left-side-bar">
      <div id="timelinecontainer">
        <div id="timeline"></div>
      </div>
      <div id="mapcontainer">
        <div id="map"></div>
      </div>
    </div>
    <div class="container-side container-right"></div>
  </div>
  
  <!-- RIGHT SIDEBAR -->
  <div class="right-container">
    <div class="filters-sides filters-left"></div>
    <div class="right-side-bar">
    
      <!-- TIME MAP SCALE -->
      <div class="filter-item">
        <label style="width:140px !important;"><?php echo __('Time Map Scale') ?>:</label>
        <form method="post" action="<?php echo url_for('@maps_time') ?>">
          <select id="scale2" name="scale2" class="filter-select" style="width: 85px;">
            <option value="4"<?php if($sf_request->getParameter('scale2') == 4) echo ' selected="true"'; ?>><?php echo __('Year'); ?></option>
            <option value="3"<?php if($sf_request->getParameter('scale2') == 3) echo ' selected="true"'; ?>><?php echo __('Month'); ?></option>            
            <option value="2"<?php if($sf_request->getParameter('scale2') == 2) echo ' selected="true"'; ?>><?php echo __('Week'); ?></option>
          </select>
          &nbsp;-&nbsp;
          <select id="scale1" name="scale1" class="filter-select" style="width: 85px;">
            <option value="3"<?php if($sf_request->getParameter('scale1') == 3) echo ' selected="true"'; ?>><?php echo __('Month'); ?></option>
            <option value="2"<?php if($sf_request->getParameter('scale1') == 2) echo ' selected="true"'; ?>><?php echo __('Week'); ?></option>
            <option value="1"<?php if($sf_request->getParameter('scale1') == 1) echo ' selected="true"'; ?>><?php echo __('Day'); ?></option>
          </select>
          <input type="submit" value="<?php echo __('Change'); ?>" style="width: 80px;" />
        </form>
        <input type="hidden" id="sc1" value="<?php echo ($sf_request->getParameter('scale1'))? $sf_request->getParameter('scale1') : 1 ; ?>">
        <input type="hidden" id="sc2" value="<?php echo ($sf_request->getParameter('scale2'))? $sf_request->getParameter('scale2') : 3 ; ?>">
      </div>
      
      <!-- PERIOD -->
      <div class="filter-item">
          <label><?php echo __('Period') ?>:</label>
          <select id="year" class="filter-select">
          <?php foreach(range($lastYear, $firstYear) as $year): ?>
              <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
          <?php endforeach; ?>
          </select>
          <select id="month" class="filter-select">
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
            <br />
            
            <!-- LEGENDS -->
            <div id="layers-legend-bathymetry">
              <?php echo image_tag('charts/bathlegend-'.$sf_user->getCulture().'.png', array('width' => '200')); ?>
            </div>
            <div id="layers-legend-slope">
              <?php echo image_tag('charts/slopelegend-'.$sf_user->getCulture().'.png', array('width' => '200')); ?>
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
    <div class="filters-sides filters-right"></div>
  </div>
</div>
