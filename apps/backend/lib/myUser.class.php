<?php

class myUser extends sfGuardSecurityUser
{
  public function __toString(){
    return $this->isAuthenticated() ? $this->getGuardUser()->getUsername() : "guest";
  }
}
