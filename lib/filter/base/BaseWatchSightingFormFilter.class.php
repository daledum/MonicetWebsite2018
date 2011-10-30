<?php

/**
 * WatchSighting filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseWatchSightingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'watch_info_id'       => new sfWidgetFormPropelChoice(array('model' => 'WatchInfo', 'add_empty' => true)),
      'watch_code_id'       => new sfWidgetFormPropelChoice(array('model' => 'WatchCode', 'add_empty' => true)),
      'time'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'watch_visibility_id' => new sfWidgetFormPropelChoice(array('model' => 'WatchVisibility', 'add_empty' => true)),
      'specie_id'           => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'group'               => new sfWidgetFormFilterInput(),
      'total'               => new sfWidgetFormFilterInput(),
      'watch_behaviour_id'  => new sfWidgetFormPropelChoice(array('model' => 'WatchBehaviour', 'add_empty' => true)),
      'direction_id'        => new sfWidgetFormPropelChoice(array('model' => 'Direction', 'add_empty' => true)),
      'horizontal'          => new sfWidgetFormFilterInput(),
      'vertical'            => new sfWidgetFormFilterInput(),
      'vessel_id'           => new sfWidgetFormPropelChoice(array('model' => 'Vessel', 'add_empty' => true)),
      'comments'            => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'watch_info_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WatchInfo', 'column' => 'id')),
      'watch_code_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WatchCode', 'column' => 'id')),
      'time'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'watch_visibility_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WatchVisibility', 'column' => 'id')),
      'specie_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Specie', 'column' => 'id')),
      'group'               => new sfValidatorPass(array('required' => false)),
      'total'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'watch_behaviour_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'WatchBehaviour', 'column' => 'id')),
      'direction_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Direction', 'column' => 'id')),
      'horizontal'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'vertical'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'vessel_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vessel', 'column' => 'id')),
      'comments'            => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('watch_sighting_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WatchSighting';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'watch_info_id'       => 'ForeignKey',
      'watch_code_id'       => 'ForeignKey',
      'time'                => 'Date',
      'watch_visibility_id' => 'ForeignKey',
      'specie_id'           => 'ForeignKey',
      'group'               => 'Text',
      'total'               => 'Number',
      'watch_behaviour_id'  => 'ForeignKey',
      'direction_id'        => 'ForeignKey',
      'horizontal'          => 'Number',
      'vertical'            => 'Number',
      'vessel_id'           => 'ForeignKey',
      'comments'            => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
