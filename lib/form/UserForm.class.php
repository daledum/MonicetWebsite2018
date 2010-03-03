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
  }
}