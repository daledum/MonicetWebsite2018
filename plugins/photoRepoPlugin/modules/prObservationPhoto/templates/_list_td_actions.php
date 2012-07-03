<?php if( $sf_user->hasAtLeastOneCredential( array(  0 => '_edit',  1 => '_delete',), $sf_context->getModuleName() ) ): ?>
<td>
  <ul class="sf_admin_td_actions">
      <li class="sf_admin_action_show"><?php echo link_to('Ver fotografia', '/uploads/pr_repo_final/'.$ObservationPhoto->getFileName(), array('target' => '_blank', 'class' => 'preview') ) ?></li>
<?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), '_edit') ): ?>
    <?php echo $helper->linkToEdit($ObservationPhoto, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?><?php endif; ?>
<?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), '_delete') ): ?>
    <?php echo $helper->linkToDelete($ObservationPhoto, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?><?php endif; ?>
  </ul>
</td>
<?php endif; ?>