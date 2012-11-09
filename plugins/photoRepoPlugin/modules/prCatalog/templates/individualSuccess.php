<div class="left-sidebar">
    <div class="left-sidebar-title"><h2><?php echo __('Observations Catalog', null, 'catalog'); ?></h2></div>
    <form id="catalog-filter-form" action="<?php echo url_for('@pr_catalog') ?>" method="get">
      <?php include_partial('prCatalog/filters', array(
          'pr_frontend_filter' => $pr_frontend_filter
      )); ?>
    </form>
</div>

<?php $bestPhoto = $individual->getBestObservationPhoto() ?>

<div class="right-content-individual">
    <div class="photo-page-container">
      <div class="photo_and_content">
        <div id="photo-img">
          <h2 class="catalog_h2"><?php echo $individual->getName(); ?></h2>
          <?php if(file_exists(sfConfig::get('sf_upload_dir').'/pr_repo_final/'.$bestPhoto->getFileName()) ): ?>
            <a class="fancybox" rel="group" href="<?php echo url_for( '/uploads/pr_repo_final/'.$bestPhoto->getFileName() ) ?>">
              <img src="<?php echo url_for( '/uploads/pr_repo_final/'.$bestPhoto->getFileName() ) ?>" alt="" />
            </a>
          <?php endif; ?>
        </div>
          
        <div id="photo-content">
          <b>sdas:</b> sadgsfgsdf<br/>
          <b>sdas:</b> sadgsfgsdf<br/>
          <b>sdas:</b> sadgsfgsdf<br/>
        </div>
        
        <div id="photo-download">
          <a href="">Download</a>
        </div>
      </div>
      
      <script type="text/javascript">
        var gmap_items = {};
        
        <?php foreach( $individual->getSightings() as $key => $sighting ):  ?>
          <?php $record = $sighting->getRecord() ?>
          <?php $latitude = $record->getLatitude() ?>
          <?php $longitude = $record->getLongitude() ?>
            
          <?php $coordinatesTitle = __('Coordinates', null, 'catalog') ?>
          <?php $dateTitle = __('Date', null, 'catalog') ?>
          <?php $timeTitle = __('Time', null, 'catalog') ?>
            
          <?php if( strlen($latitude) && strlen($longitude) ): ?>
            <?php $descStr = sprintf("<b>%s: </b>%s|%s<br/><b>%s: </b>%s<br/><b>%s: </b>%s", $coordinatesTitle, $latitude, $longitude * (-1), $dateTitle, $record->getGeneralInfo()->getDate('Y-m-d'), $timeTitle, $record->getTime('H:i')) ?>
            gmap_items["<?php echo $key ?>"] = {
                "latitude": <?php echo $latitude ?>,
                "longitude": <?php echo $longitude * (-1) ?>,
                "desc": '<div class="popup-content-gmaps"><?php echo $descStr ?></div>',
                "auto_show_info": false
            };
          <?php endif; ?>
        <?php endforeach; ?>
        
        
        $(document).ready(function() {
          // google maps initialization
          initialize("map", gmap_items, 6 );
          //carousel initialization
          $('#carousel_individual').liquidcarousel({height:90, duration:800, hidearrows: false});
        });
      </script>
      
      <div class="map">
        <h2 class="catalog_h2"><?php echo __('Observations map', null, 'catalog'); ?></h2>
        <div id="map"></div>
      </div>
      <div class="carousel">
        <h2 class="catalog_h2"><?php echo __('Individual album', null, 'catalog'); ?></h2>
        <div id="carousel_individual" class="liquid carousel_div" >
          <span class="previous"></span>
          <div class="wrapper">
            <ul>
              <?php foreach( $individual->getObservationPhotos() as $OBPhoto ): ?>
                <li>
                  <a class="fancybox" rel="gallery1" href="<?php echo url_for( '/uploads/pr_repo_final/'.$OBPhoto->getFileName() ) ?>" title="<?php echo $OBPhoto->getCode(); ?>">
                    <img width="90" id="photo_<?php $OBPhoto->getId() ?>" src="<?php echo url_for( '/uploads/pr_repo_final/tn_165x150_'.$OBPhoto->getFileName() ) ?>" alt="<?php echo $OBPhoto->getFileName() ?>"/>
                  </a>
                  
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <span class="next"></span>
        </div>
      </div>
  </div>
</div>

