<?php
  function mfAdministracaoLogo()
  {
  	return link_to(
      image_tag(
        sfConfig::get('app_mfAdministracaoPlugin_logo_src', '/mfAdministracaoPlugin/images/logo_administracao.jpg'),
          array(
            'alt_title' => sfConfig::get('app_mfAdministracaoPlugin_logo_alt', 'morfose'),
            'size' => sprintf('%sx%s', sfConfig::get('app_mfAdministracaoPlugin_logo_width', '435'), sfConfig::get('app_mfAdministracaoPlugin_logo_height', '120')),
          )
        ), 
      '@homepage');
  }
  
  function sfGuardLogo()
  {
  	return link_to(
      image_tag(
        sfConfig::get('app_sfGuardPlugin_logo_src', '/mfAdministracaoPlugin/images/sfguardauth/logo_login.jpg'),
          array(
            'alt_title' => sfConfig::get('app_sfGuardPlugin_logo_alt', 'morfose'),
            'size' => sprintf('%sx%s', sfConfig::get('app_sfGuardPlugin_logo_width', '420'), sfConfig::get('app_sfGuardPlugin_logo_height', '265')),
          )
        ),
      '@homepage');
  }