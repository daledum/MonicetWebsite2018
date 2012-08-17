<?php

class ObservationPhotoDorsalLeftMark extends BaseObservationPhotoDorsalLeftMark {
  public function __toString(){
    $cell = ($this->getPatternCellDorsalLeftId())? $this->getPatternCellTailRelatedByPatternCellDorsalLeftId()->getName(): '';
    
    $isWide = ($this->getIsWide())? 'Larga, ': '';
    $isDeep = ($this->getIsDeep())? 'Estreita, ': '';
    
    $from = ($this->getContinuesFromCellId())? sprintf('[%s', $this->getPatternCellDorsalLeftRelatedByContinuesFromCellId()->getName()): '';
    $to = ($this->getContinuesOnCellId())? sprintf('%s]', $this->getPatternCellDorsalLeftRelatedByContinuesOnCellId()->getName()): '';
    
    return sprintf("%s, %s%s%s%s", $cell, $isWide, $isDeep, $from, $to);
  }
} 
