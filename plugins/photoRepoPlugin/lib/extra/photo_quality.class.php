<?php
class photo_quality {
  const LOW_SIGLA    = 'LOW';
  const LOW_DESC     = 'Baixa';
  const NORMAL_SIGLA = 'NORMAL';
  const NORMAL_DESC  = 'Normal';
  const HIGH_SIGLA   = 'HIGH';
  const HIGH_DESC    = 'Alta';
  
  public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
      $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::LOW_SIGLA]    = self::LOW_DESC;
    $resultados[self::NORMAL_SIGLA] = self::NORMAL_DESC;
    $resultados[self::HIGH_SIGLA]   = self::HIGH_DESC;
    
    return $resultados;
  }
  
  public static function getValueForSigla( $sigla ) {
    $resultados[self::LOW_SIGLA]    = self::LOW_DESC;
    $resultados[self::NORMAL_SIGLA] = self::NORMAL_DESC;
    $resultados[self::HIGH_SIGLA]   = self::HIGH_DESC;
    return isset($resultados[$sigla])? $resultados[$sigla]: '';
  }
}

?>
