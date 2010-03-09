<?php foreach ($this->configuration->getValue('list.actions') as $name => $params): ?>
[?php if( $sf_user->hasModuleCredential($sf_context->getModuleName(), '<?php echo $name ?>') ): ?]
<?php if ('_new' == $name): ?>
<?php echo $this->addCredentialCondition('[?php echo $helper->linkToNew('.$this->asPhp($params).') ?]', $params)."\n" ?>
<?php else: ?>
<li class="sf_admin_action_<?php echo $params['class_suffix'] ?>">
  <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, false), $params)."\n" ?>
</li>
<?php endif; ?>
[?php endif; ?]
<?php endforeach; ?>