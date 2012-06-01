<?php

class BodyPartFormFilter extends BaseBodyPartFormFilter
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('bodyPart');
    
  }
}
