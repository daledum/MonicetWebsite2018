<?php use_helper('JavascriptBase') ?>
<div class="form_row">
  <?php if( has_component_slot('login_links') ): ?>
    <?php include_component_slot('login_links') ?>
  <?php else: ?>
  <ul>
    <li><?php echo link_to_function(sfConfig::get('app_mfAdministracaoPlugin_empresa', 'monicet'), 'history.go(-1)') ?></li>
  </ul>
  <?php endif; ?>
</div>