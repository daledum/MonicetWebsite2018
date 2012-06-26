<?php

class ObservationPhotoI18nForm extends BaseObservationPhotoI18nForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
  }
}
