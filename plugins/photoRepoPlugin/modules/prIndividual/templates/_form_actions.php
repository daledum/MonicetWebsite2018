<ul class="sf_admin_actions">
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_pendent_photos_list') ?>">Fotografias por processar</a></li>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo?do=clean') ?>">Fotografias por analisar</a></li>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo_validated') ?>">Catálogo</a></li>
  
  <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Listagem de individuos',)) ?>
  <li class="sf_admin_action_show"><a href="<?php echo url_for('@pr_individual_show?id='.$form->getObject()->getId()) ?>">Mostrar</a></li>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
</ul>