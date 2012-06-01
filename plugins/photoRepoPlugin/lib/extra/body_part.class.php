<?php
class body_part {
  const F_SIGLA    = 'F';
  const F_DESC     = 'Barbatana Caudal';
  const FR_SIGLA   = 'FR';
  const FR_DESC    = 'Parte direita da barbatana caudal';
  const FL_SIGLA   = 'FL';
  const FL_DESC    = 'Parte esquerda da barbatana caudal';
  const L_SIGLA    = 'L';
  const L_DESC     = 'Lado esquerdo da barbatana dorsal';
  const R_SIGLA    = 'R';
  const R_DESC     = 'Lado direito da barbatana dorsal';
  const TS_SIGLA   = 'TS';
  const TS_DESC    = 'Corpo da cauda';
  const G_SIGLA    = 'G';
  const G_DESC     = 'Sexo';
  const P_SIGLA    = 'P';
  const P_DESC     = 'Barbatana peitoral';
  const BY_SIGLA   = 'BY';
  const BY_DESC    = 'Corpo';
  const H_SIGLA    = 'H';
  const H_DESC     = 'Cabeça';
  const O_SIGLA    = 'O';
  const O_DESC     = 'Outro';
  const S_SIGLA    = 'S';
  const S_DESC     = 'Cicatriz invulgar';
  const B_SIGLA    = 'B';
  const B_DESC     = 'Biópsia';

  public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
      $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::F_SIGLA] = self::F_DESC;
    $resultados[self::FR_SIGLA] = self::FR_DESC;
    $resultados[self::FL_SIGLA] = self::FL_DESC;
    $resultados[self::L_SIGLA] = self::L_DESC;
    $resultados[self::R_SIGLA] = self::R_DESC;
    $resultados[self::TS_SIGLA] = self::TS_DESC;
    $resultados[self::G_SIGLA] = self::G_DESC;
    $resultados[self::P_SIGLA] = self::P_DESC;
    $resultados[self::BY_SIGLA] = self::BY_DESC;
    $resultados[self::H_SIGLA] = self::H_DESC;
    $resultados[self::O_SIGLA] = self::O_DESC;
    $resultados[self::S_SIGLA] = self::S_DESC;
    $resultados[self::B_SIGLA] = self::B_DESC;
    
    return $resultados;
  }
}

?>
