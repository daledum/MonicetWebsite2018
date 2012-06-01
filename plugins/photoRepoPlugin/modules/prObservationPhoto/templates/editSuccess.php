<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>

<div id="sf_admin_container" class="pendent_photo_container">
  <h1><?php echo __('A editar uma fotografia de observação de cetáceos', array(), 'messages') ?></h1>

  <?php include_partial('prObservationPhoto/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('prObservationPhoto/form_header', array('ObservationPhoto' => $ObservationPhoto, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('prObservationPhoto/form', array('ObservationPhoto' => $ObservationPhoto, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('prObservationPhoto/form_footer', array('ObservationPhoto' => $ObservationPhoto, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
