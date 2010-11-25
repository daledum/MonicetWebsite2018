<?php

/**
 * Skipper form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class SkipperForm extends BaseSkipperForm
{
  public function configure()
  {
  	unset(
      $this['created_at'], $this['updated_at'], $this['slug']
    );
    
    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());

    if ($company) {
        $this->setWidget('company_id', 
                         new sfWidgetFormChoice(array('choices' => array($company->getId() => $company->getName()))));
    }
    
  }
}
