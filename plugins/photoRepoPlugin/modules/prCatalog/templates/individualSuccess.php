<div class="left-sidebar">
    <div class="left-sidebar-title"><h2><?php echo __('Observations Catalog'); ?></h2></div>
    <form id="catalog-filter-form" action="<?php echo url_for('@pr_catalog') ?>" method="get">
      <?php include_partial('prCatalog/filters', array(
          'pr_frontend_filter' => $pr_frontend_filter
      )); ?>
    </form>
</div>

<div class="right-content-individual">
    <div class="photo-page-container">
      <div class="photo_and_content">
          <?php if(file_exists(sfConfig::get('sf_upload_dir').'/pr_repo_final/tn_130x120_'.$individual->getBestObservationPhoto()->getFileName()) ): ?>
            <img width="200" height="200" src="<?php echo url_for( '/uploads/pr_repo_final/tn_130x120_'.$individual->getBestObservationPhoto()->getFileName() ) ?>" />
          <?php endif; ?>
          <div>
            <?php //print_r($individual->getSightings()); ?>
          </div>
      </div>
      
      <script type="text/javascript">
        var gmap_items = {};
        
        gmap_items["1"] =
            {
                "latitude": 37.747051,
                "longitude": -25.684314,
                "desc": "<b>teste",
                "auto_show_info": false
            };
        $(document).ready(function() {
          // google maps initialization
          initialize("map", gmap_items, 6 );
          //carousel initialization
          $('#carousel_individual').liquidcarousel({height:90, duration:800, hidearrows: false});
        });
      </script>
      
      <div class="map">
        <div id="map"></div>
      </div>
      <div class="carousel">
        <div id="carousel_individual" class="liquid carousel_div" >
          <span class="previous"></span>
          <div class="wrapper">
            <ul>
              <?php foreach( $individual->getObservationPhotos() as $OBPhoto ): ?>
                <li>
                  <img width="90" id="photo_<?php $OBPhoto->getId() ?>" src="<?php echo url_for( '/uploads/pr_repo_final/tn_165x150_'.$OBPhoto->getFileName() ) ?>" alt="<?php echo $OBPhoto->getFileName() ?>"/>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <span class="next"></span>
        </div>
      </div>
  </div>
</div>

