<ul class="dropdown dropdown-horizontal">
  <li><a href="#">Sítio web</a>
    <ul>
      <li><?php echo link_to('Álbuns', '@album') ?></li>
      <li><?php echo link_to('Fotografias', '@photo') ?></li>
      <li><?php echo link_to('Notícias', '@news_article') ?></li>
      <li><?php echo link_to('Consórcios', '@consorcium_element') ?></li>
      <li><?php echo link_to('Equipa', '@team') ?></li>
    </ul>
  </li>
  <li><a href="#">Administração</a>
    <ul>
      <li><?php echo link_to('Utilizadores', '@sf_guard_user') ?></li>
      <li><?php echo link_to('Empresas', '@company') ?></li>
      <li><?php echo link_to('Menus', '@mf_menu') ?></li>
      <li><?php echo link_to('Permissões', '@sf_guard_permission') ?></li>
      <li><?php echo link_to('Formulários', '@mf_formulario') ?></li>
      <li><?php echo link_to('Logs', '@mf_log') ?></li>
    </ul>
  </li>
  <li><a href="#">Administração mar</a>
    <ul>
      <li><a href="<?php echo url_for('@specie_group') ?>">Grupos de espécies</a></li>
      <li><a href="<?php echo url_for('@specie') ?>">Espécies</a></li>
      <li><a href="<?php echo url_for('@association') ?>">Associações</a></li>
      <li><a href="<?php echo url_for('@behaviour') ?>">Comportamento</a></li>
      <?php /*<li><a href="<?php echo url_for('@code') ?>">Códigos</a></li>*/ ?>
      <li><a href="<?php echo url_for('@sea_state') ?>">Estados do mar</a></li>
      <li><a href="<?php echo url_for('@visibility') ?>">Visibilidade</a></li>
      <li><a href="<?php echo url_for('@vessel') ?>">Barcos</a></li>
      <li><a href="<?php echo url_for('@skipper') ?>">Skippers</a></li>
      <li><a href="<?php echo url_for('@guide') ?>">Guias/Biólogos</a></li>
    </ul>
  </li>
  <li><a href="<?php echo url_for('@general_info') ?>">Saídas</a></li>
  <?php /*<li><a href="#">Visualização</a>
    <ul>
      <li><a href="#">Analítica</a></li>
      <li><a href="<?php echo url_for('@maps') ?>">Geográfica</a></li>
    </ul>
  </li>*/ ?>
</ul>