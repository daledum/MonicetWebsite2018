<?php

class backendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
  	$this->dispatcher->connect('user.save', array('UserPeer', 'setPermissions'));
  }
}
