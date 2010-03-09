<?php if ($administrador): ?>
  <?php include_partial('main/menu_administrador') ?>
<?php else: ?>
  <?php include_component('main', 'menu_utilizador') ?>
<?php endif; ?>