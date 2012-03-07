<?php

class UploadedPhotoFormFilter extends BaseUploadedPhotoFormFilter {
  public function configure() {
    unset($this['comment'], $this['photo']);
    
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('photoRepo');
    
    $this->widgetSchema['photo_date'] = new sfWidgetFormFilterDate(array(
      'from_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral', 'readonly' => 'readonly')),
      'to_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral', 'readonly' => 'readonly')),
      'template' => 'De %from_date% a %to_date%',
      'with_empty' => true
    ));
    
    $this->widgetSchema['created_at'] = new sfWidgetFormFilterDate(array(
      'from_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral', 'readonly' => 'readonly')),
      'to_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral', 'readonly' => 'readonly')),
      'template' => 'De %from_date% a %to_date%',
      'with_empty' => false
    ));
  }
}
