<?php

/**
 * Individual form base class.
 *
 * @method Individual getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseIndividualForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'name'                    => new sfWidgetFormInputText(),
      'dominant_body_part_code' => new sfWidgetFormInputText(),
      'specie_id'               => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Individual', 'column' => 'id', 'required' => false)),
      'name'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'dominant_body_part_code' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'specie_id'               => new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => false)),
      'created_at'              => new sfValidatorDateTime(array('required' => false)),
      'updated_at'              => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('individual[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Individual';
  }

  public function getI18nModelName()
  {
    return 'IndividualI18n';
  }

  public function getI18nFormClass()
  {
    return 'IndividualI18nForm';
  }

}
