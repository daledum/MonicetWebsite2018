<?php

/**
 * ObservationPhotoTailMark filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoTailMarkFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'observation_photo_tail_id' => new sfWidgetFormPropelChoice(array('model' => 'ObservationPhotoTail', 'add_empty' => true)),
      'pattern_cell_tail_id'      => new sfWidgetFormPropelChoice(array('model' => 'PatternCellTail', 'add_empty' => true)),
      'is_wide'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_deep'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'to_cell_id'                => new sfWidgetFormPropelChoice(array('model' => 'PatternCellTail', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'observation_photo_tail_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ObservationPhotoTail', 'column' => 'id')),
      'pattern_cell_tail_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PatternCellTail', 'column' => 'id')),
      'is_wide'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_deep'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'to_cell_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PatternCellTail', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_tail_mark_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoTailMark';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'observation_photo_tail_id' => 'ForeignKey',
      'pattern_cell_tail_id'      => 'ForeignKey',
      'is_wide'                   => 'Boolean',
      'is_deep'                   => 'Boolean',
      'to_cell_id'                => 'ForeignKey',
    );
  }
}
