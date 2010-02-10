<?php

/**
 * SeaState filter form.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class SeaStateFormFilter extends BaseSeaStateFormFilter
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('sea_state');
    unset(
      $this['created_at'], $this['updated_at']
    );
  }
}
