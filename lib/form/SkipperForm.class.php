<?php

/**
 * Skipper form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class SkipperForm extends BaseSkipperForm
{
  public function configure()
  {
  	unset(
      $this['created_at'], $this['updated_at'], $this['slug']
    );
  }
}
