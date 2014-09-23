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
    
    $pattern = '/^(\d{1,3}|-\d{1,3}|\d{1,3},\d{1,}|-\d{1,3},\d{1,}|\d{1,3}.\d{1,}|-\d{1,3}.\d{1,}|\d{1,3}º\d{2},\d{3}\'|-\d{1,3}º\d{2},\d{3}\'|\d{1,3}º\d{1,2}\'\d{1,2}"|-\d{1,3}º\d{1,2}\'\d{1,2}")$/';
    
    $this->validatorSchema['base_latitude'] = new sfValidatorRegex(
      array( 'required' => true,
             'pattern' => $pattern
      ),
      array( 'invalid' => 'Accepted latitude format examples: 37 or -34 or 37.123... or -37,123... or 37º10\'12"'
      )
    );
    
    $this->validatorSchema['base_longitude'] = new sfValidatorRegex(
      array( 'required' => true,
             'pattern' => $pattern
      ),
      array( 'invalid' => 'Accepted longitude format examples: 37 or -124 or -38.123... or 39,123... or -127º18\'45"'
      )
    );
  }
}
