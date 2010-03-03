<?php

require_once dirname(__FILE__).'/../lib/utilizadorGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/utilizadorGeneratorHelper.class.php';

/**
 * utilizador actions.
 *
 * @package    monicet
 * @subpackage utilizador
 * @author     Your name here
 * @version    morfose 1.4
 */
class utilizadorActions extends autoUtilizadorActions
{
  protected function getPager()
  {
    $pager = $this->configuration->getPager('sfGuardUser');
    
    $criteria = $this->buildCriteria();
    $sf_guard_user = $this->getUser()->getGuardUser();
    
    // retirar os super administradores da listagem a não ser que o utilizador seja um super administrador
    if ( ! $sf_guard_user->getIsSuperAdmin() ){
    	$criteria->add(sfGuardUserPeer::IS_SUPER_ADMIN, false);
    }
    // apenas listar os utilizadores da empresa
    if ( $sf_guard_user->hasPermission('boss') ){
    	$criteria->addJoin(sfGuardUserPeer::ID, CompanyUserPeer::USER_ID, Criteria::LEFT_JOIN);
    	$criteria->add(CompanyUserPeer::COMPANY_ID, $sf_guard_user->getCompaniesAsArray(), Criteria::IN);
    	$criteria->setDistinct();
    }
    // apenas listar o próprio perfil caso não seja super admin nem administrador nem boss
    if ( ! $sf_guard_user->getIsSuperAdmin() && ! $sf_guard_user->hasPermission('administrator') && ! $sf_guard_user->hasPermission('boss') ){
    	$criteria->add(sfGuardUserPeer::ID, $sf_guard_user->getId());
    }
    
    $pager->setCriteria($criteria);
    $pager->setPage($this->getPage());
    $pager->setPeerMethod($this->configuration->getPeerMethod());
    $pager->setPeerCountMethod($this->configuration->getPeerCountMethod());
    $pager->init();

    return $pager;
  }
  public function preExecute()
  {
  	parent::preExecute();
  	$request = $this->getRequest();
    $sf_guard_user = $this->getUser()->getGuardUser();
    
    // definir critérios de permissão para cada uma das acções
    switch( $this->getActionName() ){
    	case 'edit':
    	case 'update':
    		// ninguém que não seja super administrador pode editar um administrador
	    	$sf_guard_user->isEditingSuperAdmin($request->getParameter('id'));
	    	// se for um administrador, pode editar toda a gente excepto um super administrador que foi validado na anterior regra
	    	if ( $sf_guard_user->getIsSuperAdmin()
	    	  || ($sf_guard_user->hasPermission('administrator') && ! $sf_guard_user->isEditingSuperAdmin($request->getParameter('id'))
	    	  || ($sf_guard_user->hasPermission('boss') && $sf_guard_user->isColeague($request->getParameter('id')) ))
	    	  || $sf_guard_user->isSelf($request->getParameter('id'))){
	    	  	// do nothing
	    	}else{
	    		// redirect
	    		sfContext::getInstance()->getController()->redirect(sfConfig::get('sf_secure_module').'/'.sfConfig::get('sf_secure_action'));
	    	}
		    break;
    }
  }
}
