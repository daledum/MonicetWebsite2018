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
                      <div class="main-container">
                          <h2><?php echo __('Observations Catalog'); ?></h2>
                          <div class="back-to-home"><a href="<?php echo url_for('@homepage') ?>">« <?php echo __('Back to Home') ?></a></div>

                          <!-- LANGUAGE -->
                          <div id="_ul_languages" style="display: inline-block">
                            <?php if($sf_user->getCulture() == "pt"): ?>
                               <div id="_div_en_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=pt', 'sf_culture=en', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
                            <?php else: ?>
                               <div id="_div_pt_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=en', 'sf_culture=pt', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
                            <?php endif ?>
                          </div>

                          <!-- CONTENT CONTAINER -->
                          <div class="left-container">
                            <div class="container-side container-left"></div>
                            <div class="container-div">
                                <div class="catalog-container">
                                    <div class="left-sidebar">
                                        <div class="left-sidebar-title"><h2><?php echo __('Observations Catalog'); ?></h2></div>
                                        <?php include_partial('catalog_frontend/filters'); ?>
                                    </div>
                                    <div class="right-content">
                                        <?php echo $sf_content; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="container-side container-right"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div style="display: block; height: 20px; position: absolute; margin: auto; text-align: center; width: 100%; top: 745px;">
                <?php include_component('consorcium', 'consorciumElements') ?>
                <ul style="clear: both; display: inline-block; height: 40px; margin: auto; position: relative; width: 40px;"><li><?php echo link_to('Admin','/admin.php') ?></li></ul>
              </div>
          </div>
      </div>
    </div>
    <?php include_partial('global/footer'); ?>
  </body>
</html>
