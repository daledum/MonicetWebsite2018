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
	                    
	                    <li class="maps<?php if($active == "maps"): ?> menu-active<?php endif ?>"><?php echo link_to(__('Maps'), '@maps'); ?></li>
                            <li class="charts<?php if($active == "charts"): ?> menu-active<?php endif ?>"><?php echo link_to(__('Charts'), '@charts'); ?></li>
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
    <div id="_div_footer">																			 
        <div>
            <div style="display:inline-block;float:left;margin-top:16px;width:300px;">
                <iframe src="http://www.facebook.com/plugins/like.php?app_id=128579077231396&amp;href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FMonicet%2F195624723787486&amp;send=false&amp;layout=standard&amp;width=300&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:35px;" allowTransparency="true"></iframe>
            </div>
		    <span id="_span_support"><?php echo __('Support'); ?>: &nbsp;</span>
            <ul id="_ul_support">
                <li><a href="http://www.azores.gov.pt" target="_blank"><img alt="Governo Regional dos Açores" title="Governo Regional dos Açores" src="/images/logo-gra.png" /></a></li>
                <li><a href="http://www.azores.gov.pt/Portal/pt/entidades/srcte/" target="_blank"><img alt="Secretaria Regional da Ciência, Tecnologia e Equipamentos" title="Secretaria Regional da Ciência, Tecnologia e Equipamentos" src="/images/logo-srcte.png" /></a></li>
            </ul>
            <p><?php echo __('developed by'); ?> <a href="http://www.morfose.net">morfose</a>&copy;2011</p>
            <br />
            <div class="creative-commons">
        		<div class="creative-commons-image">
        			<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">
		            	<img alt="Licença Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" />
		           	</a>
		        </div>
	           	<br />
	           	<span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/Dataset" property="dct:title" rel="dct:type">MONICET</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.monicet.net/" property="cc:attributionName" rel="cc:attributionURL">MONICET database</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Atribuição-Uso Não-Comercial-Partilha nos termos da mesma licença 3.0 Unported License</a>.<br />Permissions beyond the scope of this license may be available at <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.monicet.net/" rel="cc:morePermissions">http://www.monicet.net/</a>
            </div>
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
