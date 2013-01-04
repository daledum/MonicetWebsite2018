<?php

class ContactForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'subject'    => new sfWidgetFormInput(),
      'email'   => new sfWidgetFormInput(),
      'message' => new sfWidgetFormTextarea(),
      'captcha' => new sfWidgetFormReCaptcha(array('public_key' => sfConfig::get('app_recaptcha_public_key')), array('required'=> false))
    ));
    $this->widgetSchema->setNameFormat('contact[%s]');
    $this->widgetSchema->setLabel('captcha', ' ');
    
    $this->setValidators(array(
      'subject' => new sfValidatorString(array('trim' => true)),
      'email'   => new sfValidatorEmail(array()),
      'message' => new sfValidatorString(array('trim' => true)),
      'captcha' =>new sfValidatorReCaptcha(array('private_key' => sfConfig::get('app_recaptcha_private_key')), array('captcha' => 'captcha_error'))
    ));
    
  }
}