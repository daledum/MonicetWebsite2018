<?php

class ObservationPhotoDorsalRightMark extends BaseObservationPhotoDorsalRightMark {
  public function __toString(){
    $cell = ($this->getPatternCellDorsalRightId())? $this->getPatternCellDorsalRightRelatedByPatternCellDorsalRightId()->getName(): '';

    $isWide = ($this->getIsWide())? 'Larga, ': '';
    $isDeep = ($this->getIsDeep())? 'Estreita, ': '';
    
    $to = ($this->getToCellId())? sprintf('- %s', $this->getPatternCellDorsalRightRelatedByToCellId()->getName()): '';
    
    return sprintf("%s%s [%s%s]", $isWide, $isDeep, $cell, $to);
  }
} 
