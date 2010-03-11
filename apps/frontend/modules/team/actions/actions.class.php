<?php

/**
 * team actions.
 *
 * @package    monicet
 * @subpackage team
 * @author     Francisco Cardoso <franciscocardoso@morfose.net>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class teamActions extends sfActions
{
  public function preExecute()
  {
    $this->getResponse()->setSlot('active', 'team');
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->active = "team";
  	$this->consorcium_elements = ConsorciumElementPeer::doSelectAll();
  	
  	$c = new Criteria();
	$c->add(TeamPeer::TYPE, 'investigador');
	$c->addAscendingOrderByColumn(TeamPeer::NAME);
  	
  	$this->local_researchers = TeamPeer::doSelect($c);
  	
  	$c->add(TeamPeer::TYPE, 'consultor');
  	$this->consultants = TeamPeer::doSelect($c);
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->element = $this->getRoute()->getObject();
  }
}
