<?php

/**
 * WatchBehaviour form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class WatchBehaviourForm extends BaseWatchBehaviourForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_behaviour');
    unset(
      $this['created_at'], $this['updated_at']
    );
    $this->embedI18n(array('pt', 'en'));
  }
}
