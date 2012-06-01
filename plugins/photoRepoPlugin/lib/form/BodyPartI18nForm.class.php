<?php

class BodyPartI18nForm extends BaseBodyPartI18nForm
{
  public function configure()
  {
      $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('bodyPart');
  }
}
