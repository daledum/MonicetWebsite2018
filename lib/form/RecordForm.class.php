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
}
