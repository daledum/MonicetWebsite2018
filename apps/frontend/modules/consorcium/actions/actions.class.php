<?php

/**
 * consorcium actions.
 *
 * @package    monicet
 * @subpackage consorcium
 * @author     Francisco Cardoso <franciscocardoso@morfose.net>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class consorciumActions extends sfActions
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
    $this->consorcium_elements = ConsorciumElementPeer::doSelectAll();
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->element = $this->getRoute()->getObject();
  }
}
