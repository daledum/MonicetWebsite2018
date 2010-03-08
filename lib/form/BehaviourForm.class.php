<?php

/**
 * Behaviour form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class BehaviourForm extends BaseBehaviourForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('behaviour');
    unset(
      $this['created_at'], $this['updated_at']
    );
  }
}
