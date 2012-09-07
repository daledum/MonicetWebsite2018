<?php if ($ObservationPhoto->getStatus() == ObservationPhoto::V_SIGLA): ?>
  <?php echo image_tag('/mfAdministracaoPlugin/images/icons/tick.png', array('alt' => __('Checked', array(), 'sf_admin'), 'title' => __('Checked', array(), 'sf_admin'))) ?>
<?php else: ?>
  &nbsp;
<?php endif; ?>