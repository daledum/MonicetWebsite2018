<?php
class ObservationPhotoDorsalRightForm extends BaseObservationPhotoDorsalRightForm
{
  public function configure()
  {
    
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    $this->widgetSchema['photo_id'] = new sfWidgetFormInputHidden();
    
    $valIsSmoothAndIsIrregular = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmoothAndIsIrregular') ));
    $valIsSmoothAndCuttedPoint = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmoothAndCuttedPoint') ));
    $valIsSmoothAndMarks = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmoothAndHasMarks') ));
    
    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        $valIsSmoothAndIsIrregular,
          $valIsSmoothAndCuttedPoint,
          $valIsSmoothAndMarks
      ))
    );
  }
  
  public function checkIsSmoothAndIsIrregular($validator, $values) {
    if( $values['is_smooth'] && $values['is_irregular']) {
      throw new sfValidatorError($validator, '<br/> - As opções "Lisa" e "Irregular" não podem estar seleccionads simultaneamente.');
    }
    return $values;
  }
  public function checkIsSmoothAndCuttedPoint($validator, $values) {
    if( $values['is_smooth'] && $values['is_cutted_point']) {
      throw new sfValidatorError($validator, '<br/> - As opções "Lisa" e "Ponta cortada" não podem estar seleccionads simultaneamente.');
    }
    return $values;
  }
  public function checkIsSmoothAndHasMarks($validator, $values) {
    if( $values['is_smooth'] && $this->getObject()->countObservationPhotoDorsalRightMarks()) {
      throw new sfValidatorError($validator, '<br/> - A opção "Lisa" não pode ser seleccionada de a fotografia já tiver marcas adicionadas.');
    }
    return $values;
  }
}
