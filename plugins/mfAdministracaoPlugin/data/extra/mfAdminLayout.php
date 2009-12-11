<?php use_helper('I18N', 'mfAdministracao') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <link rel="shortcut icon" href="<?php echo sfConfig::get('app_mfAdministracaoPlugin_favicon_src', '/mfAdministracaoPlugin/images/favicon.ico') ?>" />
  </head>
  <body>
    <div id="pg">
      <div id="hd">
        <div class="ct">
          <div class="logo">
            <?php echo mfAdministracaoLogo() ?>
          </div>
          <div class="user">
            <span class="administracao"><?php echo __('Administration area', array(), 'sf_admin') ?></span>
            <?php echo $sf_user ?>
          </div>
          <div class="logout">
            <?php echo link_to(__('logout', array(), 'sf_admin'), '@sf_guard_signout') ?>
          </div>
        </div>
      </div>
      <?php if( has_component_slot('menu') ): ?>
        <div id="menu">
          <div class="ct">
            <?php include_component_slot('menu') ?>
          </div>
        </div>
      <?php endif; ?>
      <div id="bd">
        <div class="ct">
          <?php echo $sf_content ?>
        </div>
      </div>
      <div id="ft">
        <div class="ct">
        <?php if( has_component_slot('footer') ): ?>
          <?php include_component_slot('footer') ?>
        <?php endif; ?>
        </div>
      </div>
      <div id="dv" class="ct">
        <div class="morfose"><?php echo __('Developed by %url%', array('%url%' => link_to(sfConfig::get('app_mfAdministracaoPlugin_empresa', 'morfose'), sfConfig::get('app_mfAdministracaoPlugin_empresa_url', 'http://www.morfose.net/'), 'target=_blank')), 'sf_admin') ?> &copy; <?php echo sfConfig::get('app_mfAdministracaoPlugin_ano', date('Y'))?></div>
        <div class="sw"></div><div class="se"></div>
      </div>
    </div>
  </body>
</html>