<?php
class ObservationPhotoDorsalLeftMarkPeer extends BaseObservationPhotoDorsalLeftMarkPeer {
  public static function getObservationPhotoIds($mark = NULL){
    $c = new Criteria();
    
      if($mark){
        $c->addAnd(ObservationPhotoDorsalLeftMarkPeer::PATTERN_CELL_DORSAL_LEFT_ID, $mark->getPatternCellDorsalLeftId(), Criteria::EQUAL);
        $c->addAnd(ObservationPhotoDorsalLeftMarkPeer::IS_WIDE, $mark->getIsWide(), Criteria::EQUAL);
        $c->addAnd(ObservationPhotoDorsalLeftMarkPeer::IS_DEEP, $mark->getIsDeep(), Criteria::EQUAL);
        if($mark->getToCellId()){
        $c->addAnd(ObservationPhotoDorsalLeftMarkPeer::TO_CELL_ID, $mark->getToCellId(), Criteria::EQUAL);
        }
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
