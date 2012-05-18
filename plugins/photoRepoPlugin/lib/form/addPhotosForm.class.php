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
      'max_size' => 60000000,
    ), array(
      'mime_types' => 'Tipo de ficheiro inválido, carregue um ficheiro .jpg ou .zip.',
      'max_size'   => 'O ficheiro é demasiado grande. (%max_size%max. 60MB)'
    ));
    $this->widgetSchema->setHelp('photo', 'Apenas ficheiros com extensão .jpg ou .zip, nomes sem espaços, tamanho de 60MB max.');
    $this->widgetSchema->setLabel('photo', 'Fotografia(s)');
    $this->widgetSchema->setNameFormat('add_photos[%s]');
    
  }
}

?>

