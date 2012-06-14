<div id="sf_admin_container">
  <h1 style="text-align: left;">Iframe do mapa</h1>
  <br />
  <p>Para utilizar o mapa no seu site, coloque o seguinte código no local desejado:</p>
  <br />
  <p><?php print htmlentities('<iframe src="http://www.monicet.net'.$iframe_url.'" width="580" height="400"></iframe>') ?></p>
  <br />
  <iframe src="<?php print $iframe_url; ?>" width="400" height="400"></iframe>
  <br />
  <br />
</div>