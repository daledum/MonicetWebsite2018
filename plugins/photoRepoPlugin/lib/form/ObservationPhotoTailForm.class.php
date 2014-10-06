<?php
class ObservationPhotoTailForm extends BaseObservationPhotoTailForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    $this->widgetSchema['photo_id'] = new sfWidgetFormInputHidden();

    $valIsSmoothAndIsIrregular = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmoothAndIsIrregular') ));
    $valIsSmoothAndCuttedPointLeft = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmoothAndCuttedPointLeft') ));
    $valIsSmoothAndCuttedPointRight = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmoothAndCuttedPointRight') ));
    $valIsSmoothAndMarks = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmoothAndHasMarks') ));
    
    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        $valIsSmoothAndIsIrregular,
          $valIsSmoothAndCuttedPointLeft,
          $valIsSmoothAndCuttedPointRight,
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
  public function checkIsSmoothAndCuttedPointLeft($validator, $values) {
    if( $values['is_smooth'] && $values['is_cutted_point_left']) {
      throw new sfValidatorError($validator, '<br/> - As opções "Lisa" e "Ponta esquerda cortada" não podem estar seleccionads simultaneamente.');
    }
    return $values;
  }
  public function checkIsSmoothAndCuttedPointRight($validator, $values) {
    if( $values['is_smooth'] && $values['is_cutted_point_right']) {
      throw new sfValidatorError($validator, '<br/> - As opções "Lisa" e "Ponta direita cortada" não podem estar seleccionads simultaneamente.');
    }
    return $values;
  }
  public function checkIsSmoothAndHasMarks($validator, $values) {
    if( $values['is_smooth'] && $this->getObject()->countObservationPhotoTailMarks()) {
      throw new sfValidatorError($validator, '<br/> - A opção "Lisa" não pode ser seleccionada de a fotografia já tiver marcas adicionadas.');
    }
    return $values;
  }
}
