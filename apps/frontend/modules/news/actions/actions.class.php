<?php

/**
 * news actions.
 *
 * @package    monicet
 * @subpackage news
 * @author     Francisco Cardoso <franciscocardoso@morfose.net>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsActions extends sfActions
{
  public function preExecute()
  {
    $this->getResponse()->setSlot('active', 'news');
  }
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
    $this->article = $this->getRoute()->getObject();
  }
  
  public function executeAll(sfWebRequest $request){
    $this->pager = NewsArticlePeer::getPager();
  }
}
