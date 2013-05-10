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
          <div style="margin: 0 auto;position: relative;top: -22px;width: 955px;"><a href="<?php echo url_for('@homepage') ?>"><img src="/images/frontend/logo_transparent.png" alt="monicet" title="monicet" /></a></div>
          <div id="_div_main">
              <div id="_div_main_center">
                  <div id="_div_main_content">
                      <?php echo $sf_content ?>
                  </div>
              </div>
              <div style="display: block; height: 20px; position: absolute; margin: auto; text-align: center; width: 100%; top: 745px;">
                <?php include_component('consorcium', 'consorciumElements') ?>
              </div>
          </div>
          
      </div>
    </div>
    <?php include_partial('global/footer'); ?>
  </body>
</html>
