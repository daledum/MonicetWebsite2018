<?php
class age_group {
  const CUB_SIGLA       = 'CUB';
  const CUB_DESC        = 'Cria';
  const JUVENILE_SIGLA  = 'JUVENILE';
  const JUVENILE_DESC   = 'Juvenil';
  const ADULT_SIGLA     = 'ADULT';
  const ADULT_DESC      = 'Adulto';
  
  public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
      $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::CUB_SIGLA] = self::CUB_DESC;
    $resultados[self::JUVENILE_SIGLA] = self::JUVENILE_DESC;
    $resultados[self::ADULT_SIGLA] = self::ADULT_DESC;
    
    return $resultados;
  }
  
  public static function getValueForSigla( $sigla ) {
    $resultados[self::CUB_SIGLA] = self::CUB_DESC;
    $resultados[self::JUVENILE_SIGLA] = self::JUVENILE_DESC;
    $resultados[self::ADULT_SIGLA] = self::ADULT_DESC;
    return isset($resultados[$sigla])? $resultados[$sigla]: '';
  }
}

?>
