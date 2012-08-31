<?php

class ObservationPhotoTailMark extends BaseObservationPhotoTailMark {
  public function __toString(){
    $cell = ($this->getPatternCellTailId())? $this->getPatternCellTailRelatedByPatternCellTailId()->getName(): '';
    
    $isWide = ($this->getIsWide())? 'Larga, ': '';
    $isDeep = ($this->getIsDeep())? 'Estreita, ': '';
    
    $to = ($this->getToCellId())? sprintf('- %s', $this->getPatternCellTailRelatedByToCellId()->getName()): '';
    
    return sprintf("%s%s [%s%s]", $isWide, $isDeep, $cell, $to);
  }
} 
