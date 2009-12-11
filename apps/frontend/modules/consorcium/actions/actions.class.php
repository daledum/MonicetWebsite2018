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
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeShow(sfWebRequest $request)
  {
  	$this->element = ConsorciumElementPeer::retrieveByPK($request->getParameter('partner'));
  }
}
