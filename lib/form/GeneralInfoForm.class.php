<?php

class GeneralInfoForm extends BaseGeneralInfoForm
{
  public function processValues($values)
  {
	parent::processValues($values);
	
	if($this->isNew())
	{
	  $daily_number = GeneralInfoQuery::create()
                        ->filterByCompanyId($this->values['company_id'])
                        ->filterByDate($this->values['date'])
                        ->count();
      $vessel = VesselPeer::retrieveByPK($this->values['vessel_id']);
      $this->values['code'] = strtoupper($vessel->getCompany()->getAcronym()) . substr(str_replace('-', '',$this->values['date']), -6) . "-" . ($daily_number + 1);
	}
	return $this->values;
  }

  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('general_info');
    unset(
      $this['created_at'], $this['updated_at'], $this['code'], $this['created_by']
    );

    $this->widgetSchema['date'] = new sfWidgetFormInput();
    $this->widgetSchema['date']->setAttribute('class', 'date_field');
    $this->widgetSchema['date']->setAttribute('readonly', 'readonly');
    $this->widgetSchema['date']->setAttribute('value', date("Y-m-d"));

    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());

    $vessels = VesselPeer::doSelectListByCompany();
    $this->widgetSchema['vessel_id'] = new sfWidgetFormChoice(array(
        'choices' => $vessels,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['vessel_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($vessels),
        'required' => true
    ));
    $skippers = SkipperPeer::doSelectListByCompany();
    $this->widgetSchema['skipper_id'] = new sfWidgetFormChoice(array(
        'choices' => $skippers,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['skipper_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($skippers),
        'required' => true
    ));
    $guides = GuidePeer::doSelectListByCompany();
    $this->widgetSchema['guide_id'] = new sfWidgetFormChoice(array(
        'choices' => $guides,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['guide_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($guides),
        'required' => true
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
