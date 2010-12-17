<?php

class importXlsForm extends sfForm{
  
  public function configure(){
    
    unset($this['_csrf_token']);
    
    $this->setWidgets(array(
      'ficheiro' => new sfWidgetFormInputFile(),
    ));
    
    $this->widgetSchema['ficheiro']->setAttribute('style','margin: 10px;');
    
    $this->setValidators(array(
      'ficheiro' => new sfValidatorFile(array(
        'path' => sfConfig::get('sf_upload_dir').'/',
        'mime_types' => array('application/vnd.ms-office'),
      ))
    ));
    
    $this->widgetSchema->setNameFormat('importXls[%s]');
    
  }
  
}
