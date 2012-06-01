<?php
class island {
  const SMG_SIGLA  = 'SMG';
  const SMG_DESC   = 'São Miguel';
  const SMA_SIGLA  = 'SMA';
  const SMA_DESC   = 'Santa Maria';
  const TER_SIGLA  = 'TER';
  const TER_DESC   = 'Terceira';
  const GRA_SIGLA  = 'GRA';
  const GRA_DESC   = 'Graciosa';
  const SJO_SIGLA  = 'SJO';
  const SJO_DESC   = 'São Jorge';
  const PIC_SIGLA  = 'PIC';
  const PIC_DESC   = 'Pico';
  const FAI_SIGLA  = 'FAI';
  const FAI_DESC   = 'Faial';
  const FLO_SIGLA  = 'FLO';
  const FLO_DESC   = 'Flores';
  const COR_SIGLA  = 'COR';
  const COR_DESC   = 'Corvo';

  public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
      $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::SMG_SIGLA] = self::SMG_DESC;
    $resultados[self::SMA_SIGLA] = self::SMA_DESC;
    $resultados[self::TER_SIGLA] = self::TER_DESC;
    $resultados[self::GRA_SIGLA] = self::GRA_DESC;
    $resultados[self::SJO_SIGLA] = self::SJO_DESC;
    $resultados[self::PIC_SIGLA] = self::PIC_DESC;
    $resultados[self::FAI_SIGLA] = self::FAI_DESC;
    $resultados[self::FLO_SIGLA] = self::FLO_DESC;
    $resultados[self::COR_SIGLA] = self::COR_DESC;
    
    return $resultados;
  }
}

?>
