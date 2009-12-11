<div class="form_row">
  <?php if( has_component_slot('login_links') ): ?>
    <?php include_component_slot('login_links') ?>
  <?php else: ?>
  <ul>
    <li><?php echo link_to(sfConfig::get('app_mfAdministracaoPlugin_empresa', 'morfose'), sfConfig::get('app_mfAdministracaoPlugin_empresa_url', 'http://www.morfose.net/')) ?></li>
  </ul>
  <?php endif; ?>
</div>