<?php

class publicPicturesActions extends sfActions
{
  public function preExecute()
  {
    $this->getResponse()->setSlot('active', 'sendPictures');
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new UploadedPhotoForm();
    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('uploaded_photo'), $request->getFiles('uploaded_photo'));
      if ($this->form->isValid()) {
        $this->form->save();
        $this->getUser()->setFlash('success', true);
        $this->redirect('@send_pictures');
      }
    }
    
    /*  
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
    */
  }
}
