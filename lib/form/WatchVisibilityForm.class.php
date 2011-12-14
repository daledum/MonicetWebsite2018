<?php

/**
 * WatchVisibility form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class WatchVisibilityForm extends BaseWatchVisibilityForm
{
  public function configure()
  {
      $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_visibility');
      unset(
          $this['created_at'], $this['updated_at']
      );
      $this->embedI18n(array('pt', 'en'));
  }
}
