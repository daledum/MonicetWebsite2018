[<?php foreach($result as $specie): ?>
 {"id":"<?php echo $specie->getId() ?>","value":"<?php echo $specie->getName() ?> - <?php echo $specie->getCode() ?>", "code":"<?php echo $specie->getcode() ?>"},
<?php endforeach; ?>]


