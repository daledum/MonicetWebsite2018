<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Catálogo de fotografias validadas', array(), 'observation_photo') ?></h1>

  <?php include_partial('prObservationPhoto/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('prObservationPhoto/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('prObservationPhoto/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('prObservationPhoto/list_catalog', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('prObservationPhoto/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('prObservationPhoto/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('prObservationPhoto/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
