<?php

class PatternForm extends BasePatternForm
{
  public function configure() {
    unset(
      $this['created_at'],
      $this['updated_at']
    );
    
    $this->validatorSchema['specie_id'] = new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => true));
    
    $numberOptions = range(1,10);
    $numberOptionFields = array(
        'lines_tail', 'columns_tail', 
        'lines_dorsal_left', 'columns_dorsal_left',
        'lines_dorsal_right', 'columns_dorsal_right'
    );
    foreach( $numberOptionFields as $field ){
      $this->widgetSchema[$field] = new sfWidgetFormChoice(array(
        'choices' => array_combine($numberOptions, $numberOptions) 
      ));
      $this->validatorSchema[$field] = new sfValidatorChoice(array(
        'choices' => $numberOptions,
        'required' => false
      ));
    }
    
    $photoFields = array(
        array('field' => 'image_tail', 'required' => false, 'label' => ''),
        array('field' => 'image_dorsal_left', 'required' => false, 'label' => ''),
        array('field' => 'image_dorsal_right', 'required' => false, 'label' => '')
    );
    
    foreach( $photoFields as $field ){
      $this->widgetSchema[$field['field']] = new sfWidgetFormInputFile();
      $this->validatorSchema[$field['field']] = new sfValidatorFile(array(
        'required'      => $field['required'],
        'path'          =>  sfConfig::get('sf_upload_dir').'/pr_patterns',
        'mime_type_guessers' => array('guessFromFileBinary', 'guessFromFileinfo', 'guessFromMimeContentType'),
        'mime_types'    => array( 
            'image/jpeg', 'image/jpg', 'image/jp_', 'application/jpg', 
            'application/x-jpg', 'image/pjpeg', 'image/pipeg', 
            'image/vnd.swiftview-jpeg'
            ),
      ), array(
        'mime_types' => 'Tipo de ficheiro inválido, carregue um ficheiro .jpg.'
      ));
      $this->widgetSchema->setHelp($field['field'], 'Apenas ficheiros com extensão .jpg');
    }
     
     
     
  }
}
