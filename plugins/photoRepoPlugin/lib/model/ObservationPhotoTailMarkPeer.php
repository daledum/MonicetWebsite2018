<?php

class ObservationPhotoTailMarkPeer extends BaseObservationPhotoTailMarkPeer {
  public static function getObservationPhotoIds($mark = NULL){
    $c = new Criteria();
    
    if($mark){
      $c->addAnd(ObservationPhotoTailMarkPeer::PATTERN_CELL_TAIL_ID, $mark->getPatternCellTailId(), Criteria::EQUAL);
      $c->addAnd(ObservationPhotoTailMarkPeer::IS_WIDE, $mark->getIsWide(), Criteria::EQUAL);
      $c->addAnd(ObservationPhotoTailMarkPeer::IS_DEEP, $mark->getIsDeep(), Criteria::EQUAL);
      if($mark->getToCellId()){
      $c->addAnd(ObservationPhotoTailMarkPeer::TO_CELL_ID, $mark->getToCellId(), Criteria::EQUAL);
      }
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
