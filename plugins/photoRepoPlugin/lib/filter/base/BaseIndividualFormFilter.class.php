<?php

/**
 * Individual filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseIndividualFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                    => new sfWidgetFormFilterInput(),
      'dominant_body_part_code' => new sfWidgetFormFilterInput(),
      'specie_id'               => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'name'                    => new sfValidatorPass(array('required' => false)),
      'dominant_body_part_code' => new sfValidatorPass(array('required' => false)),
      'specie_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Specie', 'column' => 'id')),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('individual_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Individual';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'name'                    => 'Text',
      'dominant_body_part_code' => 'Text',
      'specie_id'               => 'ForeignKey',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
