<ul class="dropdown dropdown-horizontal">
  <li><a href="#">Sítio web</a></li>
  <li><a href="#">Administração</a>
    <ul>
      <li><?php echo link_to('Utilizadores', '@sf_guard_user') ?></li>
      <li><?php echo link_to('Menus', '@mf_menu') ?></li>
      <li><?php echo link_to('Formulários', '@mf_formulario') ?></li>
      <li><?php echo link_to('Logs', '@mf_log') ?></li>
    </ul>
  </li>
  <li><a href="#">Administração mar</a>
    <ul>
      <li></li>
    </ul>
  </li>
  <li><a href="#">Registos mar</a></li>
</ul>