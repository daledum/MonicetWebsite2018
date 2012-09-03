<?php

class ObservationPhotoDorsalRightMarkForm extends BaseObservationPhotoDorsalRightMarkForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    
    $this->widgetSchema['observation_photo_dorsal_right_id'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema->moveField('pattern_cell_dorsal_right_id', sfWidgetFormSchema::AFTER, 'is_deep');
  }
}
