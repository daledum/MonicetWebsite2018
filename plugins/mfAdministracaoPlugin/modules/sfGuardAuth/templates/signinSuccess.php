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
	<h2><?php echo __('autenticate', array(), 'sf_guard') ?></h2>
	<?php if( $sf_request->isMethod('post') && ! $form->isValid()  ): ?>
		<div class="error"><?php echo __('invalid_login', array(), 'sf_guard') ?></div>
	<?php endif; ?>
	<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
	  <?php echo $form->renderHiddenFields() ?>
	  <div class="form_row">
	  	<label for="signin_username"><?php echo __('username', array(), 'sf_guard') ?></label>
	  	<?php echo $form['username']->render(array('class' => 'textbox')) ?>
	  </div>
	  <div class="form_row">
	  	<label for="signin_password"><?php echo __('password', array(), 'sf_guard') ?></label>
	  	<?php echo $form['password']->render(array('class' => 'textbox', 'value' => '')) ?>
	  </div>
	  <div class="form_row right">
	  	<input type="button" class="button" value="<?php echo __('cancel', array(), 'sf_guard') ?>" onclick="location.href='<?php echo url_for('@homepage') ?>'" /> <input type="submit" class="button" value="<?php echo __('enter', array(), 'sf_guard') ?>" />
	  </div>
	  <?php include_partial('sfGuardAuth/login_links') ?>
	</form>
</div>