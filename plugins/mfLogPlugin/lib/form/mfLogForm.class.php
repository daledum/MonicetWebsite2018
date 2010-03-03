<?php

/**
 * mfLog form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class mfLogForm extends BasemfLogForm
{
  public function configure()
  {
  	$user = sfContext::getInstance()->getUser();
    
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('mf_log');
  	$this->widgetSchema['tipo'] = new sfWidgetFormChoice(array(
  	  'choices' => array_combine(mfLogPeer::getTipos(), mfLogPeer::getTipos()),
  	  'multiple' => false,
  	  'expanded' => false
  	));
  	//$this->widgetSchema['tipo']->setOption('multiple', true);
  	$this->validatorSchema['tipo'] = new sfValidatorChoice(array(
  	  'choices' => mfLogPeer::getTipos()
  	));
  }
}
