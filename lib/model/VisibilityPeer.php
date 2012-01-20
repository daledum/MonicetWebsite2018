<?php

class VisibilityPeer extends BaseVisibilityPeer {
  public static function getByCode($code){
    return VisibilityQuery::create()->filterByCode($code)->findOne();
  }
  
  public static function getVisibilities(){
    $c = new Criteria();
    $c->addAscendingOrderByColumn(VisibilityPeer::ID);
    return VisibilityPeer::doSelect($c);
  }
  
  
} // VisibilityPeer
