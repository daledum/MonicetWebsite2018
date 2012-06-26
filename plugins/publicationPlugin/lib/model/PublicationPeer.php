<?php

class PublicationPeer extends BasePublicationPeer {
  public static function getCriteria() {
    $user = sfContext::getInstance()->getUser();
    $request = sfContext::getInstance()->getRequest();
    
    $criteria = PublicationQuery::create()
      ->filterByIsActive(true)
      ->orderByOrder('asc');
    return $criteria;
  }
  
  public static function getPager()
  {     
    $request = sfContext::getInstance()->getRequest();
    $criteria = self::getCriteria();
    return $criteria->paginate($request->getParameter('page', 1), 4);
  }
} // PublicationPeer
