<?php

/**
 * ObservationPhotoDorsalLeftMark form base class.
 *
 * @method ObservationPhotoDorsalLeftMark getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoDorsalLeftMarkForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'observation_photo_dorsal_left_id' => new sfWidgetFormPropelChoice(array('model' => 'ObservationPhotoDorsalLeft', 'add_empty' => false)),
      'mark_id'                          => new sfWidgetFormPropelChoice(array('model' => 'Mark', 'add_empty' => false)),
      'line'                             => new sfWidgetFormInputText(),
      'column'                           => new sfWidgetFormInputText(),
      'observation'                      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'ObservationPhotoDorsalLeftMark', 'column' => 'id', 'required' => false)),
      'observation_photo_dorsal_left_id' => new sfValidatorPropelChoice(array('model' => 'ObservationPhotoDorsalLeft', 'column' => 'id')),
      'mark_id'                          => new sfValidatorPropelChoice(array('model' => 'Mark', 'column' => 'id')),
      'line'                             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'column'                           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'observation'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_dorsal_left_mark[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoDorsalLeftMark';
  }


}
