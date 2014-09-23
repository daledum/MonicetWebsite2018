<?php use_helper('I18N', 'Date') ?>
<?php include_partial('company/assets') ?>

<div id="sf_admin_container" class="pendent_company_container">
  <h1><?php echo __('New Company', array(), 'company').' *'.__('Click on map to set coordinates', array(), 'company'); ?></h1>

  <?php include_partial('company/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('company/form_header', array('Company' => $Company, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('company/form', array('Company' => $Company, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('company/form_footer', array('Company' => $Company, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

<?php include_partial('company/choose_coordinates', array('Company' => $Company, 'form' => $form, 'configuration' => $configuration)) ?>
