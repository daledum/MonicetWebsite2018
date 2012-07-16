<?php

class PatternForm extends BasePatternForm
{
  public function configure() {
    unset(
      $this['created_at'],
      $this['updated_at']
    );
    
    $species = SpeciePeer::getForSelect($with_empty = false, '');
    $this->widgetSchema['specie_id'] = new sfWidgetFormChoice(array(
        'choices' => $species,
    ));
    $this->validatorSchema['specie_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($species),
    ));
    
    $numberOptions = range(1,20);
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
    
    
    
    
    $this->widgetSchema['image_tail'] = new sfWidgetFormInputFileEditable(array(
      'is_image' => true,
      'file_src' => ($this->getObject()->getImageTail()? '/uploads/pr_patterns/'.$this->getObject()->getImageTail(): null),
      'edit_mode' => !$this->getObject()->isNew() && $this->getObject()->getImageTail()
    ));
    $this->widgetSchema['image_tail']->setAttribute('class', 'uploaded_image');

    $this->validatorSchema['image_tail'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/pr_patterns',
      'mime_categories' => 'web_images',
      'mime_type_guessers' => array(
        array($this->getValue('image_tail') ? $this->getValue('image_tail') : new sfValidatorFile(), 'guessFromFileinfo'),
        array($this->getValue('image_tail') ? $this->getValue('image_tail') : new sfValidatorFile(), 'guessFromMimeContentType'),
        array($this->getValue('image_tail') ? $this->getValue('image_tail') : new sfValidatorFile(), 'guessFromFileBinary'),
      )
    ));
    $this->validatorSchema['image_tail_delete'] = new sfValidatorPass();
    
    
    
    
    
    $this->widgetSchema['image_dorsal_left'] = new sfWidgetFormInputFileEditable(array(
      'is_image' => true,
      'file_src' => ($this->getObject()->getImageDorsalLeft()? '/uploads/pr_patterns/'.$this->getObject()->getImageDorsalLeft(): null),
      'edit_mode' => !$this->getObject()->isNew() && $this->getObject()->getImageDorsalLeft()
    ));
    $this->widgetSchema['image_dorsal_left']->setAttribute('class', 'uploaded_image');

    $this->validatorSchema['image_dorsal_left'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/pr_patterns',
      'mime_categories' => 'web_images',
      'mime_type_guessers' => array(
        array($this->getValue('image_dorsal_left') ? $this->getValue('image_dorsal_left') : new sfValidatorFile(), 'guessFromFileinfo'),
        array($this->getValue('image_dorsal_left') ? $this->getValue('image_dorsal_left') : new sfValidatorFile(), 'guessFromMimeContentType'),
        array($this->getValue('image_dorsal_left') ? $this->getValue('image_dorsal_left') : new sfValidatorFile(), 'guessFromFileBinary'),
      )
    ));
    $this->validatorSchema['image_dorsal_left_delete'] = new sfValidatorPass();
    
    
    
    
    $this->widgetSchema['image_dorsal_right'] = new sfWidgetFormInputFileEditable(array(
      'is_image' => true,
      'file_src' => ($this->getObject()->getImageDorsalRight()? '/uploads/pr_patterns/'.$this->getObject()->getImageDorsalRight(): null),
      'edit_mode' => !$this->getObject()->isNew() && $this->getObject()->getImageDorsalRight()
    ));
    $this->widgetSchema['image_dorsal_right']->setAttribute('class', 'uploaded_image');

    $this->validatorSchema['image_dorsal_right'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/pr_patterns',
      'mime_categories' => 'web_images',
      'mime_type_guessers' => array(
        array($this->getValue('image_dorsal_right') ? $this->getValue('image_dorsal_right') : new sfValidatorFile(), 'guessFromFileinfo'),
        array($this->getValue('image_dorsal_right') ? $this->getValue('image_dorsal_right') : new sfValidatorFile(), 'guessFromMimeContentType'),
        array($this->getValue('image_dorsal_right') ? $this->getValue('image_dorsal_right') : new sfValidatorFile(), 'guessFromFileBinary'),
      )
    ));
    $this->validatorSchema['image_dorsal_right_delete'] = new sfValidatorPass();
      
      
    /*  
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
    */ 
    $this->validatorSchema->setPostValidator(
            new sfValidatorPropelUnique(array(
                'model' => 'Pattern', 
                'column' => 'specie_id'
                ), array(
                   'invalid' => 'Esta espécie já tem um padrão definido.' 
                )
            ));

     
  }
}
