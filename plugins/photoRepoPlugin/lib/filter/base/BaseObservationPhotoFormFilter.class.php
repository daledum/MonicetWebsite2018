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
      'code'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'file_name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'photo_time'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'individual_id'   => new sfWidgetFormPropelChoice(array('model' => 'Individual', 'add_empty' => true)),
      'specie_id'       => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'island'          => new sfWidgetFormFilterInput(),
      'body_part_id'    => new sfWidgetFormPropelChoice(array('model' => 'BodyPart', 'add_empty' => true)),
      'gender'          => new sfWidgetFormFilterInput(),
      'age_group'       => new sfWidgetFormFilterInput(),
      'behaviour_id'    => new sfWidgetFormPropelChoice(array('model' => 'Behaviour', 'add_empty' => true)),
      'latitude'        => new sfWidgetFormFilterInput(),
      'longitude'       => new sfWidgetFormFilterInput(),
      'company_id'      => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'vessel_id'       => new sfWidgetFormPropelChoice(array('model' => 'Vessel', 'add_empty' => true)),
      'photographer_id' => new sfWidgetFormPropelChoice(array('model' => 'Photographer', 'add_empty' => true)),
      'kind_of_photo'   => new sfWidgetFormFilterInput(),
      'photo_quality'   => new sfWidgetFormFilterInput(),
      'is_best'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'notes'           => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'code'            => new sfValidatorPass(array('required' => false)),
      'file_name'       => new sfValidatorPass(array('required' => false)),
      'photo_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'photo_time'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'individual_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Individual', 'column' => 'id')),
      'specie_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Specie', 'column' => 'id')),
      'island'          => new sfValidatorPass(array('required' => false)),
      'body_part_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'BodyPart', 'column' => 'id')),
      'gender'          => new sfValidatorPass(array('required' => false)),
      'age_group'       => new sfValidatorPass(array('required' => false)),
      'behaviour_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Behaviour', 'column' => 'id')),
      'latitude'        => new sfValidatorPass(array('required' => false)),
      'longitude'       => new sfValidatorPass(array('required' => false)),
      'company_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'vessel_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vessel', 'column' => 'id')),
      'photographer_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Photographer', 'column' => 'id')),
      'kind_of_photo'   => new sfValidatorPass(array('required' => false)),
      'photo_quality'   => new sfValidatorPass(array('required' => false)),
      'is_best'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'notes'           => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
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
      'id'              => 'Number',
      'code'            => 'Text',
      'file_name'       => 'Text',
      'photo_date'      => 'Date',
      'photo_time'      => 'Date',
      'individual_id'   => 'ForeignKey',
      'specie_id'       => 'ForeignKey',
      'island'          => 'Text',
      'body_part_id'    => 'ForeignKey',
      'gender'          => 'Text',
      'age_group'       => 'Text',
      'behaviour_id'    => 'ForeignKey',
      'latitude'        => 'Text',
      'longitude'       => 'Text',
      'company_id'      => 'ForeignKey',
      'vessel_id'       => 'ForeignKey',
      'photographer_id' => 'ForeignKey',
      'kind_of_photo'   => 'Text',
      'photo_quality'   => 'Text',
      'is_best'         => 'Boolean',
      'notes'           => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
