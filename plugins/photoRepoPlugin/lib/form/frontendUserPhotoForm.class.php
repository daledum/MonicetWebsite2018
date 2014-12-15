<?php
class frontendUserPhotoForm extends sfForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('frontend');
    //$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('photoRepo'); //the correct translation must be made

    $culture = sfContext::getInstance()->getUser()->getCulture();
    
    $species = SpeciePeer::getForSelectWithIndividuals(false, '', null, null, $lang=$culture );
    $this->widgetSchema['specie_id'] = new sfWidgetFormChoice(array(
        'choices' => $species,
    ));
    $this->validatorSchema['specie_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($species),
    ));
    
    $body_parts = BodyPartPeer::getForSelect(false, '');
    $this->widgetSchema['body_part_id'] = new sfWidgetFormChoice(array(
        'choices' => $body_parts,
    ));
    $this->validatorSchema['body_part_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($body_parts),
    ));
    
    $this->widgetSchema['photo'] = new sfWidgetFormInputFile();
    //the code below is not returning any errors... why?
    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required'      => true,
      'path'          =>  sfConfig::get('sf_upload_dir').'/pr_repo_temp',
      'mime_type_guessers' => array('guessFromFileBinary', 'guessFromFileinfo', 'guessFromMimeContentType'),
      'mime_types'    => array( 
          'image/jpeg', 'image/jpg', 'image/jp_', 'application/jpg', 
          'application/x-jpg', 'image/pjpeg', 'image/pipeg', 
          'image/vnd.swiftview-jpeg', 'image/x-xbitmap'
          ),
      'max_size' => 2000000,
    ), array(
      'mime_types' => 'Tipo de ficheiro inválido, carregue um ficheiro .jpg.',
      'max_size'   => 'O ficheiro é demasiado grande. (max. %max_size%MB)'
    ));

    //$this->widgetSchema->setLabel('photo', 'Fotografia');
    $this->widgetSchema->setHelp('photo', 'Apenas ficheiros com extensão .jpg, nomes sem espaços, tamanho de 2MB max.');
    $this->widgetSchema->setNameFormat('user_photo_form[%s]');

  }
}

?>
