<?php

/**
 * Guide form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class GuideForm extends BaseGuideForm
{
  public function configure()
  {
  	unset(
      $this['created_at'], $this['updated_at'], $this['slug']
    );
  }
}
