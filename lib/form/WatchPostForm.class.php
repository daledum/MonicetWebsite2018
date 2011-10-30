<?php

/**
 * WatchPost form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class WatchPostForm extends BaseWatchPostForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_post');
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
