<?php

/**
 * WatchPost filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWatchPostFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'company_id'   => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'latitude'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'longitude'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'height'       => new sfWidgetFormFilterInput(),
      'observations' => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'company_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'name'         => new sfValidatorPass(array('required' => false)),
      'latitude'     => new sfValidatorPass(array('required' => false)),
      'longitude'    => new sfValidatorPass(array('required' => false)),
      'height'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'observations' => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('watch_post_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WatchPost';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'company_id'   => 'ForeignKey',
      'name'         => 'Text',
      'latitude'     => 'Text',
      'longitude'    => 'Text',
      'height'       => 'Number',
      'observations' => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
