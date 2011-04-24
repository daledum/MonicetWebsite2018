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
    $this->content = ContentPeer::getContent('Contacts');

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('contact'));

      if ($this->form->isValid())
      {
        $message = $this->getMailer()->compose(
          $this->webmaster,
          $this->webmaster,
          "[Sítio Web Monicet] " . $this->form->getValue('subject'),
          $this->form->getValue('message') . "\n\nEnviado em: " . date("Y-m-d H:i") . " por " . $this->form->getValue('email') 
        );
        //$message->addCc($this->form->getValue('email'));
      	$message->addBcc('titomiguelcosta@morfose.net');
        
        $this->getMailer()->send($message);
        
        $this->getUser()->setFlash('success', true);
        $this->redirect('@contacts');
      }
    }
  }
}
