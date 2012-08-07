<?php

class ObservationPhotoDorsalLeftMarkForm extends BaseObservationPhotoDorsalLeftMarkForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
  }
}
