<?php

class Pattern extends BasePattern {
  public function __toString() {
    return $this->getSpecie()->formattedString();
  }
  
  public function tailAreasToString() {
    $str = '';
    $pattern_cell_names = array();
    foreach( $this->getPatternCellTails() as $cell ) {
      $pattern_cell_names[] = $cell->getName();
    }
    $str = join(', ', $pattern_cell_names);
    
    return $str;
  }
  
  public function dorsalRightAreasToString() {
    $str = '';
    $pattern_cell_names = array();
    foreach( $this->getPatternCellDorsalRights() as $cell ) {
      $pattern_cell_names[] = $cell->getName();
    }
    $str = join(', ', $pattern_cell_names);
    
    return $str;
  }
  
  public function dorsalLeftAreasToString() {
    $str = '';
    $pattern_cell_names = array();
    foreach( $this->getPatternCellDorsalLefts() as $cell ) {
      $pattern_cell_names[] = $cell->getName();
    }
    $str = join(', ', $pattern_cell_names);
    
    return $str;
  }
} // Pattern
