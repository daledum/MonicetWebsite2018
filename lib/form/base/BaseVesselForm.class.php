<?php

/**
 * Vessel form base class.
 *
 * @method Vessel getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseVesselForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'company_id'   => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => false)),
      'name'         => new sfWidgetFormInputText(),
      'length'       => new sfWidgetFormInputText(),
      'power'        => new sfWidgetFormInputText(),
      'height'       => new sfWidgetFormInputText(),
      'observations' => new sfWidgetFormTextarea(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Vessel', 'column' => 'id', 'required' => false)),
      'company_id'   => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id')),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'length'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'power'        => new sfValidatorNumber(array('required' => false)),
      'height'       => new sfValidatorNumber(array('required' => false)),
      'observations' => new sfValidatorString(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vessel[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vessel';
  }


}
