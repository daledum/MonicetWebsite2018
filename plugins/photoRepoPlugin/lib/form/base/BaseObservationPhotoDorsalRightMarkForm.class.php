<?php

/**
 * ObservationPhotoDorsalRightMark form base class.
 *
 * @method ObservationPhotoDorsalRightMark getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoDorsalRightMarkForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                => new sfWidgetFormInputHidden(),
      'observation_photo_dorsal_right_id' => new sfWidgetFormPropelChoice(array('model' => 'ObservationPhotoDorsalRight', 'add_empty' => false)),
      'pattern_cell_dorsal_right_id'      => new sfWidgetFormPropelChoice(array('model' => 'PatternCellDorsalRight', 'add_empty' => false)),
      'is_wide'                           => new sfWidgetFormInputCheckbox(),
      'is_deep'                           => new sfWidgetFormInputCheckbox(),
      'continues_from_cell_id'            => new sfWidgetFormPropelChoice(array('model' => 'PatternCellDorsalRight', 'add_empty' => true)),
      'continues_on_cell_id'              => new sfWidgetFormPropelChoice(array('model' => 'PatternCellDorsalRight', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                                => new sfValidatorPropelChoice(array('model' => 'ObservationPhotoDorsalRightMark', 'column' => 'id', 'required' => false)),
      'observation_photo_dorsal_right_id' => new sfValidatorPropelChoice(array('model' => 'ObservationPhotoDorsalRight', 'column' => 'id')),
      'pattern_cell_dorsal_right_id'      => new sfValidatorPropelChoice(array('model' => 'PatternCellDorsalRight', 'column' => 'id')),
      'is_wide'                           => new sfValidatorBoolean(array('required' => false)),
      'is_deep'                           => new sfValidatorBoolean(array('required' => false)),
      'continues_from_cell_id'            => new sfValidatorPropelChoice(array('model' => 'PatternCellDorsalRight', 'column' => 'id', 'required' => false)),
      'continues_on_cell_id'              => new sfValidatorPropelChoice(array('model' => 'PatternCellDorsalRight', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_dorsal_right_mark[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoDorsalRightMark';
  }


}
