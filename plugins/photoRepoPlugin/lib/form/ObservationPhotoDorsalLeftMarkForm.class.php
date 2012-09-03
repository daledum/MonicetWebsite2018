<?php

class ObservationPhotoDorsalLeftMarkForm extends BaseObservationPhotoDorsalLeftMarkForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    
    $this->widgetSchema['observation_photo_dorsal_left_id'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema->moveField('pattern_cell_dorsal_left_id', sfWidgetFormSchema::AFTER, 'is_deep');
  }
}
