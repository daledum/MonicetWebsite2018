<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $sf_user->getCulture() ?>" lang="<?php echo $sf_user->getCulture() ?>">
  <head>
    <?php $active = get_slot('active') ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>monicet :: <?php echo __($active) ?></title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <link rel="alternate" title="monicet - Notícias" href="<?php echo url_for('@news_feeds'); ?>" type="application/rss+xml" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <?php if($active == "album"): ?>
    <link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
    <script type="text/javascript" src="/js/jquery.lightbox-0.5.pack.js"></script>
    <script type="text/javascript">
    $(function() {
    $('ul.gallery li a').lightBox({
        imageBtnClose: "/images/frontend/lightbox-btn-close.gif",
        imageLoading: "/images/frontend/lightbox-ico-loading.gif",
        imageBtnPrev: "/images/frontend/lightbox-btn-prev.gif",
        imageBtnNext: "/images/frontend/lightbox-btn-next.gif",
        txtImage: '',
        txtOf: '-'
    });
  });

  </script>
    <?php endif ?>
  </head>
  <body>
    <div id="_div_background">
      <div id="_div_page">
          <a id="_a_logo" href="<?php echo url_for('@homepage') ?>"><img src="/images/frontend/logo_transparent.png" alt="monicet" title="monicet" /></a>
          <div id="_div_main">
              <div id="_div_main_center">
                  <div id="_div_main_content">
                      <?php echo $sf_content ?>
                  </div>
              </div>
              <div style="display: block; height: 20px; position: absolute; margin: auto; text-align: center; width: 100%; top: 735px;">
                <?php include_component('consorcium', 'consorciumElements') ?>
                <ul style="clear: both; display: inline-block; height: 40px; margin: auto; position: relative; width: 40px;"><li><?php echo link_to('Admin','/admin.php') ?></li></ul>
              </div>
          </div>
          
      </div>
    </div>
    <div id="_div_footer">
        <div>
            <span id="_span_support"><?php echo __('Support'); ?>: &nbsp;</span>
            <ul id="_ul_support">
                <li><a href="http://www.azores.gov.pt" target="_blank"><img alt="Governo Regional dos Açores" title="Governo Regional dos Açores" src="/images/logo-gra.png" /></a></li>
                <li><a href="http://www.azores.gov.pt/Portal/pt/entidades/srcte/" target="_blank"><img alt="Secretaria Regional da Ciência, Tecnologia e Equipamentos" title="Secretaria Regional da Ciência, Tecnologia e Equipamentos" src="/images/logo-srcte.png" /></a></li>
            </ul>
            <p><?php echo __('developed by'); ?> <a href="http://www.morfose.net">morfose</a>&copy;2010/2011</p>
        </div>
    </div>
    <script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
    try {
    var pageTracker = _gat._getTracker("UA-1087068-30");
    pageTracker._trackPageview();
    } catch(err) {}</script>
  </body>
</html>
