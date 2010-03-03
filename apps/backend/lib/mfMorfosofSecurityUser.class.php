<?php
  class mfMorfosofSecurityUser extends sfGuardSecurityUser {
  	public function hasCredential($credential, $useAnd = true)
  	{
  		// regras de permissão são do tipo "modulo.accao", 
  		// podendo a acção ser * o que significa que utilizador pode executar todas as acções do módulo
  		if ( preg_match("/([a-z]+)\._?([a-z]+)/i", $credential, $resultado) ){
  			$modulo = $resultado[1];
  			$accao = $resultado[2];
  			if ( parent::hasCredential($modulo.'.'.$accao, $useAnd) ){
  				return true;
  			} else if ( parent::hasCredential($modulo.'.*', $useAnd) ){
  				return true;
  			} else {
  				return parent::hasCredential($credential, $useAnd);
  			}
  		}
  		
  		return parent::hasCredential($credential, $useAnd);
  	}
  	
  	public function hasModuleCredential($module, $action)
  	{
  		if ( $this->hasCredential($module.'.'.$action) || $this->hasCredential($module.'.*') ){
  			return true;
  		}else{
  		  return false;
  		}
  	}
  	
  	public function hasAtLeastOneCredential( Array $actions, $module ){
  		foreach($actions as $action){
  			if ( $this->hasModuleCredential($module, $action) ){
  				return true;
  			}
  		}
  		return false;
  	}
  }