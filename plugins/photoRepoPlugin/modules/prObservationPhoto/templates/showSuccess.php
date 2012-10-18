<?php use_helper('I18N') ?>
<?php include_partial('prObservationPhoto/assets') ?>


<div id="sf_admin_container">
  <h1><?php echo 'A vizualizar a fotografia "'.$observationPhoto->getCode().'"'; ?></h1>
  <div class="characterize_block" >
    <div class="sf_admin_content characterize_photo_container">
      <?php if($pattern): ?>
        <div id="pr_ob_photo_show_info">
          <b>Caracterização</b><br/>
          <?php echo $observationPhotoPart->getIsSmooth()? '&bullet;&nbsp;Lisa<br/>': '' ?>
          <?php echo $observationPhotoPart->getIsIrregular()? '&bullet;&nbsp;Irregular<br/>': '' ?>
          <?php if( $isTail): ?>
            <?php echo $observationPhotoPart->getIsCuttedPointLeft()? '&bullet;&nbsp;Ponta esquerda cortada<br/>': '' ?>
            <?php echo $observationPhotoPart->getIsCuttedPointRight()? '&bullet;&nbsp;Ponta direita cortada<br/>': '' ?>
          <?php else: ?>
            <?php echo $observationPhotoPart->getIsCuttedPoint()? '&bullet;&nbsp;Ponta cortada<br/>': '' ?>
          <?php endif; ?>
          <br/>
          <b>Marcas:</b><br/>
          <?php foreach( $relatedMarks as $mark ): ?>
            &bullet;&nbsp;<?php echo $mark ?><br/>
          <?php endforeach; ?>
          <?php if( !count($relatedMarks)): ?>
            Sem marcas adicionadas
          <?php endif; ?>
        </div>
      <?php endif; ?>
      
      <div class="characterize_photo_pattern">
        <img id="pattern-image" width="450" src="<?php echo url_for( '/uploads/pr_repo_final/'.$observationPhoto->getFileName() ) ?>" />
      </div>
      
      <?php /* ?>
      <div class="characterize_photo_pattern">
        <?php if($pattern && $patternImage): ?>
          <img id="pattern-image" width="450" src="<?php echo url_for( '/uploads/pr_patterns/'.$patternImage ) ?>" />
        <?php else: ?>
          <p>Padrão indisponível.</p>
        <?php endif; ?>
      </div>
      <?php*/ ?>
      
      <div class="photo_exif" >
        <b>EXIF:</b><br/><br/>
        <?php if( is_array($exif) ): ?>
          <?php include_partial('prObservationPhoto/exif', array( 'exif' => $exif)); ?>
        <?php endif; ?>
      </div>

      <div class="photo_exif" >
        <b>IPTC:</b><br/><br/>
        <?php if( is_array($iptc) ): ?>
          <?php include_partial('prObservationPhoto/iptc', array( 'iptc' => $iptc)); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div id="pr_ob_photo_show_data">
    <?php include_partial('prObservationPhoto/showObservationPhotoDetails', array(
          'observationPhoto' => $observationPhoto,
      )) ?>
  </div>
  
  <ul class="sf_admin_actions">
    <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo') ?>">Regressar à listagem</a></li>
    
    <?php if($observationPhoto->getSpecie()->countPatterns()): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_characterize?id='.$observationPhoto->getId()) ?>">Caracterizar</a></li>
    <?php endif; ?>
      
    <?php if(in_array($observationPhoto->getStatus(), array(ObservationPhoto::C_SIGLA)) ): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_identify?id='.$observationPhoto->getId()) ?>">Identificar</a></li>
    <?php endif; ?>
    
    <?php if(in_array($observationPhoto->getStatus(), array(ObservationPhoto::NEW_SIGLA)) && !count($observationPhoto->getSpecie()->getPatterns()) ): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_identify?id='.$observationPhoto->getId()) ?>">Identificar</a></li>
    <?php endif; ?>
   
    <?php $sessionUser = $sf_user->getGuardUser() ?> 
    <?php if(in_array($observationPhoto->getStatus(), array(ObservationPhoto::FA_SIGLA)) && $observationPhoto->getLastEditedBy() != $sessionUser->getId() ): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_validate?id='.$observationPhoto->getId()) ?>">Validar</a></li>
    <?php endif; ?>
      
    <li class="sf_admin_action_edit"><a href="<?php echo url_for('@pr_observation_photo_edit?id='.$observationPhoto->getId()) ?>">editar</a></li>
    <?php echo $helper->linkToDelete($observationPhoto, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</div>
