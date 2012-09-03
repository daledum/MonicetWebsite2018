<?php

class ObservationPhotoDorsalLeftMark extends BaseObservationPhotoDorsalLeftMark {
  public function __toString(){
    $cell = ($this->getPatternCellDorsalLeftId())? $this->getPatternCellDorsalLeftRelatedByPatternCellDorsalLeftId()->getName(): '';
    
    $isWide = ($this->getIsWide())? 'Larga, ': '';
    $isDeep = ($this->getIsDeep())? 'Estreita, ': '';
    
    $to = ($this->getToCellId())? sprintf('- %s', $this->getPatternCellDorsalLeftRelatedByToCellId()->getName()): '';
    
    return sprintf("%s%s [%s%s]", $isWide, $isDeep, $cell, $to);
  }
} 
