<?php

class ObservationPhotoFormFilter extends BaseObservationPhotoFormFilter
{
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    
    unset(
      $this['latitude'], 
      $this['longitude'],
      $this['behaviour_id'],
      $this['age_group'],
      $this['photo_time'],
      $this['kind_of_photo'],
      $this['photo_quality'],
      $this['gender'],
      $this['is_best'],
      $this['notes'],
      $this['updated_at'],
      $this['created_at'],
      $this['sighting_id'],
      $this['body_part']
    );
    
    $this->widgetSchema['photo_date'] = new sfWidgetFormFilterDate(array(
      'from_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral', 'readonly' => 'readonly')),
      'to_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral', 'readonly' => 'readonly')),
      'template' => 'De %from_date% a %to_date%',
      'with_empty' => false
    ));
    $this->widgetSchema['uploaded_at'] = new sfWidgetFormFilterDate(array(
      'from_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral', 'readonly' => 'readonly')),
      'to_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral', 'readonly' => 'readonly')),
      'template' => 'De %from_date% a %to_date%',
      'with_empty' => false
    ));
    
    $species = SpeciePeer::getForSelect(true, '');
    $this->widgetSchema['specie_id'] = new sfWidgetFormChoice(array(
        'choices' => $species,
    ));
    
    $islands = island::getForSelect(true, '');
    $this->widgetSchema['island'] = new sfWidgetFormChoice(array(
        'choices' => $islands,
    ));
    $body_parts = BodyPartPeer::getForSelect(true, '');
    $this->widgetSchema['body_part_id'] = new sfWidgetFormChoice(array(
        'choices' => $body_parts,
    ));
    $companies = CompanyPeer::getForSelect(true, '');
    $this->widgetSchema['company_id'] = new sfWidgetFormChoice(array(
        'choices' => $companies,
    ));
    $vessels = VesselPeer::getForSelect(true, '');
    $this->widgetSchema['vessel_id'] = new sfWidgetFormChoice(array(
        'choices' => $vessels,
    ));
    $photographers = PhotographerPeer::getForSelect(true, '');
    $this->widgetSchema['photographer_id'] = new sfWidgetFormChoice(array(
        'choices' => $photographers,
    ));
    
    if( sfContext::getInstance()->getRequest()->getParameter('template', 'index') == 'catalog') {
      unset($this['status']);
    } else {
      $status = ObservationPhoto::getForSelectForFilter(true, '');
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
          'choices' => $status,
      ));
      unset($this['validated_by']);
    }
      
    
    $this->widgetSchema->moveField('uploaded_at', sfWidgetFormSchema::AFTER, 'photo_date');
  }
}
