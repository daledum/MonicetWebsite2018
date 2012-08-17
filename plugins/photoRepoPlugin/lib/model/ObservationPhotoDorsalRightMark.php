<?php

class ObservationPhotoDorsalRightMark extends BaseObservationPhotoDorsalRightMark {
  public function __toString(){
    $cell = ($this->getPatternCellDorsalRightId())? $this->getPatternCellTailRelatedByPatternCellDorsalRightId()->getName(): '';
    
    $isWide = ($this->getIsWide())? 'Larga, ': '';
    $isDeep = ($this->getIsDeep())? 'Estreita, ': '';
    
    $from = ($this->getContinuesFromCellId())? sprintf('[%s', $this->getPatternCellDorsalRightRelatedByContinuesFromCellId()->getName()): '';
    $to = ($this->getContinuesOnCellId())? sprintf('%s]', $this->getPatternCellDorsalRightRelatedByContinuesOnCellId()->getName()): '';
    
    return sprintf("%s, %s%s%s%s", $cell, $isWide, $isDeep, $from, $to);
  }
} 
