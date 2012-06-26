<?php

class PublicationForm extends BasePublicationForm
{
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('publication');
    
    unset($this['created_at'], $this['updated_at']);
    
    $this->widgetSchema['file_address'] = new sfWidgetFormInputFile();
    
    $this->validatorSchema['file_address'] = new sfValidatorFile(array(
      'required' => $this->isNew(),
      'path' => sfConfig::get('sf_upload_dir').'/publication',
      'mime_type_guessers' => array('guessFromFileBinary', 'guessFromFileinfo', 'guessFromMimeContentType'),
      'mime_types'    => array('application/pdf'),
    ), array(
      'mime_types' => 'Tipo de ficheiro inválido, carregue um ficheiro .pdf.'
    ));
    
    $this->embedI18n(array('pt', 'en'));
  }
}
