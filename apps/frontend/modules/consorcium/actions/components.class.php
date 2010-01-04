<?php

class consorciumComponents extends sfComponents
{
  public function executeConsorciumElements()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(ConsorciumElementPeer::ID);
    $this->consorcium_elements = ConsorciumElementPeer::doSelect($c);
  }
}