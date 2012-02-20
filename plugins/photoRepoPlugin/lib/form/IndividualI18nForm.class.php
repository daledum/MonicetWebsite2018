<?php

class IndividualI18nForm extends BaseIndividualI18nForm
{
  public function configure() {
    
    $this->widgetSchema->setLabel('description1', 'Descrição 1');
    $this->widgetSchema->setLabel('description2', 'Descrição 2');
    $this->widgetSchema->setLabel('notes', 'Notas');
   
  }
}
