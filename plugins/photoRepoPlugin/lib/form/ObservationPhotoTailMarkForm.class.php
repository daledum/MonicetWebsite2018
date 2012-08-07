<?php

class ObservationPhotoTailMarkForm extends BaseObservationPhotoTailMarkForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
  }
}
