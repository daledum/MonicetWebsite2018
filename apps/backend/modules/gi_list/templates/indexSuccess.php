<?php use_helper('I18N', 'Date') ?>
<?php include_partial('gi_list/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Gi list List', array(), 'gi_list') ?></h1>

  <?php include_partial('gi_list/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('gi_list/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('gi_list/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('gi_list/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('gi_list/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('gi_list/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('gi_list/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
