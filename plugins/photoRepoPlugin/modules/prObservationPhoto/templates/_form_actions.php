<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_pendent_photos_list') ?>">Foto. p/ processar</a></li>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo?do=clean') ?>">Foto. p/ analisar</a></li>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo?template=catalog&do=clean') ?>">Catálogo</a></li>
  <li class="sf_admin_action_showmap"><a onclick="initialize()">Ver em Mapa</a></li>

  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  
</ul>

<?php $OBPhoto = $form->getObject() ?>
<?php $status = $form->getObject()->getStatus() ?>

<?php if( !$OBPhoto->isNew() ): ?>
  <ul class="sf_admin_actions">
    
     <?php
          $deleteBestPhotoMessage = '';
          
          if( $OBPhoto->getIsBest() ){
            if( $OBPhoto->getIndividual() ){
              if( $OBPhoto->getIndividual()->countObservationPhotos() > 2 ){
                $deleteBestPhotoMessage = 'The photograph you are deleting is the best photo of the individual - which now has more than 2 photos. One of them will be randomly chosen as its best photo. You will be redirected to the page of the individual to choose a new best photo. ';
              }
            }
          }

         echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => $deleteBestPhotoMessage.'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',));
    ?>

    <?php if($OBPhoto->isCharacterizable()): ?>
      <li class="sf_admin_action_edit"><?php echo link_to('Caracterizar', '@pr_observation_photo_characterize?id='.$OBPhoto->getId() ) ?></li>
    <?php endif; ?>
      
    <?php if( $OBPhoto->isIdentifyable() ): ?>
      <li class="sf_admin_action_pesquisa"><a href="<?php echo url_for('@pr_observation_photo_identify?id='.$OBPhoto->getId()) ?>">Identificar</a></li>
    <?php endif; ?>
    
    <?php /* ?>  
    <?php $sessionUser = $sf_user->getGuardUser() ?> 
    <?php if(in_array($OBPhoto->getStatus(), array(ObservationPhoto::FA_SIGLA)) && $OBPhoto->getLastEditedBy() != $sessionUser->getId() ): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_validate?id='.$OBPhoto->getId()) ?>">Validar</a></li>
    <?php endif; ?>
    <?php */ ?>  
      
    <li class="sf_admin_action_show"><a href="<?php echo url_for('@pr_observation_photo_show?id='.$OBPhoto->getId()) ?>">Visualizar</a></li>
  </ul>
<?php endif; ?>

<script>
function initialize() {
 if( $("#observation_photo_latitude").val() && $("#observation_photo_longitude").val() ){
  var myLatlng = new google.maps.LatLng($("#observation_photo_latitude").val(),$("#observation_photo_longitude").val() );
  var mapOptions = {
    zoom: 8,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('centered_map'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'This photo was taken here'
  });
 }
}
</script>