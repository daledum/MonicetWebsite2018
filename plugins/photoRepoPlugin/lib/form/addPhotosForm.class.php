<?php
class addPhotosForm extends sfForm
{
  public function configure() {

    $this->widgetSchema['photo'] = new sfWidgetFormInputFile();
    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required'      => true,
      'path'          =>  sfConfig::get('sf_upload_dir').'/pr_repo_temp',
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
    $this->widgetSchema->setHelp('photo', 'Apenas ficheiros com extensão .jpg ou .zip');
    $this->widgetSchema->setLabel('photo', 'Fotografia(s)');
    $this->widgetSchema->setNameFormat('add_photos[%s]');
    
  }
}

?>

