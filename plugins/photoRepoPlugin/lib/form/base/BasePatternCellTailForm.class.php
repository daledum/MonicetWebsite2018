<?php

/**
 * PatternCellTail form base class.
 *
 * @method PatternCellTail getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePatternCellTailForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'pattern_id' => new sfWidgetFormPropelChoice(array('model' => 'Pattern', 'add_empty' => false)),
      'name'       => new sfWidgetFormInputText(),
      'points'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'PatternCellTail', 'column' => 'id', 'required' => false)),
      'pattern_id' => new sfValidatorPropelChoice(array('model' => 'Pattern', 'column' => 'id')),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'points'     => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('pattern_cell_tail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PatternCellTail';
  }


}
