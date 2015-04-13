<?php if( $sf_user->hasAtLeastOneCredential( array(  0 => 'showGrid',  1 => 'showMap',  2 => '_edit',  3 => '_delete',), $sf_context->getModuleName() ) ): ?>
<td>
  <ul class="sf_admin_td_actions">
<?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), 'showGrid') ): ?>
    <li class="sf_admin_action_showgrid">
      <?php echo link_to(__('Registos', array(), 'general_info'), 'general_info/ListShowGrid?id='.$GeneralInfo->getId(), array()) ?>    </li>
<?php endif; ?>
<?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), 'showMap') ): ?>
    <li class="sf_admin_action_showmap">
      <?php echo link_to(__('Ver em Mapa', array(), 'general_info'), 'general_info/ListShowMap?id='.$GeneralInfo->getId(), array()) ?>    </li>
<?php endif; ?>
<?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), '_edit') ): ?>
    <?php echo $helper->linkToEdit($GeneralInfo, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?><?php endif; ?>
<?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), '_delete') && $GeneralInfo->getValid() !=1 ): ?>
    <?php echo $helper->linkToDelete($GeneralInfo, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?><?php endif; ?>
  </ul>
</td>
<?php endif; ?>
