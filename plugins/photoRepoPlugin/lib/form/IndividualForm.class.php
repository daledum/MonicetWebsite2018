<?php

class IndividualForm extends BaseIndividualForm {
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('individual');
    
    unset($this['created_at'], $this['updated_at']);
    
    $this->widgetSchema->setLabel('name', 'Nome');
     $this->validatorSchema['name'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
    
    $this->widgetSchema->setLabel('specie_id', 'Espécie');
    $this->validatorSchema['specie_id'] = new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => true));
    
    $this->embedI18n(array('pt', 'en'));
  }
}
