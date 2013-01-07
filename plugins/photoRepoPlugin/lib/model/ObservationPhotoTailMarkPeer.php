<?php

class ObservationPhotoTailMarkPeer extends BaseObservationPhotoTailMarkPeer {
  public static function getAllObservationPhotoIds(){
    $all_regs = self::doSelect(new Criteria());
    $ids = array();
    foreach( $all_regs as $reg ){
      $OBPhoto = $reg->getObservationPhotoTail()->getObservationPhoto();
      if( $OBPhoto->getStatus(ObservationPhoto::V_SIGLA) ) {
        if( !in_array($OBPhoto->getId(), $ids) ){
          $ids[] = $OBPhoto->getId();
        }
      }
    }
    return $ids;
  }
} // ObservationPhotoTailMarkPeer
