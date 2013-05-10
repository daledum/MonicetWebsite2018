<?php

class RecordForm extends BaseRecordForm
{
  public function configure()
  {
  	$gi_id = sfContext::getInstance()->getRequest()->getParameter('gi_id');
  	
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('record');
    unset(
      $this['created_at'], $this['updated_at']
    );
    
    $this->widgetSchema['time'] = new sfWidgetFormInput();
    $this->validatorSchema['time'] = new sfValidatorTime(
          $options = array(
              'time_format' => '~(?P<hour>\d{2}):(?P<minute>\d{2}):(?P<second>\d{2})~',
              'time_format_error' => 'hh:mm:ss'
          ),
          $messages = array(
              'bad_format' => 'A data "%value%" não está de acordo com o formato "%time_format%"'
          )
        );

    $codes = CodePeer::doSelectListAll();
    $this->widgetSchema['code_id'] = new sfWidgetFormChoice(array(
        'choices' => $codes,
        'multiple' => false,
        'expanded' => false
    ));
    $this->validatorSchema['code_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($codes),
        'required' => true
    ));
  }
  
  public function processValues($values)
  {
    parent::processValues($values);
    $this->values['latitude'] = mfUtils::convertLatLong($this->values['latitude']);
    $this->values['longitude'] = mfUtils::convertLatLong($this->values['longitude']);
    return $this->values;
  }
  
  
}
