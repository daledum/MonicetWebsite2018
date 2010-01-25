<?php use_helper('I18N') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <link rel="shortcut icon" href="<?php echo sfConfig::get('app_sfGuardPlugin_favicon_src', '/mfAdministracaoPlugin/images/favicon.ico') ?>" />
    <!--[if lte IE 7]>
      <link rel="stylesheet" type="text/css" media="screen" href="/mfAdministracaoPlugin/css/ie6fix.css" />
    <![endif]-->
  </head>
	<body>
		<div id="header">
		  <div class="box"><span class="ne"></span><span class="nw"></span></div>
		</div>
		<div id="main">
		  <div class="box">
		    <?php echo $sf_content ?>
		  </div>
		</div>
		<div id="footer">
		  <div class="box">
	      <div class="morfose"><?php echo __('Developed by %url%', array('%url%' => link_to(sfConfig::get('app_mfAdministracaoPlugin_empresa', 'morfose'), sfConfig::get('app_mfAdministracaoPlugin_empresa_url', 'http://www.morfose.net/'), 'target=_blank')), 'sf_admin') ?> &copy; <?php echo sfConfig::get('app_mfAdministracao_ano', date('Y'))?></div>
	      <div class="sw"></div><div class="se"></div>
      </div>
    </div>
	</body>
</html>