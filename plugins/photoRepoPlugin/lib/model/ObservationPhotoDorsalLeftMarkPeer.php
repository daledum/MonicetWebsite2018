<?php
class ObservationPhotoDorsalLeftMarkPeer extends BaseObservationPhotoDorsalLeftMarkPeer {
  public static function getAllObservationPhotoIds(){
    $all_regs = self::doSelect(new Criteria());
    $ids = array();
    foreach( $all_regs as $reg ){
      $OBPhoto = $reg->getObservationPhotoDorsalLeft()->getObservationPhoto();
      if($OBPhoto){
        if( $OBPhoto->getStatus(ObservationPhoto::V_SIGLA) ) {
          if( !in_array($OBPhoto->getId(), $ids) ){
            $ids[] = $OBPhoto->getId();
          }
        }
      }
      else{
        $reg->getObservationPhotoDorsalLeft()->delete();
      }
    }
    return $ids;
  }
} // ObservationPhotoDorsalLeftMarkPeer
