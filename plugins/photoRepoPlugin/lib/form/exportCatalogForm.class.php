<?php
class ExportCatalogForm extends sfForm {
  public function configure()
  {
    $request = sfContext::getInstance()->getRequest();
    if( $request->hasParameter('from') ){
      $from = $request->getParameter('from');
    } else {
      $lowest_id = ObservationPhotoQuery::create()->orderById(Criteria::ASC)->findOne();
      $from = $lowest_id->getId();
    }
    
    if( $request->hasParameter('to') ){
      $to = $request->getParameter('to');
    } else {
      $highest_id = ObservationPhotoQuery::create()->orderById(Criteria::DESC)->findOne();
      $to = $highest_id->getId();
    }
    
    $this->widgetSchema['from'] = new sfWidgetFormInputText();
    $this->widgetSchema['from']->setAttribute('style', 'line-height: 18px; width: 50px; text-align: right; padding: 2px;');
    $this->widgetSchema['from']->setAttribute('value', $from);
    $this->validatorSchema['from'] = new sfValidatorInteger();
    $this->validatorSchema['from']->setOption('min', 0);
    $this->validatorSchema['from']->setOption('required', true);
    
    
    
    $this->widgetSchema['to'] = new sfWidgetFormInputText();
    $this->widgetSchema['to']->setAttribute('style', 'line-height: 18px; width: 50px; text-align: right; padding: 2px;');
    $this->widgetSchema['to']->setAttribute('value', $to);
    $this->validatorSchema['to'] = new sfValidatorInteger();
    $this->validatorSchema['to']->setOption('min', 0);
    $this->validatorSchema['to']->setOption('required', true);
    
    $this->widgetSchema->setNameFormat('export_catalog[%s]');

  }
}

?>
