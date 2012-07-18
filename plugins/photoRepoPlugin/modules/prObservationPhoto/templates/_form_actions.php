<ul class="sf_admin_actions">
  <li class="sf_admin_action_back"><a href="<?php echo url_for('@pr_pendent_photos_list') ?>">Fotografias pendentes</a></li>
  <li class="sf_admin_action_back"><a href="<?php echo url_for('@pr_observation_photo') ?>">Fotografias de observações</a></li>
  <?php if ($form->isNew()): ?>
    <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php else: ?>
    <?php $userId = $sf_user->getGuardUser()->getId(); ?>
    <?php $lastEditedBy = $form->getObject()->getLastEditedBy(); ?>
    <?php $status = $form->getObject()->getStatus() ?>
    <!-- For Approval and user not equal to last_edited -->
    <?php if( $status == ObservationPhoto::FA_SIGLA && $lastEditedBy != $userId ): ?>
        <li class="sf_admin_action_action"><a href="<?php echo url_for('@pr_observation_photo_validate?id='.$form->getObject()->getId() ) ?>">Validar</a></li>
    <?php endif; ?>
    <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php endif; ?>
</ul>