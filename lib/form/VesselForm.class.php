<?php

/**
 * Vessel form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class VesselForm extends BaseVesselForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('vessel');
    unset(
      $this['created_at'], $this['updated_at']
    );
    
    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());

    if ($company) {
        $this->setWidget('company_id', 
                         new sfWidgetFormChoice(array('choices' => array($company->getId() => $company->getName()))));
    }
    
  }
}
