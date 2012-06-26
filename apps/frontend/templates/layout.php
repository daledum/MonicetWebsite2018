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
    <div id="_div_background">
	    <div id="_div_page">
	        <div style="margin: 0 auto;position: relative;top: -22px;width: 955px;"><a href="<?php echo url_for('@homepage') ?>"><img src="/images/frontend/logo_transparent.png" alt="monicet" title="monicet" /></a></div>
	        <div id="_div_main">
	            <div id="_ul_languages">
		            <?php if($sf_user->getCulture() == "pt"): ?> 
	                 <div id="_div_en_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=pt', 'sf_culture=en', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
	              <?php else: ?>
	                 <div id="_div_pt_language" class="flag"><?php echo link_to(image_tag('frontend/logo_transparent.png', 'alt_title="language" size=20x14'), str_replace('sf_culture=en', 'sf_culture=pt', $sf_context->getRouting()->getCurrentInternalUri(false, ESC_RAW))) ?></div>
	              <?php endif ?>
	            </div>
	            <div id="_div_main_left">
	                <ul id="_ul_main_menu">
	                    <li<?php if($active == "home"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('home'), '@homepage'); ?></li>
	                    <li<?php if($active == "background"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('background'), '@default_index?module=background'); ?></li>
	                    <?php /*<li<?php if($active == "objectives"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('objectives'), '@default_index?module=objectives'); ?></li>*/ ?>
	                    <li<?php if($active == "team"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('team'), '@default_index?module=team'); ?></li>
	                    <li<?php if($active == "album"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('album'), '@album_all'); ?></li>
	                    <li<?php if($active == "contacts"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('contacts'), '@contacts'); ?></li>
	                    <li<?php if($active == "publication"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('Publications'), '@publication_all'); ?></li>  
	                    
	                    <li class="maps<?php if($active == "maps"): ?> menu-active<?php endif ?>"><?php echo link_to(__('Maps'), '@maps'); ?></li>
                        <li class="charts<?php if($active == "charts"): ?> menu-active<?php endif ?>"><?php echo link_to(__('Charts'), '@charts'); ?></li>
                        <li class="sendPictures<?php if($active == "sendPictures"): ?> menu-active<?php endif ?>"><?php echo link_to(__('Send pictures'), '@send_pictures'); ?></li>
	                </ul>
	            </div>
	            <div id="_div_main_center">
	                <div id="_div_main_content">
	                    <?php echo $sf_content ?>
	                </div>
	            </div>
	            <div id="_div_main_recent_news">
	               <p id="_div_main_recent_news_header"<?php if($active == "news"): ?> class="menu-active"<?php endif ?>><span id="_span_feed"><a href="<?php echo url_for('@news_feeds'); ?>">&nbsp;&nbsp;&nbsp;</a></span>&nbsp;<?php echo link_to(__('news'), '@news_all') ?></p>
	               <?php include_component('news', 'recentNews') ?>
	            </div>
	            <?php include_component('consorcium', 'consorciumElements') ?>
	        </div>
	        <div style="position: relative; left: 740px; display: inline-block;"><?php echo link_to('Admin','/admin.php') ?></div>
	    </div>
    </div>
    <?php include_partial('global/footer'); ?>
  </body>
</html>
