<?php

/**
 * background actions.
 *
 * @package    monicet
 * @subpackage background
 * @author     Francisco Cardoso <franciscocardoso@morfose.net>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class backgroundActions extends sfActions
{
  public function preExecute()
  {
    $this->getResponse()->setSlot('active', 'background');
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->active = "background";
  }
}
