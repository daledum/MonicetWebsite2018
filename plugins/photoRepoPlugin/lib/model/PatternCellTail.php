<?php
class PatternCellTail extends BasePatternCellTail {
  public function __toString(){
    return $this->getName();
  }
} // PatternCellTail
