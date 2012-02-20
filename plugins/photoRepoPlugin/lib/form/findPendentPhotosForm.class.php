<?php
class findPendentPhotosForm extends sfForm
{
  public function configure() {
    $request = sfContext::getInstance()->getRequest();
    if( $request->hasParameter('find_pendent_photos') ){
      $args = $request->getParameter('find_pendent_photos');
    }
    
    $this->widgetSchema['date_from'] = new sfWidgetFormInput();
    $this->widgetSchema['date_from']->setAttribute('class', 'date_field_from');
    $this->widgetSchema['date_from']->setAttribute('readonly', 'readonly');
    $this->widgetSchema['date_from']->setAttribute('onclick', 'dataInicio("'.date("Y-m-d").'","date_field_from",true)');
    $this->widgetSchema['date_from']->setLabel('Desde');
    if( isset($args['date_from']) ){
      $this->widgetSchema['date_from']->setDefault($args['date_from']);
    }
    
    $this->widgetSchema['date_to'] = new sfWidgetFormInput();
    $this->widgetSchema['date_to']->setAttribute('class', 'date_field_to');
    $this->widgetSchema['date_to']->setAttribute('readonly', 'readonly');
    $this->widgetSchema['date_to']->setAttribute('onclick', 'dataInicio("'.date("Y-m-d").'","date_field_to",true)');
    $this->widgetSchema['date_to']->setLabel('Até');
    if( isset($args['date_to']) ){
      $this->widgetSchema['date_to']->setDefault($args['date_to']);
    }
    
    
    // Photographers
    $photographers = $this->getPhotographerCodes();
    $this->widgetSchema['photographer'] = new sfWidgetFormChoice(array(
      'choices' => $photographers 
    ));
    $this->validatorSchema['photographer'] = new sfValidatorChoice(array(
      'choices' => array_keys($photographers),
      'required' => false
    ));
    $this->widgetSchema['photographer']->setLabel('Fotógrafo');
    if( isset($args['photographer']) ){
      $this->widgetSchema['photographer']->setDefault($args['photographer']);
    }
    
    $this->widgetSchema->setNameFormat('find_pendent_photos[%s]');
  }
  
  
  
  
  /**
   * 
   * Accessory methods
   * 
   */
  function getPhotographerCodes(){
    $results = array('' => '--Todos--');
    
    $current_dir = sfConfig::get('sf_upload_dir').'/pr_repo';
    $dir = opendir($current_dir);        // Open the sucker
    while ($file = readdir($dir)) {
      $parts = explode("-", $file);
      if (is_array($parts) && count($parts) == 3 ){
        $results[$parts[1]] = $parts[1];
      }
    }
    return $results;
  }
}

?>
