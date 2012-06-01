<?php
class PhotographerForm extends BasePhotographerForm
{
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('photographer');
    
    unset($this['created_at'], $this['updated_at']);
  }
}
