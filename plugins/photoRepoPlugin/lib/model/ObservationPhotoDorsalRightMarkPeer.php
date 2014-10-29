<?php
class ObservationPhotoDorsalRightMarkPeer extends BaseObservationPhotoDorsalRightMarkPeer {
  public function __toString(){
    $cell = ($this->getPatternCellDorsalRightId())? $this->getPatternCellTailRelatedByPatternCellDorsalRightId()->getName(): '';
    
    $isWide = ($this->getIsWide())? 'Larga, ': '';
    $isDeep = ($this->getIsDeep())? 'Estreita, ': '';
    
    $to = ($this->getToCellId())? sprintf('- %s', $this->getPatternCellDorsalRightRelatedByToCellId()->getName()): '';
    
    return sprintf("%s%s [%s%s]", $isWide, $isDeep, $cell, $to);
  }
  
  public static function getObservationPhotoIds($markValues = NULL){
    $c = new Criteria();
    
    if($markValues){
      $c->addAnd(ObservationPhotoDorsalRightMarkPeer::PATTERN_CELL_DORSAL_RIGHT_ID, $markValues[0], Criteria::EQUAL);
      $c->addAnd(ObservationPhotoDorsalRightMarkPeer::IS_WIDE, $markValues[1], Criteria::EQUAL);
      $c->addAnd(ObservationPhotoDorsalRightMarkPeer::IS_DEEP, $markValues[2], Criteria::EQUAL);
      $c->addAnd(ObservationPhotoDorsalRightMarkPeer::TO_CELL_ID, $markValues[3], Criteria::EQUAL);
    }

    $regs = self::doSelect($c);
    $ids = array();
    foreach( $regs as $reg ){
      $OBPhoto = $reg->getObservationPhotoDorsalRight()->getObservationPhoto();
      if($OBPhoto){
        if( $OBPhoto->getStatus(ObservationPhoto::V_SIGLA) ) {
          if( !in_array($OBPhoto->getId(), $ids) ){
            $ids[] = $OBPhoto->getId();
          }
        }
      }
      else{
        $reg->getObservationPhotoDorsalRight()->delete();
      }
    }
    return $ids;
  }
} // ObservationPhotoDorsalRightMarkPeer
