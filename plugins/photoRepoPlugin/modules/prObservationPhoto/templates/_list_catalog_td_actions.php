<?php if( $sf_user->hasAtLeastOneCredential( array(  0 => '_edit',  1 => '_delete',), $sf_context->getModuleName() ) ): ?>
<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_show"><?php echo link_to('Ver', '@pr_observation_photo_show?id='.$ObservationPhoto->getId(), array() ) ?></li>
    <?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), '_edit') ): ?>
        <?php echo $helper->linkToEdit($ObservationPhoto, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php endif; ?>
    
    <?php
        if( $sf_user->hasModuleCredential($sf_context->getModuleName(), '_delete') ){
            $deleteBestPhotoMessage = ( $ObservationPhoto->haveToChooseBestPhotoAgain('ask') ) ? $ObservationPhoto->haveToChooseBestPhotoAgain('ask') : '';
            echo $helper->linkToDelete($ObservationPhoto, array(  'params' =>   array(  ),  'confirm' => $deleteBestPhotoMessage.'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',));
        }
    ?>

    <li class="sf_admin_action_show"><?php echo link_to('Fotografia', '/uploads/pr_repo_final/'.$ObservationPhoto->getFileName(), array('target' => '_blank', 'class' => 'preview') ) ?></li>
    
    <?php if($ObservationPhoto->isCharacterizable()): ?>
      <li class="sf_admin_action_edit"><?php echo link_to('Caracterizar', '@pr_observation_photo_characterize?id='.$ObservationPhoto->getId() ) ?></li>
    <?php endif; ?>
      
    <?php if( $ObservationPhoto->isIdentifyable() ): ?>
      <li class="sf_admin_action_pesquisa"><a href="<?php echo url_for('@pr_observation_photo_identify?id='.$ObservationPhoto->getId()) ?>">Identificar</a></li>
    <?php endif; ?>
    
  </ul>
</td>
<?php endif; ?>