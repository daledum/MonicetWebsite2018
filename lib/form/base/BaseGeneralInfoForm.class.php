<?php

/**
 * GeneralInfo form base class.
 *
 * @method GeneralInfo getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseGeneralInfoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'code'           => new sfWidgetFormInputText(),
      'vessel_id'      => new sfWidgetFormPropelChoice(array('model' => 'Vessel', 'add_empty' => true)),
      'skipper_id'     => new sfWidgetFormPropelChoice(array('model' => 'Skipper', 'add_empty' => true)),
      'guide_id'       => new sfWidgetFormPropelChoice(array('model' => 'Guide', 'add_empty' => true)),
      'company_id'     => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => false)),
      'base_latitude'  => new sfWidgetFormInputText(),
      'base_longitude' => new sfWidgetFormInputText(),
      'date'           => new sfWidgetFormDate(),
      'valid'          => new sfWidgetFormInputCheckbox(),
      'comments'       => new sfWidgetFormTextarea(),
      'created_by'     => new sfWidgetFormInputHidden(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'GeneralInfo', 'column' => 'id', 'required' => false)),
      'code'           => new sfValidatorString(array('max_length' => 45)),
      'vessel_id'      => new sfValidatorPropelChoice(array('model' => 'Vessel', 'column' => 'id', 'required' => false)),
      'skipper_id'     => new sfValidatorPropelChoice(array('model' => 'Skipper', 'column' => 'id', 'required' => false)),
      'guide_id'       => new sfValidatorPropelChoice(array('model' => 'Guide', 'column' => 'id', 'required' => false)),
      'company_id'     => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id')),
      'base_latitude'  => new sfValidatorNumber(),
      'base_longitude' => new sfValidatorNumber(),
      'date'           => new sfValidatorDate(),
      'valid'          => new sfValidatorBoolean(),
      'comments'       => new sfValidatorString(array('required' => false)),
      'created_by'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('general_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GeneralInfo';
  }


}
