<?php

/**
 * WatchCodeI18n form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class WatchCodeI18nForm extends BaseWatchCodeI18nForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_code');
  }
}
