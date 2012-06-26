<?php
class Sighting extends BaseSighting {

  public function __toString() {
    return $this->getId();
  }
} // Sighting
