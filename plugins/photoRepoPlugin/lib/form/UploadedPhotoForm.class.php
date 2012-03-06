<?php

class UploadedPhotoForm extends BaseUploadedPhotoForm
{
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('photoRepo');
    
    $request = sfContext::getInstance()->getRequest();
    $rp = $request->getRequestParameters();
    if( $rp['module'] == 'publicPictures') {
        unset($this['processed']);
    }
    unset($this['created_at']);
    
    $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
      'is_image' => true,
      'file_src' => '/uploads/pr_public/'.$this->getObject()->getPhoto(),
      'edit_mode' => false
    ));
    
    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required' => true,
      'path' => sfConfig::get('sf_upload_dir').'/pr_public',
      'mime_type_guessers' => array('guessFromFileBinary', 'guessFromFileinfo', 'guessFromMimeContentType'),
      'mime_types'    => array( 
          'image/jpeg', 'image/jpg', 'image/jp_', 'application/jpg', 
          'application/x-jpg', 'image/pjpeg', 'image/pipeg', 
          'image/vnd.swiftview-jpeg', 'image/x-xbitmap',
          'application/zip', 'application/x-zip', 'application/x-zip-compressed', 
          'application/octet-stream', 'application/x-compress', 
          'application/x-compressed', 'multipart/x-zip'
          ),
    ), array(
      'mime_types' => 'Tipo de ficheiro inválido, carregue um ficheiro .jpg ou .zip.'
    ));
    
    $this->widgetSchema['photo_date'] = new sfWidgetFormInput();
    $this->widgetSchema['photo_date']->setAttribute('class', 'date_field_frontend');
    $this->widgetSchema['photo_date']->setAttribute('readonly', 'readonly');
    $this->widgetSchema['photo_date']->setAttribute('onclick', 'dataInicio("'.date("Y-m-d").'","date_field_frontend",true)');
  }
}
