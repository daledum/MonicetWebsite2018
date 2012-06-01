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
  
  public static function getForSelect($with_empty = false, $empty_msg = 'Todas', $empty_code = '' ) {
    $objectos = BehaviourQuery::create()->useBehaviourI18nQuery()->filterByCulture('pt')->orderByDescription()->endUse()->find();
    
    if($with_empty) {
      return self::fromObjectosToArray($objectos, $empty=true, $empty_msg, $empty_code);
    } 
    return self::fromObjectosToArray($objectos, $empty=false, $empty_msg, $empty_code);
  }
  
  public static function fromObjectosToArray( $objectos, $empty = false, $empty_msg = 'Todas', $empty_code = '' ) {
    $resultados = array();
    if( $empty ) {
      $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    foreach( $objectos as $objecto ) {
        $resultados[$objecto->getId()] = $objecto->getCode().' - '. $objecto->getDescription('pt');
    }
    return $resultados;
  }
  
} // BehaviourPeer
