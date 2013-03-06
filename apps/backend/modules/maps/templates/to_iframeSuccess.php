<div id="sf_admin_container">
  <div class="sf_admin_list" id="sf_admin_content">
    <h1 style="text-align: left;">Iframe do mapa</h1>
    <br />
    <p>Para utilizar o mapa no seu site, coloque o seguinte código no local desejado:</p>
    <br />
    <b>Português</b>
    <br/>
    <p><?php print htmlentities('<iframe src="http://www.monicet.net'.$iframe_url_pt.'" width="400" height="400"></iframe>') ?></p>
    <br />
    <b>Inglês</b>
    <br/>
    <p><?php print htmlentities('<iframe src="http://www.monicet.net'.$iframe_url_en.'" width="400" height="400"></iframe>') ?></p>
    <br />
    <p>As dimensões do iframe são personalizáveis, sendo o seguinte exemplo apenas demonstrativo da funcionalidade.</p>
    <br />
    <table>
      <tr>
        <th>Iframe em português</th>
        <th>Iframe em inglês</th>
      </tr>
      <tr>
        <td><iframe src="<?php print $iframe_url_pt; ?>" width="400" height="400"></iframe></td>
        <td><iframe src="<?php print $iframe_url_en; ?>" width="400" height="400"></iframe></td>
      </tr>
    </table>
    <br />
    <br />
  </div>
</div>