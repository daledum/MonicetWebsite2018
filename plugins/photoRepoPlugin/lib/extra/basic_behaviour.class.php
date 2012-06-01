<?php
class basic_behaviour {
  const REST_SIGLA          = 'REST';
  const REST_DESC           = 'Descanso';
  const SOCIALIZATION_SIGLA = 'SOCIALIZATION';
  const SOCIALIZATION_DESC  = 'Socialização';
  const DISPLACEMENT_SIGLA  = 'DISPLACEMENT';
  const DISPLACEMENT_DESC   = 'Deslocação';
  const FEEDING_SIGLA       = 'FEEDING';
  const FEEDING_DESC        = 'Alimentação';
  
  public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
      $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::REST_SIGLA]          = self::REST_DESC;
    $resultados[self::SOCIALIZATION_SIGLA] = self::SOCIALIZATION_DESC;
    $resultados[self::DISPLACEMENT_SIGLA]  = self::DISPLACEMENT_DESC;
    $resultados[self::FEEDING_SIGLA]       = self::FEEDING_DESC;
    
    return $resultados;
  }
}

?>
