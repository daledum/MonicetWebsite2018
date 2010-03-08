<?php

/**
 * Specie filter form.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class SpecieFormFilter extends BaseSpecieFormFilter
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('specie');
    unset(
      $this['created_at'], $this['updated_at']
    );
  }
}
