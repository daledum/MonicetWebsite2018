<?php

class consorciumComponents extends sfComponents
{
  public function executeConsorciumElements()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(ConsorciumElementPeer::ID);
    $c->setLimit(4);
    $this->consorcium_elements = ConsorciumElementPeer::doSelect($c);
  }
}