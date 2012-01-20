<?php


class BehaviourPeer extends BaseBehaviourPeer {
  public static function getByCode($code){
    $c = new Criteria();
    $c->add(BehaviourPeer::CODE, $code);
    $b = BehaviourPeer::doSelect($c);
    if(count($b)) {
      return $b[0];
    }
    else{
      return false;
    }
  }
  
  public static function getByCode2( $code ){
    return BehaviourQuery::create()->filterByCode($code)->findOne();
  }
  
  public static function getBehaviours(){
    $c = new Criteria();
    $c->addAscendingOrderByColumn(BehaviourPeer::ID);
    return BehaviourPeer::doSelect($c);
  }
  
  
  
} // BehaviourPeer
