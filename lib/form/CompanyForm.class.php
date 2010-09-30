<?php

/**
 * Company form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class CompanyForm extends BaseCompanyForm
{
  public function processValues($values)
  {
  	parent::processValues($values);
    $this->values['base_latitude'] = mfUtils::convertLatLong($this->values['base_latitude']);
    $this->values['base_longitude'] = mfUtils::convertLatLong($this->values['base_longitude']);
    return $this->values;
  }
	
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('company');
    unset(
      $this['created_at'], $this['updated_at'], $this['company_user_list']
    );
    
    $pattern = '/^(\d{2},\d{4}|\d{2}.\d{4}|\d{2}º\d{2},\d{3}\'|\d{2}º\d{2}\'\d{2}")$/';
    
    $this->validatorSchema['base_latitude'] = new sfValidatorRegex(array(
      'required' => true,
      'pattern' => $pattern
    ));
    
    $this->validatorSchema['base_longitude'] = new sfValidatorRegex(array(
      'required' => true,
      'pattern' => $pattern
    ));
  }
}
