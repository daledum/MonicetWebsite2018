<?php

class Individual extends BaseIndividual {
  public function __toString() {
    return $this->getName();
  }
} // Individual
