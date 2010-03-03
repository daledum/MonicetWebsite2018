<?php

class myUser extends mfMorfosofSecurityUser
{
  public function __toString(){
    return $this->isAuthenticated() ? $this->getGuardUser()->getUsername() : "guest";
  }
}
