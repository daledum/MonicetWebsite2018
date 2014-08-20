<?php

class GeneralInfoForm extends BaseGeneralInfoForm
{
  
  
  public function processValues($values)
  {
	parent::processValues($values);
	
  $this->values['base_latitude'] = mfUtils::convertLatLong($this->values['base_latitude']);
  $this->values['base_longitude'] = mfUtils::convertLatLong($this->values['base_longitude']);
  
  
  
	if($this->isNew() || !$this->getObject()->getCode() || $this->getObject()->getCompanyId() != $this->values['company_id'] || $this->getObject()->getDate() != $this->values['date'])
	{
	  /*$daily_number = GeneralInfoQuery::create()
                        ->filterByCompanyId($this->values['company_id'])
                        ->filterByDate($this->values['date'])
                        ->count();
      $vessel = VesselPeer::retrieveByPK($this->values['vessel_id']);
      $this->values['code'] = strtoupper($vessel->getCompany()->getAcronym()) . substr(str_replace('-', '',$this->values['date']), -6) . "-" . ($daily_number + 1);*/
      $this->values['code'] = mfUtils::gerarCodigoGi($this->values['company_id'], $this->values['date']);
	}
	return $this->values;
  }

  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('general_info');
    unset(
      $this['created_at'], $this['updated_at'], $this['code']
    );
    
    
    
    
    if( $this->isNew() || sfContext::getInstance()->getUser()->isSuperAdmin() ){
    $this->widgetSchema['date'] = new sfWidgetFormInput();
    $this->widgetSchema['date']->setAttribute('class', 'date_field');
    $this->widgetSchema['date']->setAttribute('onclick', 'dataInicio("'.date("Y-m-d").'","date_field",true)');
    //$this->widgetSchema['date']->setAttribute('readonly', 'readonly');
    //$this->widgetSchema['date']->setAttribute('value', date("Y-m-d"));
    }
    else{
        $this->widgetSchema['date']  = new sfWidgetFormInputText();
        $this->widgetSchema['date']->setAttribute('readonly', 'readonly');
    }

    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());


    if($this->isNew()){
      $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['created_by']->setAttribute('value',$user->getId());
    }else{
      unset($this['created_by']);
    }
    
    $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['updated_by']->setAttribute('value',$user->getId());
    



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
    $skippers = SkipperPeer::doSelectListByCompany();
    $this->widgetSchema['skipper_id'] = new sfWidgetFormChoice(array(
        'choices' => $skippers,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['skipper_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($skippers),
        'required' => false
    ));
    $guides = GuidePeer::doSelectListByCompany();
    $this->widgetSchema['guide_id'] = new sfWidgetFormChoice(array(
        'choices' => $guides,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['guide_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($guides),
        'required' => false
    ));
    
    if ($company) {
        $this->setWidget('company_id', new sfWidgetFormChoice(array('choices' => array($company->getId() => $company->getName()))));
    }
    
    if($this->isNew() && $company) {
    	$this->getWidget('base_latitude')->setAttribute('value', $company->getBaseLatitude());
        $this->getWidget('base_longitude')->setAttribute('value', $company->getBaseLongitude());
    }
    
    if(!sfContext::getInstance()->getUser()->isSuperAdmin()){
      $this->getWidget('valid')->setAttributes(array('disabled' => 'true'));
      $this->getWidget('comments')->setAttributes(array('disabled' => 'true'));
      
      if($this->getObject()->getValid() == 1){
        $this->getWidget('date')->setAttributes(array('disabled' => 'true'));
        $this->getWidget('vessel_id')->setAttributes(array('disabled' => 'true'));
        $this->getWidget('skipper_id')->setAttributes(array('disabled' => 'true'));
        $this->getWidget('guide_id')->setAttributes(array('disabled' => 'true'));
        $this->getWidget('company_id')->setAttributes(array('disabled' => 'true'));
        $this->getWidget('base_latitude')->setAttributes(array('disabled' => 'true'));
        $this->getWidget('base_longitude')->setAttributes(array('disabled' => 'true'));
      }
      
    }
  }
}
