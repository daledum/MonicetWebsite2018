<?php

class BodyPartPeer extends BaseBodyPartPeer {
  public static function getForSelect($with_empty = false, $empty_msg = 'Todas', $empty_code = '' ) {
    $objectos = BodyPartQuery::create()->find();
    
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
} // BodyPartPeer
