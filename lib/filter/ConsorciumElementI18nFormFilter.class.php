<?php

/**
 * ConsorciumElementI18n filter form.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class ConsorciumElementI18nFormFilter extends BaseConsorciumElementI18nFormFilter
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('consorcium_element');
  }
}
