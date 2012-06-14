<?php

/**
 * WatchSighting form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class WatchSightingForm extends BaseWatchSightingForm
{
  public function configure()
  {
  	$wi_id = sfContext::getInstance()->getRequest()->getParameter('wi_id');
  	
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_sighting');
    unset(
      $this['created_at'], $this['updated_at']
    );
    
    $this->widgetSchema['time'] = new sfWidgetFormInput();

    $codes = WatchCodePeer::doSelectListAll();
    $this->widgetSchema['watch_code_id'] = new sfWidgetFormChoice(array(
        'choices' => $codes,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['watch_code_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($codes),
        'required' => true
    ));
   
    $vessels = VesselPeer::doSelectListByCompany();
    $this->widgetSchema['vessel_id'] = new sfWidgetFormChoice(array(
        'choices' => $vessels,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['vessel_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($vessels),
        'required' => false
    ));
    
  }
}
