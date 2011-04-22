<?php

/**
 * home actions.
 *
 * @package    monicet
 * @subpackage home
 * @author     Francisco Cardoso <franciscocardoso@morfose.net>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
	
  public function preExecute()
  {
    $this->getResponse()->setSlot('active', 'home');
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->content = ContentPeer::getContent('Home');
  }
  public function executeInquerito(sfWebRequest $request)
  {
  }
  public function executeError404(sfWebRequest $request)
  {
  }
  public function executeLanguage(sfWebRequest $request)
  {
  	if ( ! $this->getUser()->getCulture() ){
  	  $this->getUser()->setCulture(sfConfig::get('sf_default_culture'));
  	}
  	$this->redirect('@index');
  }
}
