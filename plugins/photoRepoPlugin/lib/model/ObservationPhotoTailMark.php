<?php

class ObservationPhotoTailMark extends BaseObservationPhotoTailMark {
  public function __toString(){
    $cell = ($this->getPatternCellTailId())? $this->getPatternCellTailRelatedByPatternCellTailId()->getName(): '';
    
    $isWide = ($this->getIsWide())? 'Larga, ': '';
    $isDeep = ($this->getIsDeep())? 'Estreita, ': '';
    
    $from = ($this->getContinuesFromCellId())? sprintf('[%s', $this->getPatternCellTailRelatedByContinuesFromCellId()->getName()): '';
    $to = ($this->getContinuesOnCellId())? sprintf('%s]', $this->getPatternCellTailRelatedByContinuesOnCellId()->getName()): '';
    
    return sprintf("%s, %s%s%s%s", $cell, $isWide, $isDeep, $from, $to);
  }
} 
