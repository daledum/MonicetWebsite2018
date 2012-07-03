<?php


class ObservationPhoto extends BaseObservationPhoto {
    const FA_SIGLA  = 'for_approval';
    const FA_DESC   = 'Para aprovação';
    const A_SIGLA   = 'approved';
    const A_DESC    = 'Aprovado';

    public static function getForSelect($empty=false, $empty_msg = 'Todas', $empty_code = '' ){
    $resultados = array();
    if( $empty ) {
        $resultados[$empty_code] = '---'.$empty_msg.'---';
    }
    $resultados[self::FA_SIGLA] = self::FA_DESC;
    $resultados[self::A_SIGLA]  = self::A_DESC;

    return $resultados;
    }
    public function __toString() {
        return $this->getFileName();
    }
} // ObservationPhoto
