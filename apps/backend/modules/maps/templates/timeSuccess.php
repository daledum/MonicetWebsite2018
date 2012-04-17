<?php use_helper('I18N', 'Date') ?>

<?php slot('gmap') ?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<script type="text/javascript">
  /*
   * inicializa o javascript com a abertura da página
   */
  $(function(){
    initialize('time', 'backend', $('#scale1').val(), $('#scale2').val(), null);
    
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

<style type="text/css">

  /* BACKEND SPECIFIC STYLING */
  
  /* PAGE */

  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #pg { height: 90%; }
  #bd { height: 600px; }
  .ct { height: 563px; }
  
  /* PAGE END */
  
  /* MAP */
  
  .map-container{
    text-align: center;
  }
  
  .left-side-bar{
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
  <h1 style="text-align: left;">Mapa Temporal de Avistamentos</h1>
  
  <!-- MAP CONTAINER -->
  <div class="left-container">
    <div class="map-sides map-left"></div>
    <div class="left-side-bar">
      <div id="timelinecontainer">
        <div id="timeline"></div>
      </div>
      <div id="mapcontainer">
        <div id="map"></div>
      </div>
    </div>
    <div class="map-sides map-right"></div>
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
      <div class="filter-item" style="border-top: 1px solid #4AA4B9; border-bottom: 1px solid #4AA4B9;">
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
          <li><a href="#tabs-1">Espécies</a></li>
          <li><a href="#tabs-2">Filtros</a></li>
          <li><a href="#tabs-3">Camadas</a></li>
        </ul>
        
        <!-- SPECIES TAB -->
        <div id="tabs-1">
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
        
        <!-- FILTERS TAB -->
        <div id="tabs-2">
          <div class="tabs-content-container">
            <h2>Filtros:</h2>
            <?php if($sf_user->isSuperAdmin()): ?>
              <div class="filter-item">
              <label>Empresa:</label>
              <select id="company" class="filter-select">
                <option></option>
                  <?php foreach($companies as $company): ?>
                    <option value="<?php echo $company->getId(); ?>"><?php echo $company->getName(); ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
            <?php else: ?>
              <div class="filter-item">
              <label>Empresa:</label>
              <select id="company" class="filter-select">
                <option>(Todas)</option>
                <option value="<?php echo $user_company->getId() ?>"><?php echo $user_company->getName() ?></option>
              </select>
              </div>
            <?php endif; ?>
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
              <label>Estado do mar:</label>
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
            <div class="filter-item">
              <label>Validação:</label>
              <select id="valid" class="filter-select">
                <option value="-1" selected="selected">Ambas</option>
                <option value="0">Não Válidas</option>
                <option value="1">Válidas</option>
              </select>
            </div>
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
