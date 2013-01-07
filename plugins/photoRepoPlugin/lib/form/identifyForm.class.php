<?php
class identifyForm extends sfForm {
  public function configure() {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    
    $choices = array(
        'same', 'best', 'smoth', 'irregular', 'cutted_point', 'cutted_point_left', 'cutted_point_right', 'all_complete_marks', 'any_complete_marks', 'partial_marks'
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
       
    $this->widgetSchema->setNameFormat('identify_form[%s]');

  }
}

?>
