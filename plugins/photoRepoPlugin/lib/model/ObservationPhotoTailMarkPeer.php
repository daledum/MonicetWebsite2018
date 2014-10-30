<?php

class ObservationPhotoTailMarkPeer extends BaseObservationPhotoTailMarkPeer {
  public static function getObservationPhotoIds($markValues = NULL){
    $c = new Criteria();
    
    if($markValues){
      $c->addAnd(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, $markValues[0], Criteria::EQUAL);
      $c->addAnd(ObservationPhotoTailMarkPeer::IS_WIDE, $markValues[1], Criteria::EQUAL);
      $c->addAnd(ObservationPhotoTailMarkPeer::IS_DEEP, $markValues[2], Criteria::EQUAL);
      $c->addAnd(ObservationPhotoTailMarkPeer::TO_CELL_ID, $markValues[3], Criteria::EQUAL);
    }

    $regs = self::doSelect($c);
    $ids = array();
    foreach( $regs as $reg ){
      $OBPhoto = $reg->getObservationPhotoTail()->getObservationPhoto();
      if($OBPhoto){
          if( $OBPhoto->getStatus(ObservationPhoto::V_SIGLA) ) {
            if( !in_array($OBPhoto->getId(), $ids) ){
              $ids[] = $OBPhoto->getId();
            }
          }
      }
      else{
          $reg->getObservationPhotoTail()->delete();
      }
    }
    return $ids;
  }
} // ObservationPhotoTailMarkPeer
