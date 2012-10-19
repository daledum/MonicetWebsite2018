<?php
class ObservationPhotoDorsalRightForm extends BaseObservationPhotoDorsalRightForm
{
  public function configure()
  {
    
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    $this->widgetSchema['photo_id'] = new sfWidgetFormInputHidden();
    
    $valIsSmothAndIsIrregular = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmothAndIsIrregular') ));
    $valIsSmothAndCuttedPoint = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmothAndCuttedPoint') ));
    $valIsSmothAndMarks = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmothAndHasMarks') ));
    
    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        $valIsSmothAndIsIrregular,
          $valIsSmothAndCuttedPoint,
          $valIsSmothAndMarks
      ))
    );
  }
  
  public function checkIsSmothAndIsIrregular($validator, $values) {
    if( $values['is_smooth'] && $values['is_irregular']) {
      throw new sfValidatorError($validator, '<br/> - As opções "Lisa" e "Irregular" não podem estar seleccionads simultaneamente.');
    }
    return $values;
  }
  public function checkIsSmothAndCuttedPoint($validator, $values) {
    if( $values['is_smooth'] && $values['is_cutted_point']) {
      throw new sfValidatorError($validator, '<br/> - As opções "Lisa" e "Ponta cortada" não podem estar seleccionads simultaneamente.');
    }
    return $values;
  }
  public function checkIsSmothAndHasMarks($validator, $values) {
    if( $values['is_smooth'] && $this->getObject()->countObservationPhotoDorsalRightMarks()) {
      throw new sfValidatorError($validator, '<br/> - A opção "Lisa" não pode ser seleccionada de a fotografia já tiver marcas adicionadas.');
    }
    return $values;
  }
}
