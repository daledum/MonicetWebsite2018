<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_pendent_photos_list') ?>">Foto. p/ processar</a></li>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo') ?>">Foto. p/ analisar</a></li>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo_validated') ?>">Catálogo</a></li>
  
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>

</ul>

<?php $OBPhoto = $form->getObject() ?>
<?php $status = $form->getObject()->getStatus() ?>

<?php if( !$OBPhoto->isNew() ): ?>
  <ul class="sf_admin_actions">
    
     <?php if( $status != ObservationPhoto::V_SIGLA ): ?>
        <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php endif; ?>
    
    <?php if($OBPhoto->getSpecie()->countPatterns()): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_characterize?id='.$OBPhoto->getId()) ?>">Caracterizar</a></li>
    <?php endif; ?>
      
    <?php if(in_array($OBPhoto->getStatus(), array(ObservationPhoto::C_SIGLA)) ): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_identify?id='.$OBPhoto->getId()) ?>">Identificar</a></li>
    <?php endif; ?>
    
    <?php if(in_array($OBPhoto->getStatus(), array(ObservationPhoto::NEW_SIGLA)) && !count($OBPhoto->getSpecie()->getPatterns()) ): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_identify?id='.$OBPhoto->getId()) ?>">Identificar</a></li>
    <?php endif; ?>
   
    <?php $sessionUser = $sf_user->getGuardUser() ?> 
    <?php if(in_array($OBPhoto->getStatus(), array(ObservationPhoto::FA_SIGLA)) && $OBPhoto->getLastEditedBy() != $sessionUser->getId() ): ?>
      <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_validate?id='.$OBPhoto->getId()) ?>">Validar</a></li>
    <?php endif; ?>
      
    <li class="sf_admin_action_show"><a href="<?php echo url_for('@pr_observation_photo_show?id='.$OBPhoto->getId()) ?>">Visualizar</a></li>
  </ul>
<?php endif; ?>