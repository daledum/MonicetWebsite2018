<?php

/**
 * ObservationPhotoDorsalLeftMark filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoDorsalLeftMarkFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'observation_photo_dorsal_left_id' => new sfWidgetFormPropelChoice(array('model' => 'ObservationPhotoDorsalLeft', 'add_empty' => true)),
      'pattern_cell_dorsal_left_id'      => new sfWidgetFormPropelChoice(array('model' => 'PatternCellDorsalLeft', 'add_empty' => true)),
      'is_wide'                          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_deep'                          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'continues_from_cell_id'           => new sfWidgetFormPropelChoice(array('model' => 'PatternCellDorsalLeft', 'add_empty' => true)),
      'continues_on_cell_id'             => new sfWidgetFormPropelChoice(array('model' => 'PatternCellDorsalLeft', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'observation_photo_dorsal_left_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ObservationPhotoDorsalLeft', 'column' => 'id')),
      'pattern_cell_dorsal_left_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PatternCellDorsalLeft', 'column' => 'id')),
      'is_wide'                          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_deep'                          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'continues_from_cell_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PatternCellDorsalLeft', 'column' => 'id')),
      'continues_on_cell_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PatternCellDorsalLeft', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_dorsal_left_mark_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoDorsalLeftMark';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'observation_photo_dorsal_left_id' => 'ForeignKey',
      'pattern_cell_dorsal_left_id'      => 'ForeignKey',
      'is_wide'                          => 'Boolean',
      'is_deep'                          => 'Boolean',
      'continues_from_cell_id'           => 'ForeignKey',
      'continues_on_cell_id'             => 'ForeignKey',
    );
  }
}
