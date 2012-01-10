<?php

/**
 * WatchCode filter form.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
class WatchCodeFormFilter extends BaseWatchCodeFormFilter
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
  }
}
