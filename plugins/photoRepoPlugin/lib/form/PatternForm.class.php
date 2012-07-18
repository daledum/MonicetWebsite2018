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
    
    $this->embedRelation('PatternCellTail', array(
        'title'  => 'Áreas do padrão da cauda',
      ));
    $this->widgetSchema->moveField('Áreas do padrão da cauda', sfWidgetFormSchema::AFTER, 'image_tail');
    
    $this->embedRelation('PatternCellDorsalLeft', array(
        'title'  => 'Áreas do padrão dorsal esquerdo',
      ));
    $this->widgetSchema->moveField('Áreas do padrão dorsal esquerdo', sfWidgetFormSchema::AFTER, 'image_dorsal_left');
    
    $this->embedRelation('PatternCellDorsalRight', array(
        'title'  => 'Áreas do padrão dorsal direito',
      ));
    $this->widgetSchema->moveField('Áreas do padrão dorsal direito', sfWidgetFormSchema::AFTER, 'image_dorsal_right');
      
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
