<?php
class ObservationPhotoDorsalRightForm extends BaseObservationPhotoDorsalRightForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    $this->widgetSchema['photo_id'] = new sfWidgetFormInputHidden();
    
    $this->embedRelation('ObservationPhotoDorsalRightMark', array(
        'title'  => 'Marcas',
        'empty_label' => 'marca',
      ));
  }
}
