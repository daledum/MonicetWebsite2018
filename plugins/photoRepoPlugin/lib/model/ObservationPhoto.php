<?php


class ObservationPhoto extends BaseObservationPhoto {
  const NEW_SIGLA = 'new';
  const NEW_DESC  = 'Nova';
  const C_SIGLA   = 'Characterized';
  const C_DESC    = 'Caracterizada';
  const FA_SIGLA  = 'for_approval';
  const FA_DESC   = 'Para aprovação';
  const V_SIGLA   = 'validated';
  const V_DESC    = 'Validada';

  public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
        $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::NEW_SIGLA] = self::NEW_DESC;
    $resultados[self::C_SIGLA] = self::C_DESC;
    $resultados[self::FA_SIGLA] = self::FA_DESC;
    $resultados[self::V_SIGLA]  = self::V_DESC;

    return $resultados;
  }
  
  public static function getDescription( $sigla ) {
    $resultados[self::NEW_SIGLA] = self::NEW_DESC;
    $resultados[self::C_SIGLA] = self::C_DESC;
    $resultados[self::FA_SIGLA] = self::FA_DESC;
    $resultados[self::V_SIGLA]  = self::V_DESC;
    return (isset($resultados[$sigla]))? $resultados[$sigla]: '';
  }
  
  public function __toString() {
      return $this->getFileName();
  }
} // ObservationPhoto
