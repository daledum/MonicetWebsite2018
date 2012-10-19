<?php
class ObservationPhotoTailForm extends BaseObservationPhotoTailForm
{
  public function configure()
  {
    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('observation_photo');
    $this->widgetSchema['photo_id'] = new sfWidgetFormInputHidden();

    $valIsSmothAndIsIrregular = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmothAndIsIrregular') ));
    $valIsSmothAndCuttedPointLeft = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmothAndCuttedPointLeft') ));
    $valIsSmothAndCuttedPointRight = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmothAndCuttedPointRight') ));
    $valIsSmothAndMarks = new sfValidatorCallback(array( 'callback' => array($this, 'checkIsSmothAndHasMarks') ));
    
    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        $valIsSmothAndIsIrregular,
          $valIsSmothAndCuttedPointLeft,
          $valIsSmothAndCuttedPointRight,
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
  public function checkIsSmothAndCuttedPointLeft($validator, $values) {
    if( $values['is_smooth'] && $values['is_cutted_point_left']) {
      throw new sfValidatorError($validator, '<br/> - As opções "Lisa" e "Ponta esquerda cortada" não podem estar seleccionads simultaneamente.');
    }
    return $values;
  }
  public function checkIsSmothAndCuttedPointRight($validator, $values) {
    if( $values['is_smooth'] && $values['is_cutted_point_right']) {
      throw new sfValidatorError($validator, '<br/> - As opções "Lisa" e "Ponta direita cortada" não podem estar seleccionads simultaneamente.');
    }
    return $values;
  }
  public function checkIsSmothAndHasMarks($validator, $values) {
    if( $values['is_smooth'] && $this->getObject()->countObservationPhotoTailMarks()) {
      throw new sfValidatorError($validator, '<br/> - A opção "Lisa" não pode ser seleccionada de a fotografia já tiver marcas adicionadas.');
    }
    return $values;
  }
}
