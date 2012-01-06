<?php

/**
 * WatchInfo form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class WatchInfoForm extends BaseWatchInfoForm
{
  public function processValues($values)
  {
	parent::processValues($values);
	
  $this->values['base_latitude'] = mfUtils::convertLatLong($this->values['base_latitude']);
  $this->values['base_longitude'] = mfUtils::convertLatLong($this->values['base_longitude']);
  
  
  
	if($this->isNew() || !$this->getObject()->getCode() || $this->getObject()->getCompanyId() != $this->values['company_id'] || $this->getObject()->getDate() != $this->values['date'])
	{
	  
      $this->values['code'] = mfUtils::gerarCodigoGi($this->values['company_id'], $this->values['date']);
	}
	return $this->values;
  }

  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_info');
    unset(
      $this['created_at'], $this['updated_at'], $this['code']
    );
    
    
    
    

    $this->widgetSchema['date'] = new sfWidgetFormInput();
    $this->widgetSchema['date']->setAttribute('class', 'date_field');
    $this->widgetSchema['date']->setAttribute('onclick', 'dataInicio("'.date("Y-m-d").'","date_field",true)');

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
    
	$posts = WatchPostPeer::doSelectListByCompany();
    $this->widgetSchema['watch_post_id'] = new sfWidgetFormChoice(array(
        'choices' => $posts,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['watch_post_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($posts),
        'required' => false
    ));
    $watchmen = WatchmanPeer::doSelectListByCompany();
    $this->widgetSchema['watchman_id'] = new sfWidgetFormChoice(array(
        'choices' => $watchmen,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['watchman_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($watchmen),
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
        $this->getWidget('watchman_id')->setAttributes(array('disabled' => 'true'));
        $this->getWidget('company_id')->setAttributes(array('disabled' => 'true'));
        $this->getWidget('base_latitude')->setAttributes(array('disabled' => 'true'));
        $this->getWidget('base_longitude')->setAttributes(array('disabled' => 'true'));
      }
      
    }
  }
}
