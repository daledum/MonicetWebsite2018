<li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_pendent_photos_list') ?>">Fotografias por processar</a></li>

<?php if($sf_context->getActionName() == 'catalog'): ?>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo') ?>">Fotografias por analisar</a></li>
<?php else: ?>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo_validated') ?>">Catálogo</a></li>
<?php endif; ?>