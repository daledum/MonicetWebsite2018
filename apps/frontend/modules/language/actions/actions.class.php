<?php

/**
 * language actions.
 *
 * @package    monicet
 * @subpackage language
 * @author     Francisco Cardoso <franciscocardoso@morfose.net>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class languageActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeChange(sfWebRequest $request)
  {
  	if ($request->getParameter('sf_culture'))
    {
  	  $this->getUser()->setCulture($request->getParameter('sf_culture'));
    }
    
    $this->redirect('@homepage');
  }
}
