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

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('contact'));

      if ($this->form->isValid())
      {
        $message = $this->getMailer()->compose(
          $this->webmaster,
          $request->getParameter('email'),
          "[Sítio Web Monicet] " . $request->getParameter('subject'),
          $request->getParameter('message') . "<br /><br />Enviado em: " . date("Y-m-d H:i")
        );
 
        $this->getMailer()->send($message);
      	
        $this->getUser()->setFlash('success', true);
        $this->redirect('@contacts');
      }
    }
  }
}
