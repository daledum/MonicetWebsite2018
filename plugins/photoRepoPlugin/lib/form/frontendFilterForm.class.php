<?php
class frontendFilterForm extends sfForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('frontend');
    
    $culture = sfContext::getInstance()->getUser()->getCulture();
    
    $species = SpeciePeer::getForSelectWithIndividuals(true, '', null, null, $lang=$culture );
    $this->widgetSchema['specie_id'] = new sfWidgetFormChoice(array(
        'choices' => $species,
    ));
    $this->validatorSchema['specie_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($species),
        'required' => false
    ));
    
    $this->widgetSchema['photo_date'] = new sfWidgetFormFilterDate(array(
      'from_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral')),
      'to_date' => new sfWidgetFormInput(array(), array('class' => 'date_field data_geral')),
      'template' => 'From %from_date% to %to_date%',
      'with_empty' => false,
    ));
    
    $islands = island::getForSelect(true, '');
    $this->widgetSchema['island'] = new sfWidgetFormChoice(array(
        'choices' => $islands,
    ));
    $this->validatorSchema['island'] = new sfValidatorChoice(array(
        'choices' => array_keys($islands),
    ));
    
    $photographers = PhotographerPeer::getForSelect(true, '');
    $this->widgetSchema['photographer_id'] = new sfWidgetFormChoice(array(
        'choices' => $photographers,
    ));
    $this->validatorSchema['photographer_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($photographers),
        'required' => false,
    ));
    
    $companies = CompanyPeer::getForSelect(true, '');
    $this->widgetSchema['company_id'] = new sfWidgetFormChoice(array(
        'choices' => $companies,
    ));
    $this->validatorSchema['company_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($companies),
        'required' => false,
    ));
    
    $this->widgetSchema->setNameFormat('catalog_filter[%s]');

  }
}

?>
