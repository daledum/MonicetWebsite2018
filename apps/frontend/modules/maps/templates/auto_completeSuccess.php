<?php if($result): ?>
 {"id":"<?php echo $result->getId() ?>","value":"<?php echo $result->getName() ?> - <?php echo $result->getCode() ?>", "code":"<?php echo $result->getcode() ?>", "name":"<?php echo $result->getName() ?>"}
<?php endif; ?>


