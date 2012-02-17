<li class="sf_admin_action_back"><a href="<?php echo url_for('@recognition_of_cetaceans_app') ?>">Painel de controlo</a></li>
<?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), '_new') ): ?>
  <?php echo $helper->linkToNew(array(  'params' =>   array(  ),  'class_suffix' => 'new',  'label' => 'New',)) ?>
<?php endif; ?>
