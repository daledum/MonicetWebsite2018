<div id="sf_admin_container">
  <h1 style="text-align: left;">Iframe guardado com sucesso!</h1>
  <br />
  <p>O iframe foi guardado com a Hash "<?php print $iframe->getHash(); ?>".</p>
  <p>Para utilizar o gráfico no seu site, coloque o seguinte código no local desejado:</p>
  <br />
  <p><?php print htmlentities('<iframe src="http://www.monicet.net/en/chartsIframe?hash='.$iframe->getHash().'" width="580" height="400"></iframe>') ?></p>
  <br />
  <p>O resultado será o seguinte:</p>
  <br />
  <iframe src="/en/chartsIframe?hash=<?php print $iframe->getHash() ?>" width="580" height="400"></iframe>
  <br />
  <br />
</div>