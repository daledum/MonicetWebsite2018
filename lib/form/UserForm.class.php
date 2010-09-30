<?php
/**
 * User form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('sf_guard_user');
    unset(
      $this['created_at'], $this['updated_at']
    );
    
    $this->widgetSchema['birthday']->setOption('format', '%year%-%month%-%day%');
    $this->widgetSchema['country'] = new sfWidgetFormI18nChoiceCountry();
    $this->widgetSchema['lang'] = new sfWidgetFormI18nChoiceLanguage();
    
    $this->validatorSchema['url'] = new sfValidatorUrl(array(
      'required' => false
    ));
    
    $this->validatorSchema['email'] = new sfValidatorEmail();
    
    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());

    if ($company) {
        $this->setWidget('company_user_list', 
                         new sfWidgetFormChoice(array('choices' => array($company->getId() => $company->getName()))));
    }
  }
}