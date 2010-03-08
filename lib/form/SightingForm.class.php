<?php

/**
 * Sighting form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class SightingForm extends BaseSightingForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('sighting');
    unset(
      $this['created_at'], $this['updated_at']
    );
  }
}
