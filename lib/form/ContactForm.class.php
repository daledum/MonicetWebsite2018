<?php

class ContactForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'subject'    => new sfWidgetFormInput(),
      'email'   => new sfWidgetFormInput(),
      'message' => new sfWidgetFormTextarea()
    ));
    $this->widgetSchema->setNameFormat('contact[%s]');
    
    $this->setValidators(array(
      'subject' => new sfValidatorString(array('trim' => true) 
                                         ),
      'email'   => new sfValidatorEmail(array()),
      'message' => new sfValidatorString(array('trim' => true)),
    ));
  }
}