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
        /*$mail = new sfMail();
        $mail->setCharset('utf-8');      
 
        $mail->setSender($this->webmaster, 'Monicet');
        $mail->setFrom($this->webmaster, 'Monicet');
        $mail->addReplyTo($this->webmaster);
 
        $mail->addAddress($request->getParameter('email'));
 
        $mail->setSubject($request->getParameter('subject'));
        $mail->setContentType('text/html');
        $mail->setBody($request->getParameter('message'));    
          
        $this->mail = $mail;    
        */
        $this->getUser()->setFlash('success', true);
      }
    }
  }

  public function executeSent(sfWebRequest $request)
  {
  }
}
