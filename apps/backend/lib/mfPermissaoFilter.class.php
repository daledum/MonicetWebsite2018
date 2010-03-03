<?php
  class mfPermissaoFilter extends sfFilter
	{
	  public function execute($filterChain)
	  {
	    // Code to execute before the action execution
	    $context = $this->getContext();
      $user = $context->getUser();
      $modulo = $context->getModuleName();
      $accao = $context->getActionName();
      
      // utilizador pode aceder a áreas não autenticadas, à homepage e a tudo o que pertence ao sfGuardAuth
      if ( $user->isAuthenticated() &&
             $modulo != sfConfig::get('sf_secure_module') &&
             $context->getRouting()->getCurrentRouteName() != 'homepage' &&
             ! $user->hasCredential($modulo.".*") &&
             ! $user->hasCredential($modulo.".".$accao)
         ){
          // utilizador não tem permissão, redirecciona para a página de segurança definida nos settings da aplicação
         	mfLogPeer::log(sprintf('Utilizador %s tentou aceder à accção "%s" do módulo "%s" mas não tem permissão.', $user->getGuardUser()->getUsername(), $accao, $modulo), mfLogPeer::WARNING);
          return $context->getController()->redirect(sfConfig::get('sf_secure_module').'/'.sfConfig::get('sf_secure_action'));
      }
	    // Execute next filter in the chain
	    $filterChain->execute();
	    // Code to execute after the action execution, before the rendering
	  }
	}