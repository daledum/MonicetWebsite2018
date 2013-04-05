<?php 
  $urlArgs = array(
      'specie_id' => isset($formSubmitedValues['specie_id'])? $formSubmitedValues['specie_id']: '',
      'island' => isset($formSubmitedValues['island'])? $formSubmitedValues['island']: '',
      'photographer_id' => isset($formSubmitedValues['photographer_id'])? $formSubmitedValues['photographer_id']: '',
      'company_id' => isset($formSubmitedValues['company_id'])? $formSubmitedValues['company_id']: '',
      'photo_date' => array(
          'from' => isset($formSubmitedValues['photo_date']['from'])? $formSubmitedValues['photo_date']['from']: '',
          'to' => isset($formSubmitedValues['photo_date']['to'])? $formSubmitedValues['photo_date']['to']: ''
      )
  );
  $urlArgsStr = '';
  foreach ($urlArgs as $key => $value) {
    $urlArgsStr .= '&catalog_filter['.$key.']='.$value;
    if( $key == 'photo_date') {
      $urlArgsStr .= '&catalog_filter['.$key.'][from]='.$value['from'];
      $urlArgsStr .= '&catalog_filter['.$key.'][to]='.$value['to'];
    }
  }
?>

<div class="left-sidebar">
    <div class="left-sidebar-title"><h2><?php echo __('Observations Catalog', null, 'catalog'); ?></h2></div>
    <form id="catalog-filter-form" action="<?php echo url_for('@pr_catalog') ?>" method="get">
      <?php include_partial('prCatalog/filters', array(
          'pr_frontend_filter' => $pr_frontend_filter,
          'filter_stats' => $filter_stats
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
            <a class="fancybox" rel="group" href="<?php echo url_for( '/uploads/pr_repo_final/'.$bestPhoto->getFileName() ) ?>" title="<?php echo $individual->getName() ?>">
              <img src="<?php echo url_for( '/uploads/pr_repo_final/'.$bestPhoto->getFileName() ) ?>" alt="" />
            </a>
          <?php endif; ?>
        </div>
          
        <div id="photo-content">
          <?php $bestPhoto = $individual->getBestObservationPhoto() ?>
          <?php if( $specie = $individual->getSpecie() ): ?>
            <?php $spStr = $specie->getCode().' - '. $specie->getName().' - '.$specie->getScientificName(); ?>
            <b><?php echo __('Specie', null, 'catalog') ?>:</b> <?php echo $spStr ?><br/>
          <?php endif; ?>
          
          <?php if( $gender = $bestPhoto->getGender() ): ?>
            <b><?php echo __('Gender', null, 'catalog') ?>:</b> <?php echo ($gender == 'M')? __('Male', null, 'catalog'): __('Female', null, 'catalog')?><br/>
          <?php endif; ?>
          
          <?php if( $age_group = $bestPhoto->getAgeGroup() ): ?>
            <b><?php echo __('Age group', null, 'catalog') ?>:</b> <?php echo __(age_group::getValueForSigla($age_group), null, 'catalog') ?><br/>
          <?php endif; ?>
          
          <?php //General Infos ?>
          <?php //$lastTenGIs = $individual->getLastTenGIDates() ?> 
          <?php $lastTenObservationDates = $individual->getLastTenObservationDates() ?> 
          <?php //echo $lastTenObservationDates ?>
          <?php //$date_parts = explode(',', $lastTenObservationDates); ?>
          <?php $num_parts = (count($lastTenObservationDates) > 10)? 10: count($lastTenObservationDates); ?>
          <?php if( $num_parts ): ?>
            <b><?php echo __('Sightings', null, 'catalog') ?> (<?php echo $num_parts ?>):</b> <?php //echo $lastTenObservationDates ?>
            <?php $resultStr = ''; ?>
            <?php foreach($lastTenObservationDates as $cont => $df): ?>
              <?php $resultStr .= ', '.$df['date']; ?>
              <?php if($df['num_photos'] > 1): ?>
                <?php $resultStr .= ' <b>('.$df['num_photos'].')</b>'; ?>
              <?php endif; ?>
              <?php if($cont == 9): ?>
                <?php $resultStr .= ', ...'; ?>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php echo substr($resultStr, 2) ?>
            <br/>
          <?php endif; ?>
          
          <?php if(strlen($individual->getNotes()) ): ?>
            <b><?php echo __('Notes', null, 'catalog') ?>:</b> <?php echo $individual->getNotes() ?><br/>
          <?php endif; ?>
        </div>
        
        <div id="photo-download">
          <?php echo link_to('Download','@pr_catalog_export_individual?name='.$individual->getName()) ?>
        </div>
      </div>
      
      <script type="text/javascript">
        var gmap_items = {};
        
        <?php $coordinatesTitle = __('Coordinates', null, 'catalog') ?>
        <?php $dateTitle = __('Date', null, 'catalog') ?>
        <?php $timeTitle = __('Time', null, 'catalog') ?>
          
        <?php foreach( $individual->getObservationPhotos() as $OBPhoto ): ?>
          <?php if( $OBPhoto->getStatus(ObservationPhoto::V_SIGLA)): ?>
            <?php if( strlen($OBPhoto->getLatitude()) && strlen($OBPhoto->getLongitude())): ?>
              <?php $latitude = $OBPhoto->getLatitude() ?>
              <?php $longitude = $OBPhoto->getLongitude() ?>
              <?php $descStr = sprintf("<b>%s</b><br/><b>%s: </b>%s|%s<br/><b>%s: </b>%s<br/><b>%s: </b>%s",$OBPhoto->getCode() , $coordinatesTitle, $latitude, $longitude, $dateTitle, $OBPhoto->getPhotoDate('Y-m-d'), $timeTitle, $OBPhoto->getPhotoTime('H:i')) ?>
                
                gmap_items["<?php echo $OBPhoto->getId() ?>"] = {
                    "latitude": <?php echo $latitude  ?>,
                    "longitude": <?php echo $longitude ?>,
                    "desc": '<div class="popup-content-gmaps"><?php echo $descStr ?></div>',
                    "auto_show_info": false
                };
            <?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
        
        
        $(document).ready(function() {
          // google maps initialization
          initialize("map", gmap_items, 6);
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
                <?php if( $OBPhoto->getStatus(ObservationPhoto::V_SIGLA)): ?>
                  <?php $author = sprintf("%s", $OBPhoto->getPhotographerId()? $OBPhoto->getPhotographer()->getName().' -': '') ?>
                  <?php $photoDate = sprintf("%s", $OBPhoto->getPhotoDate()? $OBPhoto->getPhotoDate('Y/m/d').' -': '') ?>
                  <?php $photoTime = sprintf("%s", $OBPhoto->getPhotoTime()? $OBPhoto->getPhotoTime('H:i').' -': '') ?>
                  <?php $photoCompany = sprintf("%s", $OBPhoto->getCompanyId()? $OBPhoto->getCompany()->getName().' -': '') ?>
                  <?php $photoIsland = sprintf("%s", $OBPhoto->getIsland()? island::getDescriptionBySigla($OBPhoto->getIsland()): '') ?>
                  <?php $photoCaption = sprintf("%s - %s %s %s %s %s", $OBPhoto->getCode(), $author, $photoDate, $photoTime, $photoCompany, $photoIsland ) ?>
                  <li>
                    <a class="fancybox" rel="gallery1" href="<?php echo url_for( '/uploads/pr_repo_final/'.$OBPhoto->getFileName() ) ?>" title="<?php echo $photoCaption; ?>">
                      <img width="90" id="photo_<?php $OBPhoto->getId() ?>" src="<?php echo url_for( '/uploads/pr_repo_final/tn_165x150_'.$OBPhoto->getFileName() ) ?>" alt="<?php echo $OBPhoto->getFileName() ?>"/>
                    </a>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
          <span class="next"></span>
        </div>
      </div>
  </div>
</div>

