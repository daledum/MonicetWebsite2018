<?php

/**
 * contacts actions.
 *
 * @package    monicet
 * @subpackage contacts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactsActions extends sfActions
{
  public function preExecute()
  {
    $this->getResponse()->setSlot('active', 'contacts');
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->form = new ContactForm();
  	$this->webmaster = sfConfig::get('app_mail_webmaster');
  	$this->active = "contacts";
  }
  
  public function executeSubmit(sfWebRequest $request)
  {
  	$this->forward404Unless($request->isMethod('post'));
    
    if($request->getParameter('message') != "" && $request->getParameter('subject') != "" && $request->getParameter('email') != "")
    {
	   mail(sfConfig::get('app_mail_webmaster'), $request->getParameter('subject'), $request->getParameter('message'), "From: " . $request->getParameter('email'));
	   $this->redirect('contacts/sent');
	}
	$this->redirect('contacts/index');
  }
  
  public function executeSent(sfWebRequest $request)
  {
  }
}
