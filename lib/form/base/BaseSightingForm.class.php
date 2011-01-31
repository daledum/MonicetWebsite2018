<?php

/**
 * Sighting form base class.
 *
 * @method Sighting getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSightingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'record_id'      => new sfWidgetFormPropelChoice(array('model' => 'Record', 'add_empty' => false)),
      'specie_id'      => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'behaviour_id'   => new sfWidgetFormPropelChoice(array('model' => 'Behaviour', 'add_empty' => true)),
      'association_id' => new sfWidgetFormPropelChoice(array('model' => 'Association', 'add_empty' => true)),
      'adults'         => new sfWidgetFormInputText(),
      'juveniles'      => new sfWidgetFormInputText(),
      'calves'         => new sfWidgetFormInputText(),
      'total'          => new sfWidgetFormInputText(),
      'comments'       => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Sighting', 'column' => 'id', 'required' => false)),
      'record_id'      => new sfValidatorPropelChoice(array('model' => 'Record', 'column' => 'id')),
      'specie_id'      => new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => false)),
      'behaviour_id'   => new sfValidatorPropelChoice(array('model' => 'Behaviour', 'column' => 'id', 'required' => false)),
      'association_id' => new sfValidatorPropelChoice(array('model' => 'Association', 'column' => 'id', 'required' => false)),
      'adults'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'juveniles'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'calves'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'total'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'comments'       => new sfValidatorString(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sighting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sighting';
  }


}
