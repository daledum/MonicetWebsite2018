<ul class="dropdown dropdown-horizontal">
  <li><a href="#">Sítio web</a>
    <ul>
      <li><?php echo link_to('Álbuns', '@album') ?></li>
      <li><?php echo link_to('Fotografias', '@photo') ?></li>
      <li><?php echo link_to('Notícias', '@news_article') ?></li>
      <li><?php echo link_to('Consórcios', '@consorcium_element') ?></li>
      <li><?php echo link_to('Equipa', '@team') ?></li>
      <li><?php echo link_to('Conteúdos do Site', '@content') ?></li>
      <li><?php echo link_to('Publicações', '@publication') ?></li>
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
      <li><?php echo link_to('Grupos de espécies','@specie_group') ?></li>
      <li><?php echo link_to('Espécies','@specie') ?></li>
      <li><?php echo link_to('Associações','@association') ?></li>
      <li><?php echo link_to('Comportamento','@behaviour') ?></li>
      <?php /*<li><?php echo link_to('Códigos','@code') ?></li>*/ ?>
      <li><?php echo link_to('Estados do mar','@sea_state') ?></li>
      <li><?php echo link_to('Visibilidade','@visibility') ?></li>
      <li><?php echo link_to('Barcos','@vessel') ?></li>
      <li><?php echo link_to('Skippers','@skipper') ?></li>
      <li><?php echo link_to('Guias/Biólogos','@guide') ?></li>
    </ul>
  </li>
    <li><a href="#">Saídas</a>
      <ul>
        <li><?php echo link_to('Saídas da Empresa','@general_info') ?></li>
        <li><?php echo link_to('Saídas Públicas','@general_info_gi_list') ?></li>
      </ul>
    </li>
  <li><a href="#">Visualização</a>
    <ul>
      <li><a href="#">Mapas</a>
        <ul>
          <li><?php echo link_to('Mapa Geral','@maps') ?></li>
          <li><?php echo link_to('Mapa Temporal','@maps_time') ?></li>
        </ul>
      </li>
      <li><a href="#">Gráficos</a>
        <ul>
          <li><?php echo link_to('APUE','@charts') ?></li>
          <li><a href="#">Distribuição Anual</a>
            <ul>
              <li><?php echo link_to('Barcos ou Guias','@month_chart') ?></li>
              <li><?php echo link_to('Espécies','@species_chart') ?></li>
              <li><?php echo link_to('Saídas com Avistamentos','@departure_chart') ?></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </li>
  <li><a href="#">Vigias</a>
    <ul>
      <li><a href=#>Avistamentos</a>
        <ul>
          <li><?php echo link_to('Públicos','@watch_info_wi_list') ?></li>
          <li><?php echo link_to('Da Empresa','@watch_info') ?></li>
        </ul>
      </li>
      <li><?php echo link_to('Códigos','@watch_code') ?></li>
      <li><?php echo link_to('Vigias','@watchman') ?></li>
      <li><?php echo link_to('Postos','@watch_post') ?></li>
      <li><?php echo link_to('Visibilidade','@watch_visibility') ?></li>
    </ul>
  </li>
  <li><?php echo link_to('Rec. cetáceos','@recognition_of_cetaceans_app') ?></li>
</ul>