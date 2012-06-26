<?php

class publicationMainActions extends sfActions
{
  public function preExecute() {
    $this->getResponse()->setSlot('active', 'publication');
  }
  
  public function executeIndex(sfWebRequest $request) {
    $this->pager = PublicationPeer::getPager();
  }
  
}
