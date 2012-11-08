<?php

/**
 * Specie form base class.
 *
 * @method Specie getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSpecieForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'specie_group_id' => new sfWidgetFormPropelChoice(array('model' => 'SpecieGroup', 'add_empty' => false)),
      'code'            => new sfWidgetFormInputText(),
      'rec_cet_code'    => new sfWidgetFormInputText(),
      'scientific_name' => new sfWidgetFormInputText(),
      'color'           => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => false)),
      'specie_group_id' => new sfValidatorPropelChoice(array('model' => 'SpecieGroup', 'column' => 'id')),
      'code'            => new sfValidatorString(array('max_length' => 10)),
      'rec_cet_code'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'scientific_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'color'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('specie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Specie';
  }

  public function getI18nModelName()
  {
    return 'SpecieI18n';
  }

  public function getI18nFormClass()
  {
    return 'SpecieI18nForm';
  }

}
