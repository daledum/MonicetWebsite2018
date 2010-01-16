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
//  	$criteria = new Criteria();
//  	$criteria->addAnd(NewsArticlePeer::IS_PUBLISHED, true);
//  	$criteria->addAnd(NewsArticlePeer::ID, $this->getRoute()->getParameters());
//  	
//    $this->article = NewsArticlePeer::doSelectOne($criteria);
    $this->article = $this->getRoute()->getObject();
  }
  
  public function executeAll(sfWebRequest $request)
  {
  	/*
    $criteria = new Criteria();
    $criteria->addAnd(NewsArticlePeer::IS_PUBLISHED, true);
    
    $this->articles = NewsArticlePeer::doSelect($criteria);
    */
  	$criteria = new Criteria();
    $criteria->add(NewsArticlePeer::IS_PUBLISHED, true);
    $pager = new sfPropelPager('NewsArticle', 10);
    $pager->setCriteria($criteria);
    $pager->setPage($this->getRequestParameter('page', 1));
    $pager->init();
    $this->pager = $pager;
  }
}
