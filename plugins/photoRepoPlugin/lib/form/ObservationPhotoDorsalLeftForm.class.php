<?php
class ObservationPhotoDorsalLeftForm extends BaseObservationPhotoDorsalLeftForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    $this->widgetSchema['photo_id'] = new sfWidgetFormInputHidden();
    
    $this->embedRelation('ObservationPhotoDorsalLeftMark', array(
        'title'  => 'Marcas',
        'empty_label' => 'marca',
      ));
  }
}
