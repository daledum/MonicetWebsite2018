<?php
class identifyForm extends sfForm {
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    $request = sfContext::getInstance()->getRequest();
    
    $choices = array(
        'same', 
        'best', 
        'smoth', 
        'irregular', 
        'cutted_point', 
        'cutted_point_left', 
        'cutted_point_right', 
        'complete_marks', 
        'depth'
    );
    $this->widgetSchema['choices'] = new sfWidgetFormChoice(array(
        'choices' => array_combine($choices, $choices),
        'multiple' => true,
        'expanded' => true
    ));
    $this->validatorSchema['choices'] = new sfValidatorChoice(array(
        'choices' => $choices,
        'required' => false
    ));
    
    $OBPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id'));
    $marks = $OBPhoto->getMarks();
    //print count($marks);
    
    $marks_choices = $OBPhoto->getMarksForSelect();
    $this->widgetSchema['marks'] = new sfWidgetFormChoice(array(
        'choices' => $marks_choices,
        'multiple' => true,
        'expanded' => false
    ));
    $this->validatorSchema['marks'] = new sfValidatorChoice(array(
        'choices' => array_keys($marks_choices),
        'required' => false
    ));
    //$this->setDefault('marks', array_keys($marks_choices));
    //$this->widgetSchema['marks']->setAttribute('value', '');
    //$this->setDefault('marks', array());
    
    $this->widgetSchema->setNameFormat('identify_form[%s]');

  }
  
}

?>
