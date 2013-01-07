<?php
class ObservationPhotoDorsalRightMarkPeer extends BaseObservationPhotoDorsalRightMarkPeer {
  public function __toString(){
    $cell = ($this->getPatternCellDorsalRightId())? $this->getPatternCellTailRelatedByPatternCellDorsalRightId()->getName(): '';
    
    $isWide = ($this->getIsWide())? 'Larga, ': '';
    $isDeep = ($this->getIsDeep())? 'Estreita, ': '';
    
    $to = ($this->getToCellId())? sprintf('- %s', $this->getPatternCellDorsalRightRelatedByToCellId()->getName()): '';
    
    return sprintf("%s%s [%s%s]", $isWide, $isDeep, $cell, $to);
  }
  
  public static function getAllObservationPhotoIds(){
    $all_regs = self::doSelect(new Criteria());
    $ids = array();
    foreach( $all_regs as $reg ){
      $OBPhoto = $reg->getObservationPhotoDorsalRight()->getObservationPhoto();
      if( $OBPhoto->getStatus(ObservationPhoto::V_SIGLA) ) {
        if( !in_array($OBPhoto->getId(), $ids) ){
          $ids[] = $OBPhoto->getId();
        }
      }
    }
    return $ids;
  }
} // ObservationPhotoDorsalRightMarkPeer
