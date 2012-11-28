<?php


class ObservationPhoto extends BaseObservationPhoto {
  const NEW_SIGLA = 'new';
  const NEW_DESC  = 'Para caracterizar';
  const C_SIGLA   = 'characterized';
  const C_DESC    = 'Para identificar';
  const FA_SIGLA  = 'for_approval';
  const FA_DESC   = 'Para validar';
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
  public static function getForSelectForFilter($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
        $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::NEW_SIGLA] = self::NEW_DESC;
    $resultados[self::C_SIGLA] = self::C_DESC;
    $resultados[self::FA_SIGLA] = self::FA_DESC;

    return $resultados;
  }
  
  public static function getValueForSiglaStatus( $sigla ) {
    $resultados[self::NEW_SIGLA] = self::NEW_DESC;
    $resultados[self::C_SIGLA] = self::C_DESC;
    $resultados[self::FA_SIGLA] = self::FA_DESC;
    $resultados[self::V_SIGLA]  = self::V_DESC;
    return (isset($resultados[$sigla]))? $resultados[$sigla]: '';
  }
  
  public function __toString() {
      return $this->getFileName();
  }
  
  public function delete(PropelPDO $con = null) {
    if( $this->getStatus() != ObservationPhoto::V_SIGLA ) {
      $locationBegin = sfConfig::get('sf_upload_dir').'/pr_repo_final/';
      $fileAddresses = array(
          $locationBegin.'tn_130_120_'.$this->getFileName(),
          $locationBegin.'tn_165_150_'.$this->getFileName(),
          $locationBegin.'tn_200_'.$this->getFileName(),
          $locationBegin.$this->getFileName()
      ); 
      foreach( $fileAddresses as $fileAddress ) {
        if(file_exists($fileAddress) ) {
          system('rm '.$fileAddress);
        }
      }
      parent::delete();
    }
  }
} // ObservationPhoto
