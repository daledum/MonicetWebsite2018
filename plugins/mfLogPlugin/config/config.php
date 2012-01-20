<?php
  $this->dispatcher->connect('application.throw_exception', array('mfLogPeer', 'excepcao'));
  $this->dispatcher->connect('controller.page_not_found', array('mfLogPeer', 'pageNotFound'));