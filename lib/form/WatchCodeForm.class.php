<?php

/**
 * WatchCode form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class WatchCodeForm extends BaseWatchCodeForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_code');
    unset(
      $this['created_at'], $this['updated_at']
    );
  }
}
