<?php

class BodyPartForm extends BaseBodyPartForm
{
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('bodyPart');
    
    unset($this['created_at'], $this['updated_at']);
    
    $this->embedI18n(array('pt', 'en'));
  }
}
