<?php

/**
 * Vessel filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseVesselFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'company_id'   => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'rec_cet_code' => new sfWidgetFormFilterInput(),
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'length'       => new sfWidgetFormFilterInput(),
      'power'        => new sfWidgetFormFilterInput(),
      'height'       => new sfWidgetFormFilterInput(),
      'observations' => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'company_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'rec_cet_code' => new sfValidatorPass(array('required' => false)),
      'name'         => new sfValidatorPass(array('required' => false)),
      'length'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'power'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'height'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'observations' => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('vessel_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vessel';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'company_id'   => 'ForeignKey',
      'rec_cet_code' => 'Text',
      'name'         => 'Text',
      'length'       => 'Number',
      'power'        => 'Number',
      'height'       => 'Number',
      'observations' => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
