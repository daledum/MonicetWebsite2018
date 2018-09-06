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

  </head>
  <body>
    <div id="_div_background">
      <div id="_div_page">
          <div style="margin: 0 auto;position: relative;top: -22px;width: 955px;"><a href="<?php echo url_for('@homepage') ?>"><img src="/images/frontend/logo_transparent.png" alt="monicet" title="monicet" /></a></div>
          
          <div id="_div_main">
              <div id="_div_main_center">
                  <div id="_div_main_content">
                      <div class="main-container">

                          <h2><?php echo __('Observations catalog', null, 'catalog'); ?></h2>
                          <div class="back-to-home">
                            <a href="<?php echo url_for('@homepage') ?>"><?php echo __('Back to Home') ?></a> 
                            <?php if (has_slot('filter_links')): ?>
                              <?php include_slot('filter_links') ?>
                            <?php endif; ?>
                          </div>

                          <!-- LANGUAGE -->
                          <div id="_ul_languages" style="display: inline-block">
                            <div style="float:left;"><?php echo link_to('Admin','/admin.php') ?></div>
                            <?php if (has_slot('filter_links_language')): ?>
                              <?php include_slot('filter_links_language') ?>
                            <?php else: ?>
                              <?php if($sf_user->getCulture() == "pt"): ?>
                                 <div id="_div_en_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=pt', 'sf_culture=en', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
                              <?php else: ?>
                                 <div id="_div_pt_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=en', 'sf_culture=pt', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
                              <?php endif ?>
                            <?php endif; ?>
                          </div>

                        <?php echo $sf_content; ?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <?php include_partial('global/footer'); ?>
  </body>
</html>
