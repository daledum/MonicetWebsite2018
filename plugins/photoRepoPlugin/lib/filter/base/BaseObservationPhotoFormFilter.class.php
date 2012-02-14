<?php

/**
 * ObservationPhoto filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'individual_id'      => new sfWidgetFormPropelChoice(array('model' => 'Individual', 'add_empty' => true)),
      'specie_id'          => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'island'             => new sfWidgetFormFilterInput(),
      'fin_side'           => new sfWidgetFormFilterInput(),
      'latitude'           => new sfWidgetFormFilterInput(),
      'longitude'          => new sfWidgetFormFilterInput(),
      'company'            => new sfWidgetFormFilterInput(),
      'photographer'       => new sfWidgetFormFilterInput(),
      'photographer_email' => new sfWidgetFormFilterInput(),
      'kind_of_photo'      => new sfWidgetFormFilterInput(),
      'photo_quality'      => new sfWidgetFormFilterInput(),
      'observation_date'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'code'               => new sfValidatorPass(array('required' => false)),
      'individual_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Individual', 'column' => 'id')),
      'specie_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Specie', 'column' => 'id')),
      'island'             => new sfValidatorPass(array('required' => false)),
      'fin_side'           => new sfValidatorPass(array('required' => false)),
      'latitude'           => new sfValidatorPass(array('required' => false)),
      'longitude'          => new sfValidatorPass(array('required' => false)),
      'company'            => new sfValidatorPass(array('required' => false)),
      'photographer'       => new sfValidatorPass(array('required' => false)),
      'photographer_email' => new sfValidatorPass(array('required' => false)),
      'kind_of_photo'      => new sfValidatorPass(array('required' => false)),
      'photo_quality'      => new sfValidatorPass(array('required' => false)),
      'observation_date'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhoto';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'code'               => 'Text',
      'individual_id'      => 'ForeignKey',
      'specie_id'          => 'ForeignKey',
      'island'             => 'Text',
      'fin_side'           => 'Text',
      'latitude'           => 'Text',
      'longitude'          => 'Text',
      'company'            => 'Text',
      'photographer'       => 'Text',
      'photographer_email' => 'Text',
      'kind_of_photo'      => 'Text',
      'photo_quality'      => 'Text',
      'observation_date'   => 'Date',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
