<?php

class ObservationPhotoDorsalRightMarkForm extends BaseObservationPhotoDorsalRightMarkForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
  }
}
