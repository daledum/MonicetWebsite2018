<?php

class ObservationPhotoBatchUpdateForm extends ObservationPhotoForm {
  public function configure(){
        
    $this->unsetAllFieldsExcept( array('island', 'company_id', 'photographer_id') );
    
    $islands = island::getForSelect(true, '');
    $this->widgetSchema['island'] = new sfWidgetFormChoice(array(
        'choices' => $islands,
    ));
    $this->validatorSchema['island'] = new sfValidatorChoice(array(
        'choices' => array_keys($islands),
    ));
    
    $companies = CompanyPeer::getForSelect(true, '');
    $this->widgetSchema['company_id'] = new sfWidgetFormChoice(array(
        'choices' => $companies,
    ));
    $this->validatorSchema['company_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($companies),
        'required' => false,
    ));
    
    $photographers = PhotographerPeer::getForSelect(true, '');
    $this->widgetSchema['photographer_id'] = new sfWidgetFormChoice(array(
        'choices' => $photographers,
    ));
    $this->validatorSchema['photographer_id'] = new sfValidatorChoice(array(
        'choices' => array_keys($photographers),
        'required' => true,
    ));
    
    $request = sfContext::getInstance()->getRequest();
    $ids = unserialize(urldecode($request->getParameter('ids')));
    
    $options = array();
    foreach( $ids as $id ) {
      $options[$id] = $id;
    }
    $this->widgetSchema['photo_ids'] = new sfWidgetFormSelectDoubleList(array(
      'choices' => array_combine($ids, $ids),
      'label_unassociated' => 'Não associado',
      'label_associated' => 'Associado',
    ));
    
    $this->widgetSchema['photo_ids'] = new sfWidgetFormChoice(array(
      'choices'  => array_combine($ids, $ids),
      'multiple' => true,
      'expanded' => false,
    ));
    
    $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
    $this->setDefault('ids', $request->getParameter('ids'));

  }
}
