<?php
class ObservationPhotoDorsalLeftMarkPeer extends BaseObservationPhotoDorsalLeftMarkPeer {
  public static function getObservationPhotoIds($markValues = NULL){
    $c = new Criteria();
    
      if($markValues){
      $c->addAnd(ObservationPhotoDorsalLeftMarkPeer::PATTERN_CELL_DORSAL_LEFT_ID, $markValues[0], Criteria::EQUAL);
      $c->addAnd(ObservationPhotoDorsalLeftMarkPeer::IS_WIDE, $markValues[1], Criteria::EQUAL);
      $c->addAnd(ObservationPhotoDorsalLeftMarkPeer::IS_DEEP, $markValues[2], Criteria::EQUAL);
      $c->addAnd(ObservationPhotoDorsalLeftMarkPeer::TO_CELL_ID, $markValues[3], Criteria::EQUAL);
      }

    $regs = self::doSelect($c);
    $ids = array();
    foreach( $regs as $reg ){
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
