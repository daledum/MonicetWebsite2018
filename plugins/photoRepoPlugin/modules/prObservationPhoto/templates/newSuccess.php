<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>

<div id="sf_admin_container" class="pendent_photo_container">
  <h1><?php echo __('A processar fotografia pendente', array(), 'messages') ?></h1>

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

<div id="photo_details">
    <div id="photo_photo">
        <img src="<?php echo url_for('/uploads/pr_repo/'.$sf_request->getParameter('file')) ?>" />
    </div>
    <div class="photo_exif" >
        <b>EXIF:</b><br/><br/>
        <?php if( is_array($exif) ): ?>
          <?php include_partial('prObservationPhoto/exif', array( 'exif' => $exif)); ?>
        <?php endif; ?>
    </div>
    
    <div class="photo_exif" >
        <b>IPTC:</b><br/><br/>
        <?php if( is_array($iptc) ): ?>
          <?php include_partial('prObservationPhoto/iptc', array( 'iptc' => $iptc)); ?>
        <?php endif; ?>
    </div>
</div>
