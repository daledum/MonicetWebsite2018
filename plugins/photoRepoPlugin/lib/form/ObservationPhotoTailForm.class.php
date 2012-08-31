<?php
class ObservationPhotoTailForm extends BaseObservationPhotoTailForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    $this->widgetSchema['photo_id'] = new sfWidgetFormInputHidden();
    
    /*$this->embedRelation('ObservationPhotoTailMark', array(
        'title'  => 'Marcas',
        'empty_label' => 'marca',
      ));*/
    
  }
}
