<?php use_helper('I18N', 'mfAdministracao') ?>
<div class="logo">
  <?php echo sfGuardLogo() ?>
  <?php if( has_component_slot('login_info') ): ?>
    <?php include_component_slot('login_info') ?>
  <?php endif; ?>
</div>
<div class="vbar">&nbsp;</div>
<div class="form">
  <h1><?php echo __('administration_area', array(), 'sf_guard') ?></h1>
  <h2><?php echo __('credentials', array(), 'sf_guard') ?></h2>
  
  <p class="error alert"><?php echo __("dont_have_permission", array(), 'sf_guard') ?></p>
  
  <?php include_partial('sfGuardAuth/login_links') ?>
</div>