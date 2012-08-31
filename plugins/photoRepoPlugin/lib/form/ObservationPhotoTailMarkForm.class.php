<?php

class ObservationPhotoTailMarkForm extends BaseObservationPhotoTailMarkForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    
    $this->widgetSchema['observation_photo_tail_id'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema->moveField('pattern_cell_tail_id', sfWidgetFormSchema::AFTER, 'is_deep');
    
  }
}
