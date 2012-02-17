<?php

class IndividualI18nForm extends BaseIndividualI18nForm
{
  public function configure() {
    $this->widgetSchema->setLabel('name', 'Nome');
    $this->widgetSchema->setLabel('description', 'Descrição');
    
    $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
  }
}
