<?php if($result): ?>
  <?php if($sf_request->getParameter('environment') == 'frontend'): ?>
    {"id":"<?php echo $result->getId() ?>","value":"<?php echo $result->getName() ?> - <?php echo $result->getCode() ?>", "code":"<?php echo $result->getcode() ?>", "name":"<?php echo $result->getName() ?>"}
  <?php else: ?>
    {"id":"<?php echo $result->getId() ?>","value":"<?php echo $result->getName('pt') ?> - <?php echo $result->getCode() ?>", "code":"<?php echo $result->getcode() ?>", "name":"<?php echo $result->getName('pt') ?>"}
  <?php endif; ?>
<?php endif; ?>


