<?php
  class mainComponents extends sfComponents {
  	public function executeMenu(){
  		$this->administrador = $this->getUser()->getGuardUser()->getIsSuperAdmin();
  	}
    public function executeMenu_utilizador(){
      $this->menus = mfMenuPeer::getMenusAsArray();
    }
  }