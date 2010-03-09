<?php

/**
 * mfLog filter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
class mfLogFormFilter extends BasemfLogFormFilter
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('mf_log');
  	
  	$this->widgetSchema['tipo'] = new sfWidgetFormChoice(array(
      'choices' => array_combine(mfLogPeer::getTipos(), mfLogPeer::getTipos()),
      'multiple' => false,
      'expanded' => true
    ));
    /*
    $this->validatorSchema['tipo'] = new sfValidatorChoice(array(
      'choices' => mfLogPeer::getTipos()
    ));
    */
  }
}