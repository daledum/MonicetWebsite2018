<?php

/**
 * ObservationPhoto form base class.
 *
 * @method ObservationPhoto getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'code'            => new sfWidgetFormInputText(),
      'file_name'       => new sfWidgetFormInputText(),
      'photo_date'      => new sfWidgetFormDate(),
      'photo_time'      => new sfWidgetFormTime(),
      'individual_id'   => new sfWidgetFormPropelChoice(array('model' => 'Individual', 'add_empty' => true)),
      'specie_id'       => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'island'          => new sfWidgetFormInputText(),
      'body_part_id'    => new sfWidgetFormPropelChoice(array('model' => 'BodyPart', 'add_empty' => true)),
      'gender'          => new sfWidgetFormInputText(),
      'age_group'       => new sfWidgetFormInputText(),
      'behaviour_id'    => new sfWidgetFormPropelChoice(array('model' => 'Behaviour', 'add_empty' => true)),
      'latitude'        => new sfWidgetFormInputText(),
      'longitude'       => new sfWidgetFormInputText(),
      'company_id'      => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'vessel_id'       => new sfWidgetFormPropelChoice(array('model' => 'Vessel', 'add_empty' => true)),
      'photographer_id' => new sfWidgetFormPropelChoice(array('model' => 'Photographer', 'add_empty' => true)),
      'kind_of_photo'   => new sfWidgetFormInputText(),
      'photo_quality'   => new sfWidgetFormInputText(),
      'sighting_id'     => new sfWidgetFormPropelChoice(array('model' => 'Sighting', 'add_empty' => true)),
      'is_best'         => new sfWidgetFormInputCheckbox(),
      'notes'           => new sfWidgetFormTextarea(),
      'uploaded_at'     => new sfWidgetFormDateTime(),
      'status'          => new sfWidgetFormInputText(),
      'last_edited_by'  => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'validated_by'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'ObservationPhoto', 'column' => 'id', 'required' => false)),
      'code'            => new sfValidatorString(array('max_length' => 255)),
      'file_name'       => new sfValidatorString(array('max_length' => 255)),
      'photo_date'      => new sfValidatorDate(array('required' => false)),
      'photo_time'      => new sfValidatorTime(array('required' => false)),
      'individual_id'   => new sfValidatorPropelChoice(array('model' => 'Individual', 'column' => 'id', 'required' => false)),
      'specie_id'       => new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => false)),
      'island'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'body_part_id'    => new sfValidatorPropelChoice(array('model' => 'BodyPart', 'column' => 'id', 'required' => false)),
      'gender'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'age_group'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'behaviour_id'    => new sfValidatorPropelChoice(array('model' => 'Behaviour', 'column' => 'id', 'required' => false)),
      'latitude'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'longitude'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'company_id'      => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id', 'required' => false)),
      'vessel_id'       => new sfValidatorPropelChoice(array('model' => 'Vessel', 'column' => 'id', 'required' => false)),
      'photographer_id' => new sfValidatorPropelChoice(array('model' => 'Photographer', 'column' => 'id', 'required' => false)),
      'kind_of_photo'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo_quality'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sighting_id'     => new sfValidatorPropelChoice(array('model' => 'Sighting', 'column' => 'id', 'required' => false)),
      'is_best'         => new sfValidatorBoolean(array('required' => false)),
      'notes'           => new sfValidatorString(array('required' => false)),
      'uploaded_at'     => new sfValidatorDateTime(array('required' => false)),
      'status'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_edited_by'  => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'validated_by'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhoto';
  }

  public function getI18nModelName()
  {
    return 'ObservationPhotoI18n';
  }

  public function getI18nFormClass()
  {
    return 'ObservationPhotoI18nForm';
  }

}
