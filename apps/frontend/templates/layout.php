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
	        <a id="_a_logo" href="<?php echo url_for('@homepage') ?>"><img src="/images/frontend/logo_transparent.png" alt="monicet" title="monicet" /></a>
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
	                    <li<?php if($active == "objectives"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('objectives'), '@default_index?module=objectives'); ?></li>
	                    <li<?php if($active == "team"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('team'), '@default_index?module=team'); ?></li>
	                    <li<?php if($active == "album"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('photoalbum'), '@default_index?module=photoalbum'); ?></li>
	                    <li<?php if($active == "contacts"): ?> class="menu-active"<?php endif ?>><?php echo link_to(__('contacts'), '@contacts'); ?></li>
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
	    </div>
    </div>
    <div id="_div_footer">
        <div>
            <span id="_span_support"><?php echo __('Support'); ?>: &nbsp;</span>
            <ul id="_ul_support">
                <li><a href="http://www.azores.gov.pt" target="_blank"><img alt="Governo Regional dos Açores" title="Governo Regional dos Açores" src="/images/logo-ga-130x40.png" /></a></li>
                <li><a href="http://www.azores.gov.pt/Portal/pt/entidades/srcte/" target="_blank"><img alt="Secretaria Regional da Ciência, Tecnologia e Equipamentos" title="Secretaria Regional da Ciência, Tecnologia e Equipamentos" src="/images/logo-srcte-127x40.png" /></a></li>
            </ul>
            <p><?php echo __('developed by'); ?> <a href="http://www.morfose.net">morfose</a>&copy;2010</p>
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
