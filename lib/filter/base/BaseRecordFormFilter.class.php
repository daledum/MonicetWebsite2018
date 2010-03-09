<?php

/**
 * Record filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRecordFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'code_id'         => new sfWidgetFormPropelChoice(array('model' => 'Code', 'add_empty' => true)),
      'visibility_id'   => new sfWidgetFormPropelChoice(array('model' => 'Visibility', 'add_empty' => true)),
      'sea_state_id'    => new sfWidgetFormPropelChoice(array('model' => 'SeaState', 'add_empty' => true)),
      'general_info_id' => new sfWidgetFormPropelChoice(array('model' => 'GeneralInfo', 'add_empty' => true)),
      'company_id'      => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'time'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'latitude'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'longitude'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comments'        => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'code_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Code', 'column' => 'id')),
      'visibility_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Visibility', 'column' => 'id')),
      'sea_state_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SeaState', 'column' => 'id')),
      'general_info_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'GeneralInfo', 'column' => 'id')),
      'company_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'time'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'latitude'        => new sfValidatorPass(array('required' => false)),
      'longitude'       => new sfValidatorPass(array('required' => false)),
      'comments'        => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('record_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Record';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'code_id'         => 'ForeignKey',
      'visibility_id'   => 'ForeignKey',
      'sea_state_id'    => 'ForeignKey',
      'general_info_id' => 'ForeignKey',
      'company_id'      => 'ForeignKey',
      'time'            => 'Date',
      'latitude'        => 'Text',
      'longitude'       => 'Text',
      'comments'        => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
