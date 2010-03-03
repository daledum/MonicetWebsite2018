<?php
  class mfMorfosofPermissao {
  	public static function filtrar( Array $accoes )
  	{
      $contexto = sfContext::getInstance();
      $user = $contexto->getUser();
      $modulo = $contexto->getModuleName();
      
      foreach( $accoes as $opcao => $configuracao ){
        $accao = $accao === 'list' ? 'index' : $accao;
        if ( !$user->hasCredential($modulo.'.'.$accao) && !$user->hasCredential($modulo.'.*') ){
        	unset($accoes[$opcao]);
        }
      }
      return $accoes;
  	}
  }