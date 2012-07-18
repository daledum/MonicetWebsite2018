<?php

/**
 * PatternCellTail filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePatternCellTailFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'pattern_id' => new sfWidgetFormPropelChoice(array('model' => 'Pattern', 'add_empty' => true)),
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'points'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'pattern_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pattern', 'column' => 'id')),
      'name'       => new sfValidatorPass(array('required' => false)),
      'points'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pattern_cell_tail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PatternCellTail';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'pattern_id' => 'ForeignKey',
      'name'       => 'Text',
      'points'     => 'Text',
    );
  }
}
