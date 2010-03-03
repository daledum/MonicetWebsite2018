<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUser.php 7634 2008-02-27 18:01:40Z fabien $
 */
class sfGuardUser extends PluginsfGuardUser
{
	public function getName()
	{
		return $this->getProfile()->getName();
	}
  public function getLastname()
  {
    return $this->getProfile()->getLastname();
  }
  public function isEditingSuperAdmin($id)
  {
    $user = sfGuardUserPeer::retrieveByPk($id);
    return ( $user && $user->getIsSuperAdmin() );
  }
  /*
   * método que retorna true se um $id em pelo menos uma das empresa em que o utilizador da sessão trabalha
   */
  public function isColeague($id)
  {
    $c = new Criteria();
    $c->add(CompanyUserPeer::USER_ID, $id);
    $c->add(CompanyUserPeer::COMPANY_ID, $this->getCompaniesAsArray(), Criteria::IN);
    
    return (CompanyUserPeer::doCount($c) > 0);
  }
  public function isSelf($id)
  {
  	return (sfContext::getInstance()->getUser()->getGuardUser()->getId() == $id);
  }
  public function getCompaniesAsArray()
  {
  	$companies = array();
  	foreach( $this->getCompanyUsers() as $cu ){
  		$companies[] = $cu->getCompany()->getId();
  	}
  	return $companies;
  }
}
