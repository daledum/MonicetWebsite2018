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
      'id'                 => new sfWidgetFormInputHidden(),
      'code'               => new sfWidgetFormInputText(),
      'individual_id'      => new sfWidgetFormPropelChoice(array('model' => 'Individual', 'add_empty' => true)),
      'specie_id'          => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'island'             => new sfWidgetFormInputText(),
      'fin_side'           => new sfWidgetFormInputText(),
      'latitude'           => new sfWidgetFormInputText(),
      'longitude'          => new sfWidgetFormInputText(),
      'company'            => new sfWidgetFormInputText(),
      'photographer'       => new sfWidgetFormInputText(),
      'photographer_email' => new sfWidgetFormInputText(),
      'kind_of_photo'      => new sfWidgetFormInputText(),
      'photo_quality'      => new sfWidgetFormInputText(),
      'observation_date'   => new sfWidgetFormDate(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'ObservationPhoto', 'column' => 'id', 'required' => false)),
      'code'               => new sfValidatorString(array('max_length' => 255)),
      'individual_id'      => new sfValidatorPropelChoice(array('model' => 'Individual', 'column' => 'id', 'required' => false)),
      'specie_id'          => new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => false)),
      'island'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fin_side'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'latitude'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'longitude'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'company'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photographer'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photographer_email' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'kind_of_photo'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo_quality'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'observation_date'   => new sfValidatorDate(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
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
