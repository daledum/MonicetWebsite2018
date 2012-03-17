<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $sf_user->getCulture() ?>" lang="<?php echo $sf_user->getCulture() ?>">
  <head>
    <?php $active = get_slot('active') ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title>monicet :: <?php echo __($active) ?></title>
    <meta property="og:language" content="<?php echo $sf_user->getCulture(); ?>" />
    <meta property="og:title" content="MONICET" />
    <meta property="og:type" content="non_profit" />
    <meta property="og:url" content="http://www.monicet.net" />
    <meta property="og:image" content="http://profile.ak.fbcdn.net/hprofile-ak-snc4/174780_195624723787486_4269390_n.jpg" />
    <meta property="og:site_name" content="MONICET" />
    <meta property="fb:admins" content="531002996" />
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
    <?php echo $sf_content ?>
  </body>
</html>
