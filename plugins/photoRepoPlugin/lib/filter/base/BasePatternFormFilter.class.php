<?php

/**
 * Pattern filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePatternFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'specie_id'          => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'image_tail'         => new sfWidgetFormFilterInput(),
      'image_dorsal_left'  => new sfWidgetFormFilterInput(),
      'image_dorsal_right' => new sfWidgetFormFilterInput(),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'specie_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Specie', 'column' => 'id')),
      'image_tail'         => new sfValidatorPass(array('required' => false)),
      'image_dorsal_left'  => new sfValidatorPass(array('required' => false)),
      'image_dorsal_right' => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('pattern_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pattern';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'specie_id'          => 'ForeignKey',
      'image_tail'         => 'Text',
      'image_dorsal_left'  => 'Text',
      'image_dorsal_right' => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
