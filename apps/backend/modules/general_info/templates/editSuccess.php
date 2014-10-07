<?php use_helper('I18N', 'Date') ?>
<?php include_partial('general_info/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit General info', array(), 'general_info') ?></h1>

  <?php include_partial('general_info/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('general_info/form_header', array('GeneralInfo' => $GeneralInfo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('general_info/form', array('GeneralInfo' => $GeneralInfo, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('general_info/form_footer', array('GeneralInfo' => $GeneralInfo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

<?php include_partial('general_info/coordinates_converter', array('GeneralInfo' => $GeneralInfo, 'form' => $form, 'configuration' => $configuration)) ?>
