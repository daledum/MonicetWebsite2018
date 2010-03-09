<?php

class ContactForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'subject'    => new sfWidgetFormInput(),
      'email'   => new sfWidgetFormInput(),
      'message' => new sfWidgetFormTextarea(),
    ));
  }
}