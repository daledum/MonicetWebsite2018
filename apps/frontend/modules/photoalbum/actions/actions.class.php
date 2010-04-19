<?php

/**
 * photoalbum actions.
 *
 * @package    monicet
 * @subpackage photoalbum
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photoalbumActions extends sfActions
{
  public function preExecute()
  {
    $this->getResponse()->setSlot('active', 'album');
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = AlbumPeer::getPager();
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->album = $this->getRoute()->getObject();
  }
}
