<?php use_helper('I18N', 'Date') ?>
<?php include_partial('general_info/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('General info List', array(), 'general_info') ?></h1>

  <?php include_partial('general_info/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('general_info/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('general_info/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('general_info_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('general_info/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('general_info/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('general_info/list_actions', array('helper' => $helper)) ?>
      <li class="sf_admin_action_export">
        <a href="<?php echo url_for('general_info/downloadByFilter') ?>">Exportar</a>
      </li>
      <?php /* ?>
      <li class="sf_admin_action_export">
        <a href="<?php echo url_for('general_info/export') ?>">Exportar_old</a>
      </li>
      <?php */ ?>
      <li class="sf_admin_action_import">
        <a href="<?php echo url_for('general_info/upload') ?>">Importar</a>
      </li>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('general_info/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
