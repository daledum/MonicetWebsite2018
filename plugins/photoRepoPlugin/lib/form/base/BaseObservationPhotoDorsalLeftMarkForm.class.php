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
      'pattern_cell_dorsal_left_id'      => new sfWidgetFormPropelChoice(array('model' => 'PatternCellDorsalLeft', 'add_empty' => false)),
      'is_wide'                          => new sfWidgetFormInputCheckbox(),
      'is_deep'                          => new sfWidgetFormInputCheckbox(),
      'to_cell_id'                       => new sfWidgetFormPropelChoice(array('model' => 'PatternCellDorsalLeft', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'ObservationPhotoDorsalLeftMark', 'column' => 'id', 'required' => false)),
      'observation_photo_dorsal_left_id' => new sfValidatorPropelChoice(array('model' => 'ObservationPhotoDorsalLeft', 'column' => 'id')),
      'pattern_cell_dorsal_left_id'      => new sfValidatorPropelChoice(array('model' => 'PatternCellDorsalLeft', 'column' => 'id')),
      'is_wide'                          => new sfValidatorBoolean(array('required' => false)),
      'is_deep'                          => new sfValidatorBoolean(array('required' => false)),
      'to_cell_id'                       => new sfValidatorPropelChoice(array('model' => 'PatternCellDorsalLeft', 'column' => 'id', 'required' => false)),
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
