[?php if( $sf_user->hasAtLeastOneCredential( <?php echo $this->asPhp(array_keys($this->configuration->getValue('list.batch_actions'))) ?>, $sf_context->getModuleName() ) ): ?]
<?php if (count($actions=$this->configuration->getValue('list.batch_actions'))): ?>
<li class="sf_admin_batch_actions_choice">
  <select name="batch_action">
    <option value="">[?php echo __('Choose an action', array(), 'sf_admin') ?]</option>
<?php foreach ($actions as $action => $params): ?>
[?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), '<?php echo $action ?>') ): ?]
    <?php echo $this->addCredentialCondition('<option value="'.$action.'">[?php echo __(\''.$params['label'].'\', array(), \'sf_admin\') ?]</option>', $params) ?>
[?php endif; ?]
<?php endforeach; ?>
  </select>
  [?php $form = new BaseForm(); if ($form->isCSRFProtected()): ?]
    <input type="hidden" name="[?php echo $form->getCSRFFieldName() ?]" value="[?php echo $form->getCSRFToken() ?]" />
  [?php endif; ?]
  <input type="submit" value="[?php echo __('Go', array(), 'sf_admin') ?]" />
</li>
<?php endif; ?>
[?php endif; ?]