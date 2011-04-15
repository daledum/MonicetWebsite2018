<?php

/**
 * Content form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class ContentForm extends BaseContentForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('content');
    unset(
      $this['created_at'], $this['updated_at']
    );
    $this->embedI18n(array('pt', 'en'));
  }
}
