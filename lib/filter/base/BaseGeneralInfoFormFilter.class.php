<?php

/**
 * GeneralInfo filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseGeneralInfoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'vessel_id'      => new sfWidgetFormPropelChoice(array('model' => 'Vessel', 'add_empty' => true)),
      'skipper_id'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'guide_id'       => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'company_id'     => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'base_latitude'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'base_longitude' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'vessel_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vessel', 'column' => 'id')),
      'skipper_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'guide_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'company_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'base_latitude'  => new sfValidatorPass(array('required' => false)),
      'base_longitude' => new sfValidatorPass(array('required' => false)),
      'date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('general_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GeneralInfo';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'vessel_id'      => 'ForeignKey',
      'skipper_id'     => 'ForeignKey',
      'guide_id'       => 'ForeignKey',
      'company_id'     => 'ForeignKey',
      'base_latitude'  => 'Text',
      'base_longitude' => 'Text',
      'date'           => 'Date',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
