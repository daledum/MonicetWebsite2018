<?php

class consorciumComponents extends sfComponents
{
  public function executeConsorciumElements()
  {
    $this->consorcium_elements = ConsorciumElementPeer::doSelectAll();
  }
}