<?php use_helper('I18N', 'Date') ?>
<?php include_partial('prObservationPhoto/assets') ?>

<div id="sf_admin_container" class="pendent_photo_container">
  <h1><?php echo __('A editar uma fotografia de observação de cetáceos', array(), 'messages') ?></h1>

  <?php if(isset($prevId) || isset($nextId)): ?>
    <ul class="sf_admin_actions">
      <?php if(isset($prevId)): ?><li class="sf_admin_action_left"><a href="<?php echo url_for('@pr_observation_photo_edit?id='.$prevId) ?>">Anterior</a></li><?php endif; ?>
      <?php if(isset($nextId)): ?><li class="sf_admin_action_right"><a href="<?php echo url_for('@pr_observation_photo_edit?id='.$nextId) ?>">Seguinte</a></li><?php endif; ?>
    </ul><br/>
  <?php endif; ?>
  

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

<?php 
    include_partial('prObservationPhoto/photo_details', array( 
        'fileAddress' => '/uploads/pr_repo_final/'.$ObservationPhoto->getFileName(), 
        'exif' => $exif, 
        'iptc' => $iptc
    )); 
?>