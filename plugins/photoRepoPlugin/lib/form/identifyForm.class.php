<?php
class identifyForm extends sfForm {
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    $request = sfContext::getInstance()->getRequest();
    $OBPhoto = ObservationPhotoPeer::retrieveByPK($request->getParameter('id'));

    $choices = array(
            'same_body_part',
            'same',
            'best',
            'smooth',
            'irregular',
            'few_marks',
            'cutted_point',
            'cutted_point_left',
            'cutted_point_right',
            'smooth_without',
            'irregular_without',
            'cutted_point_without',
            'cutted_point_left_without',
            'cutted_point_right_without'
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
