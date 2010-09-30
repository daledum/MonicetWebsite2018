<?php

class Code extends BaseCode {
  public function __toString()
  {
    return $this->getAcronym();
  }
} // Code
