<?php

/**
 * WatchInfo filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWatchInfoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'watchman_id'    => new sfWidgetFormPropelChoice(array('model' => 'Watchman', 'add_empty' => true)),
      'company_id'     => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'base_latitude'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'base_longitude' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'valid'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'comments'       => new sfWidgetFormFilterInput(),
      'created_by'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'code'           => new sfValidatorPass(array('required' => false)),
      'watchman_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Watchman', 'column' => 'id')),
      'company_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'base_latitude'  => new sfValidatorPass(array('required' => false)),
      'base_longitude' => new sfValidatorPass(array('required' => false)),
      'date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'valid'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'comments'       => new sfValidatorPass(array('required' => false)),
      'created_by'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'updated_by'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('watch_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WatchInfo';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'code'           => 'Text',
      'watchman_id'    => 'ForeignKey',
      'company_id'     => 'ForeignKey',
      'base_latitude'  => 'Text',
      'base_longitude' => 'Text',
      'date'           => 'Date',
      'valid'          => 'Boolean',
      'comments'       => 'Text',
      'created_by'     => 'ForeignKey',
      'updated_by'     => 'ForeignKey',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
