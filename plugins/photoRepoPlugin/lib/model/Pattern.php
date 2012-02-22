<?php

class Pattern extends BasePattern {
  public function __toString() {
    return $this->getSpecie()->formattedString();
  }
} // Pattern
