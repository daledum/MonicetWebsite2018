<?php

class PublicationI18nForm extends BasePublicationI18nForm
{
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('publication');
  }
}
