<?php
class kind_of_photo {
  const BACKLIGHT_SIGLA = 'BACKLIGHT';
  const BACKLIGHT_DESC  = 'Contraluz';
  const NORMAL_SIGLA    = 'NORMAL';
  const NORMAL_DESC     = 'Normal';
  const BAD_ANGLE_SIGLA = 'BAD_ANGLE';
  const BAD_ANGLE_DESC  = 'Ângulo mau';
  const OTHERS_SIGLA    = 'OTHERS';
  const OTHERS_DESC     = 'Outros';
  
  public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
      $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::BACKLIGHT_SIGLA] = self::BACKLIGHT_DESC;
    $resultados[self::NORMAL_SIGLA]    = self::NORMAL_DESC;
    $resultados[self::BAD_ANGLE_SIGLA] = self::BAD_ANGLE_DESC;
    $resultados[self::OTHERS_SIGLA]    = self::OTHERS_DESC;
    
    return $resultados;
  }
}

?>
