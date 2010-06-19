<?php

/**
 * GeneralInfo form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class GeneralInfoForm extends BaseGeneralInfoForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('general_info');
    unset(
      $this['created_at'], $this['updated_at']
    );
    $this->widgetSchema['date']->setOption('format', '%year%-%month%-%day%');
    
    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());
    $vessels = array_merge((array)"-------------", VesselPeer::doSelectListByCompany());
    $company_users = array_merge((array)"-------------", UserPeer::doSelectByCompany());
    
    $this->setWidget('vessel_id', new sfWidgetFormChoice(array('choices' => $vessels)));
    
    $this->setWidget('skipper_id', new sfWidgetFormChoice(array('choices' => $company_users)));
    
    $this->setWidget('guide_id', new sfWidgetFormChoice(array('choices' => $company_users)));
    
    $this->setWidget('company_id', new sfWidgetFormChoice(array('choices' => array($company->getId() => $company->getName()))));
    
    if($this->isNew()) {
    	$this->getWidget('base_latitude')->setAttribute('value', $company->getBaseLatitude());
        $this->getWidget('base_longitude')->setAttribute('value', $company->getBaseLongitude());
    }
  }
}
