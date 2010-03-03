[?php if( $sf_user->hasAtLeastOneCredential( <?php echo $this->asPhp(array_keys($this->configuration->getValue('list.batch_actions'))) ?>, $sf_context->getModuleName() ) ): ?]
<td>
  <input type="checkbox" name="ids[]" value="[?php echo $<?php echo $this->getSingularName() ?>->getPrimaryKey() ?]" class="sf_admin_batch_checkbox" />
</td>
[?php endif; ?]