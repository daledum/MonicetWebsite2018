<?php

/**
 * WatchVisibility filter form.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
class WatchVisibilityFormFilter extends BaseWatchVisibilityFormFilter
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_visibility');
    unset($this['created_at'], $this['updated_at']);
  }
}
