<?php
class gender {
  const M_SIGLA  = 'M';
  const M_DESC   = 'Masculino';
  const F_SIGLA  = 'F';
  const F_DESC   = 'Feminino';

  public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
      $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::M_SIGLA] = self::M_DESC;
    $resultados[self::F_SIGLA] = self::F_DESC;
    
    return $resultados;
  }
}

?>
