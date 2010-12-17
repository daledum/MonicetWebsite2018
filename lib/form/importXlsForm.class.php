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
        'path' => sfConfig::get('sf_upload_dir').'/import/',
        'mime_types' => array('application/vnd.ms-office', 'application/excel', 'application/vnd.ms-excel', 'application/x-excel', 'application/x-msexcel'),
      ))
    ));
    
    $this->widgetSchema->setNameFormat('importXls[%s]');
    
  }
  
}
