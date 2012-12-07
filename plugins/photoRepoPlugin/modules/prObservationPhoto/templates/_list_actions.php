<li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_pendent_photos_list') ?>">Fotografias por processar</a></li>

<?php if($sf_request->getParameter('template', 'index') == 'catalog'): ?>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo?do=clean') ?>">Fotografias por analisar</a></li>
<?php else: ?>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('@pr_observation_photo?template=catalog&do=clean') ?>">Catálogo</a></li>
<?php endif; ?>