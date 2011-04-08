<?php

/**
 * SpecieGroupI18n form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class SpecieGroupI18nForm extends BaseSpecieGroupI18nForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('specie_group');
  }
}
